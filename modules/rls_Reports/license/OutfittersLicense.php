<?php


class OutfittersLicense
{
    /**
     * For validation via server-side. Whomever calls this should handle what to do in case of a failure.
     *
     * Check return for "!== true" as the error will be returned in the case that it didn't validate.
     *
     * returns true or else the error string
     */
    public static function isValid($thisModule = null)
    {
        global  $current_user, $sugar_config;

        if (empty($thisModule)) {
            global $currentModule;
            $thisModule = $currentModule;

            //if still empty...then get out of here...in an odd spot in SugarCRM
            if (empty($thisModule)) {
                return true;
            }
        }

        //load license validation config
        require 'modules/'.$thisModule.'/license/config.php';

        $user_id = $current_user->id;
        //check to see if the passed user is allowed to use the add-on
        //if not then return a message...otherwise continue with the normal license check
        //ignore a passed user id if manage_licensed_users is not enabled
        if ((strlen($sugar_config['outfitters_licenses'][$outfitters_config['shortname']]) == 35) && !empty($user_id) && $outfitters_config['validate_users'] == true) {
            global $db;
            $result = $db->query("SELECT id FROM so_users WHERE shortname = '".$db->quote($outfitters_config['shortname'])."' and user_id = '".$db->quote($user_id)."'", false);
            $row = $db->fetchByAssoc($result);
            if (empty($row)) {
                return 'The user does not have access to this add-on.';
            }
        }

        //check last validation
        require_once 'modules/Administration/Administration.php';
        $administration = new Administration();
        $administration->retrieveSettings();
        $last_validation = $administration->settings['SugarOutfitters_'.$outfitters_config['shortname']];
        $trimmed_last = trim($last_validation); //to be safe...
        //make sure serialized string is not empty
        if (!empty($trimmed_last)) {
            $last_validation = base64_decode($last_validation);
            $last_validation = unserialize($last_validation);

            //if enough time hasn't passed then just return the last result
            //even if the last result failed
            $frequency = $outfitters_config['validation_frequency'];
            $elapsed = (7 * 24 * 60 * 60); //default to weekly
            if ($frequency == 'hourly') {
                $elapsed = (60 * 60);
            } elseif ($frequency == 'daily') {
                $elapsed = (24 * 60 * 60);
            }

            if (($last_validation['last_ran'] + $elapsed) >= time()) {
                if ($last_validation['last_result']['success'] === false) {
                    return $last_validation['last_result']['result'];
                } else {
                    return true;
                }
            }
        }
        //otherwise continue with validation

        $validated = self::doValidate($thisModule);

        $store = array(
            'last_ran' => time(),
            'last_result' => $validated,
        );

        $serialized = base64_encode(serialize($store));
        $administration->saveSetting('SugarOutfitters', $outfitters_config['shortname'], $serialized);

        if ($validated['success'] === false) {
            return $validated['result'];
        } else {
            return true;
        }
    }

    /**
     * For validation via client-side (used by License Configuration form).
     *
     * Does NOT obey the validation_frequency setting. Validates every time.
     * This function is meant to be used only on the License Configuration screen for a specific add-on
     */
    public static function validate()
    {
        $json = getJSONobj();
        if (empty($_REQUEST['key'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = 'Key is required.';
            echo $json->encode($response);
        }

        global $sugar_config, $currentModule;

        //load license validation config
        require 'modules/'.$currentModule.'/license/config.php';

        $validated = self::doValidate($currentModule, $_REQUEST['key']);

        $store = array(
            'last_ran' => time(),
            'last_result' => $validated,
        );

        require_once 'modules/Administration/Administration.php';
        $administration = new Administration();
        $serialized = base64_encode(serialize($store));
        $administration->saveSetting('SugarOutfitters', $outfitters_config['shortname'], $serialized);

        if ($validated['success'] === false) {
            header('HTTP/1.1 400 Bad Request');
        } else {
            //use config_override.php...config.php has a higher chance of having rights restricted on servers
            global $currentModule;

            //load license validation config
            require 'modules/'.$currentModule.'/license/config.php';

            require 'modules/Configurator/Configurator.php';
            $cfg = new Configurator();
            $cfg->config['outfitters_licenses'][$outfitters_config['shortname']] = $_REQUEST['key'];
            $cfg->handleOverride();
        }

        echo $json->encode($validated['result']);
    }

    /**
     * Get curl validate response from API
     * returns array(
     *      response => true/false
     *      info    => result set returned by the server.
     */
    public static function curlValidate($url, $post_fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'/key/validate?'.$post_fields);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $response_array = array(
            'response' => $response,
            'info' => $info,
        );

        return $response_array;
    }

    /**
     * Get curl change response from API
     * returns array(
     *      response => true/false
     *      info    => result set returned by the server.
     */
    public static function curlChange($url, $post_fields)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'/key/change');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $response_array = array(
            'response' => $response,
            'info' => $info,
        );

        return $response_array;
    }

    /**
     * Internal method that makes the actual API request.
     *
     * returns array(
     *      success => true/false
     *      result    => result set returned by the server
     */
    public static function doValidate($thisModule, $key = null)
    {
        global $sugar_config;

        //load license validation config
        require 'modules/'.$thisModule.'/license/config.php';

        //if no key is provided then look for an existing key
        /*if (empty($key)) {
            $key = $sugar_config['outfitters_licenses'][$outfitters_config['shortname']];
            if (empty($key)) {
                return array(
                        'success' => false,
                        'result' => 'Key could not be found locally. Please go to the license configuration tool and enter your key.',
                    );
            }
        }*/
	$data = array();
            if(!empty($key)) 
            {
                $data['key'] = $key;
            } else {
                $data = SugarOutfitters_API::get_default_payload_static($thisModule);
            }

	if(strlen($data['key']) != 35){
                $api_urls = $outfitters_config['api_url'];
            } else {
                $api_urls = $outfitters_config['api_url_rls'];
            }

            foreach($api_urls as $api_url){
                $response = SugarOutfitters_API::call($thisModule,'key/validate',$data,'get',$api_url);
                if($response['success']){
                    break;
                }
            }
             if(empty($response['success']) || $response['success']!==true) 
            {
                $GLOBALS['log']->fatal('OutfittersLicense::doValidate() failed: '.print_r($response,true));
            }
            
            return $response;

        //$post_fields = 'public_key='.$outfitters_config['public_key'].'&key='.$key;

        /*if (isset($outfitters_config['validate_users']) && $outfitters_config['validate_users'] == true) {
            $active_users = get_user_array(false, 'Active', '', false, '', ' AND portal_only=0 AND is_group=0');
            $post_fields .= '&user_count='.count($active_users);
        }

        $url = $outfitters_config['api_url'];

        if (strlen($key) == 35) {
            $url = $outfitters_config['api_url_rls'];
        }

        $curlValidate = self::curlValidate($url, $post_fields);

        $json = getJSONobj();
        $result = $json->decode($curlValidate['response']);

        //if it is not a 200 response assume a 400. Good enough for this purpose.
        if ($curlValidate['info']['http_code'] != 200) {
            $url = $outfitters_config['suite_api_url'];
            $curlValidate = self::curlValidate($url, $post_fields);

            $json = getJSONobj();
            $result = $json->decode($curlValidate['response']);

            if ($curlValidate['info']['http_code'] != 200) {
                $GLOBALS['log']->fatal('Unable to validate: '.print_r($result, true));

                return array(
                      'success' => false,
                      'result' => $result,
                  );
            } else {
                return array(
                        'success' => true,
                        'result' => $result,
                    );
            }
        } else {
            return array(
                    'success' => true,
                    'result' => $result,
                );
        }*/
    }

    /**
     * Only meant to be ran from the scope of the main module. Uses $currentModule.
     */
    public static function change()
    {
        if (empty($_REQUEST['key'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = 'Key is required.';
            $json = getJSONobj();
            echo $json->encode($response);
        }
        if (empty($_REQUEST['user_count'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = 'User count is required.';
            $json = getJSONobj();
            echo $json->encode($response);
        }

        global $currentModule;

        //load license validation config
        require 'modules/'.$currentModule.'/license/config.php';

        $post_fields = 'public_key='.$outfitters_config['public_key'].'&key='.$_REQUEST['key'].'&user_count='.$_REQUEST['user_count'];

        $url = $outfitters_config['api_url'];

        $curlChange = self::curlChange($url, $post_fields);

        //if it is not a 200 response assume a 400. Good enough for this purpose.
        if ($curlChange['info']['http_code'] != 200) {
            $url = $outfitters_config['suite_api_url'];
            $curlChange = self::curlChange($url, $post_fields);

            if ($curlChange['info']['http_code'] != 200) {
                header('HTTP/1.1 400 Bad Request');
                $GLOBALS['log']->fatal('Unable to update the user count: '.print_r($result, true));
            } else {
                require_once 'modules/Administration/Administration.php';
                global $sugar_config, $sugar_version;
                $sugar_config['outfitters_licenses'][$outfitters_config['shortname']] = $_REQUEST['key'];
                rebuildConfigFile($sugar_config, $sugar_version);
            }
        } else {
            require_once 'modules/Administration/Administration.php';
            global $sugar_config, $sugar_version;
            $sugar_config['outfitters_licenses'][$outfitters_config['shortname']] = $_REQUEST['key'];
            rebuildConfigFile($sugar_config, $sugar_version);
        }

        echo $curlChange['response'];
    }

    public static function loadLicenseStrings()
    {
        global $sugar_config, $currentModule, $current_language;

        //load license config file....if it isn't broken don't fix it
        $default_language = $sugar_config['default_language'];

        $langs = array();
        if ($current_language != 'en_us') {
            $langs[] = 'en_us';
        }
        if ($default_language != 'en_us' && $current_language != $default_language) {
            $langs[] = $default_language;
        }
        $langs[] = $current_language;

        foreach ($langs as $lang) {
            $license_strings = array();
            @include_once "modules/rls_Reports/license/language/$lang.lang.php";
            $license_strings_array[] = $license_strings;
        }

        $license_strings = array();
        foreach ($license_strings_array as $license_strings_item) {
            $license_strings = sugarArrayMerge($license_strings, $license_strings_item);
        }

        return $license_strings;
    }

    /**
     * Only meant to be ran from the scope of the main module. Uses $currentModule.
     */
    public static function add()
    {
        if (empty($_REQUEST['licensed_users']) || count($_REQUEST['licensed_users']) == 0) {
            header('HTTP/1.1 400 Bad Request');
            $response = 'No additional licenses were set to be added.';
            $json = getJSONobj();
            echo $json->encode($response);
            exit;
        }

        global $currentModule;

        //load license validation config
        require 'modules/'.$currentModule.'/license/config.php';

        //check to ensure that the licensed_users does not exceed the amount purchased
        $response = self::doValidate($currentModule);

        if (empty($response['success']) || $response['success'] !== true || empty($response['result']['validated'])) {
            header('HTTP/1.1 400 Bad Request');
            $response = 'The license key could not validate. Please check the key and re-validate.';
            $json = getJSONobj();
            echo $json->encode($response);
            exit;
        }

        if ($outfitters_config['validate_users'] == true) {
            if (!empty($response['result']) && (empty($response['result']['validated_users']) || $response['result']['validated_users'] !== true)) {
                header('HTTP/1.1 400 Bad Request');
                $response = 'Insuffient number of user licenses. Please add additional user licenses and try again.';
                $json = getJSONobj();
                echo $json->encode($response);
                exit;
            }
        }

        $fieldDefs = array(
            'id' => array(
                'name' => 'id',
                'vname' => 'LBL_ID',
                'type' => 'id',
                'required' => true,
                'reportable' => true,
            ),
            'deleted' => array(
                'name' => 'deleted',
                'vname' => 'LBL_DELETED',
                'type' => 'bool',
                'default' => '0',
                'reportable' => false,
                'comment' => 'Record deletion indicator',
            ),
            'shortname' => array(
                'name' => 'shortname',
                'vname' => 'LBL_SHORTNAME',
                'type' => 'varchar',
                'len' => 255,
            ),
            'user_id' => array(
                'name' => 'user_id',
                'rname' => 'user_name',
                'module' => 'Users',
                'id_name' => 'user_id',
                'vname' => 'LBL_USER_ID',
                'type' => 'relate',
                'isnull' => 'false',
                'dbType' => 'id',
                'reportable' => true,
                'massupdate' => false,
            ),
        );

        global $db;
        //drop existing
        $sql = "DELETE FROM so_users WHERE shortname = '".$db->quote($outfitters_config['shortname'])."'";
        $db->query($sql, true, 'Unable to reset licensed users for '.$outfitters_config['shortname']);
        foreach ($_REQUEST['licensed_users'] as $licensed_user) {
            $data = array(
                'id' => create_guid(),
                'shortname' => $outfitters_config['shortname'],
                'user_id' => $licensed_user,
                'deleted' => 0,
            );
            $db->insertParams('so_users', $fieldDefs, $data);
        }

        $response = array(
            'success' => true,
        );

        $json = getJSONobj();
        echo $json->encode($response);
        exit;
    }
}

if (!class_exists('SugarOutfitters_API'))
{
    class SugarOutfitters_API
    {
        private function get_default_payload($module,$custom_data = array())
        {
            global $sugar_config, $sugar_flavor, $db;
            $not_set_value = 'not set';
            $data = array();

            //load license validation config
            require('modules/'.$module.'/license/config.php');

            // set the key, check custom data first in case developer wants to explicitly set a key
            if (empty($custom_data['key'])){
                $data['key'] = empty($sugar_config['outfitters_licenses'][$outfitters_config['shortname']]) ? false : $sugar_config['outfitters_licenses'][$outfitters_config['shortname']];
            }else{
                $data['key'] = $custom_data['key'];
            }
            
            // set public key, check custom data first in case developer wants to explicitly set a public key
            if (empty($custom_data['public_key'])){
                $data['public_key'] = empty($outfitters_config['public_key']) ? $not_set_value : $outfitters_config['public_key'];
            }else{
                $data['public_key'] = $custom_data['public_key'];
            }
            
            // set user counts, check custom data first in case developer wants to explicitly set a user count
            if(!empty($custom_data['user_count'])){
                $data['user_count'] = $custom_data['user_count'];
            }else if(isset($outfitters_config['manage_licensed_users']) && $outfitters_config['manage_licensed_users'] == true) {
                //using built-in user license management
                $licensed_users = 0;
                $sql = "SELECT count(*) as the_count FROM so_users WHERE shortname = '".$db->quote($outfitters_config['shortname'])."'";
                $result = $db->query($sql,false,'Unable to reset licensed users for '.$outfitters_config['shortname']);
                $row = $db->fetchByAssoc($result);
                if(!empty($row)) {
                    $licensed_users = $row['the_count'];
                }
                $data['user_count'] = $licensed_users;
            }else{
                $active_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=0');
                $data['user_count'] = empty($active_users) ? 0 : count($active_users);
            }
            
            // other user count types
            $active_group_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=1');
            $data['group_user_count'] = empty($active_group_users) ? 0 : count($active_group_users);
            $active_admin_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=0 AND is_admin=1');
            $data['admin_user_count'] = empty($active_admin_users) ? 0 : count($active_admin_users);
            
            // get sugar edition from global far
            $data['sugar_edition'] = empty($sugar_flavor) ? $not_set_value : $sugar_flavor;
            
            // get sugar_config data
            $data['db_type'] = empty($sugar_config['dbconfig']['db_type']) ? $not_set_value : $sugar_config['dbconfig']['db_type'];
            $data['developerMode'] = $sugar_config['developerMode']===true ? 'true' : 'false';
            $data['host_name'] = empty($sugar_config['host_name']) ? $not_set_value : $sugar_config['host_name'];
            $data['package_scan'] = $sugar_config['moduleInstaller']['packageScan']===true ? 'true' : 'false';
            $data['sugar_version'] = empty($sugar_config['sugar_version']) ? $not_set_value : $sugar_config['sugar_version'];
            $data['site_url'] = empty($sugar_config['site_url']) ? $not_set_value : $sugar_config['site_url'];
        
            // attempt to get addon version
            $data['addon_version'] = $not_set_value;
            if (!empty($outfitters_config['name']))
            {
                $result = $db->query("select version from upgrade_history where id_name = '".$db->quote($outfitters_config['name'])."' order by date_entered DESC");
                $row = $db->fetchByAssoc($result);
                if (!empty($row))
                {
                    $data['addon_version'] = empty($row['version']) ? $not_set_value : $row['version'];
                }
                else
                {
                    $data['addon_version'] = "No Versions Found";
                }
            }
            else
            {
                $data['addon_version'] = "Error: 'name' not set in outfitters_config.";
            }
            
            return $data;
        }



        public static function get_default_payload_static($module,$custom_data = array())
        {
            global $sugar_config, $sugar_flavor, $db;
            $not_set_value = 'not set';
            $data = array();

            //load license validation config
            require('modules/'.$module.'/license/config.php');

            // set the key, check custom data first in case developer wants to explicitly set a key
            if (empty($custom_data['key'])){
                $data['key'] = empty($sugar_config['outfitters_licenses'][$outfitters_config['shortname']]) ? false : $sugar_config['outfitters_licenses'][$outfitters_config['shortname']];
            }else{
                $data['key'] = $custom_data['key'];
            }

            // set public key, check custom data first in case developer wants to explicitly set a public key
            if (empty($custom_data['public_key'])){
                $data['public_key'] = empty($outfitters_config['public_key']) ? $not_set_value : $outfitters_config['public_key'];
            }else{
                $data['public_key'] = $custom_data['public_key'];
            }

            // set user counts, check custom data first in case developer wants to explicitly set a user count
            if(!empty($custom_data['user_count'])){
                $data['user_count'] = $custom_data['user_count'];
            }else if(isset($outfitters_config['manage_licensed_users']) && $outfitters_config['manage_licensed_users'] == true) {
                //using built-in user license management
                $licensed_users = 0;
                $sql = "SELECT count(*) as the_count FROM so_users WHERE shortname = '".$db->quote($outfitters_config['shortname'])."'";
                $result = $db->query($sql,false,'Unable to reset licensed users for '.$outfitters_config['shortname']);
                $row = $db->fetchByAssoc($result);
                if(!empty($row)) {
                    $licensed_users = $row['the_count'];
                }
                $data['user_count'] = $licensed_users;
            }else{
                $active_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=0');
                $data['user_count'] = empty($active_users) ? 0 : count($active_users);
            }

            // other user count types
            $active_group_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=1');
            $data['group_user_count'] = empty($active_group_users) ? 0 : count($active_group_users);
            $active_admin_users = get_user_array(false,'Active','',false,'',' AND portal_only=0 AND is_group=0 AND is_admin=1');
            $data['admin_user_count'] = empty($active_admin_users) ? 0 : count($active_admin_users);

            // get sugar edition from global far
            $data['sugar_edition'] = empty($sugar_flavor) ? $not_set_value : $sugar_flavor;

            // get sugar_config data
            $data['db_type'] = empty($sugar_config['dbconfig']['db_type']) ? $not_set_value : $sugar_config['dbconfig']['db_type'];
            $data['developerMode'] = $sugar_config['developerMode']===true ? 'true' : 'false';
            $data['host_name'] = empty($sugar_config['host_name']) ? $not_set_value : $sugar_config['host_name'];
            $data['package_scan'] = $sugar_config['moduleInstaller']['packageScan']===true ? 'true' : 'false';
            $data['sugar_version'] = empty($sugar_config['sugar_version']) ? $not_set_value : $sugar_config['sugar_version'];
            $data['site_url'] = empty($sugar_config['site_url']) ? $not_set_value : $sugar_config['site_url'];

            // attempt to get addon version
            $data['addon_version'] = $not_set_value;
            if (!empty($outfitters_config['name']))
            {
                $result = $db->query("select version from upgrade_history where id_name = '".$db->quote($outfitters_config['name'])."' order by date_entered DESC");
                $row = $db->fetchByAssoc($result);
                if (!empty($row))
                {
                    $data['addon_version'] = empty($row['version']) ? $not_set_value : $row['version'];
                }
                else
                {
                    $data['addon_version'] = "No Versions Found";
                }
            }
            else
            {
                $data['addon_version'] = "Error: 'name' not set in outfitters_config.";
            }

            return $data;
        }
        
        public static function tag($action,$payload)
        {
            return true;
        }
        
        public static function call($module,$path,$custom_data=array(),$method='post',$api_url)
        {
            if (empty($module))
            {
                return array(
                    'success' => false,
                    'result' => 'Module is not defined.'
                );
            }
            
            if (empty($path))
            {
                return array(
                    'success' => false,
                    'result' => 'API Call Path is not defined.'
                );
            }
            
            if (!is_array($custom_data))
            {
                return array(
                    'success' => false,
                    'result' => 'Data for API Call must be an array.'
                );
            }
            
            //load license validation config and generate url from config
            //require('modules/'.$module.'/license/config.php');
            $url = $api_url . '/' . $path;
            
            // get default payload data
            $data = static::get_default_payload_static($module,$custom_data);
            //$data = $this->get_default_payload($module,$custom_data);
            if(empty($data['key']))
            {
                return array(
                    'success' => false,
                    'result' => 'Key could not be found locally. Please go to the license configuration tool and enter your key.'
                );
            }

            $ch = curl_init();

            // setup data based on type of request
            if ($method === 'post')
            {
                curl_setopt($ch, CURLOPT_POST, 1); 
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
            }
            else
            {
                $url .= '?' . http_build_query($data);
            }
            
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_FAILONERROR, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  

            $response = curl_exec($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);

            $json = getJSONobj();
            $result = $json->decode($response);

            if(!$result){
                $result = "Can't Connect to Server, Please Try Again Later";
            }

            if(!$result){
                $result = "Can't Connect to Server, Please Try Again Later";
            }
            //if it is not a 200 response assume a 400. Good enough for this purpose.
            if($info['http_code'] == 0)
            {
                $GLOBALS['log']->fatal('SugarOutfitters_API::call(): Unable to validate license. Please configure the firewall to allow requests to '.$api_url.'/key/validate and make sure that SSL certs are up to date on the server.');
                return array(
                        'success' => false,
                        'result' => 'SugarOutfitters_API::call(): Unable to validate the license key. Please configure the firewall to allow requests to '.$api_url.'/key/validate and make sure that SSL certs are up to date on the server.'
                    );
            }
            else if($info['http_code'] != 200)
            {
                $GLOBALS['log']->fatal('SugarOutfitters_API::call(): HTTP Request failed: '.print_r($info,true));
                return array(
                    'success' => false,
                    'result' => $result
                );
            } 
            else 
            {
                return array(
                    'success' => true,
                    'result' => $result
                );
            }
        }
    }
}
