<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Home/views/view.list.php');

class CustomHomeViewList extends HomeViewList
{
    public function display()
    {
        parent::display();
        
        $dashlets = $current_user->getPreference('dashlets', 'Home');                                
        $str = '';
        foreach ($dashlets as $index => $value) {
            if ($value['module'] == 'rls_Reports') $str .= "'{$index}',";
        }
                
        if ($str) {
            $str = substr($str, 0, -1);
            echo "<script language='javascript'>        
                      var q = [{$str}];
                      var fn = (function(q) { // closure
                          var i = 0;
                          return function(q) {                                                                
                              SUGAR.mySugar.retrieveDashlet(q[i], null, function() {
                                  if (i+1 < q.length) { i++; fn(q); }
                              });
                              return i;
                            }
                      })();
                                                
                      $(window).load(function() { // start update after load page
                          fn(q);
                      });
                  </script>";
        }
    }
}
