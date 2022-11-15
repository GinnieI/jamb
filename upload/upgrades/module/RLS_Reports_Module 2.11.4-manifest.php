<?php
/*   IMPORTANT!
*   READ CAREFULLY:
*
*   This file is part of Software produced by Richlode Solutions LLC. The Software is protected by proprietary license.
*   This Software and the accompanying written materials are copyrighted and protected by copyright laws and international copyright treaties, as well as other intellectual property and trade-secret laws and treaties. Unauthorized
*   copying of the Software, including Software that has been modified, merged, or included with other Software, or of the written materials, is expressly forbidden. You may be held legally responsible for any copyright infringement
*   that is caused or encouraged by your failure to abide by the terms of this license.
*
*   For more details, please contact Manufacturer.
*
*   Manufacturer is Richlode Solutions LLC.

*   Contact:
*   http://richlodesolutions.com
*   info@richlodesolutions.com
*   t.US: +1 310 3621732
*   t.UK: +44 2030 513638
*/

$manifest = array (
  'acceptable_sugar_versions' =>
  array (
  ),

  'acceptable_sugar_flavors' =>
  array (
    'CE'
  ),
  'readme'=>'',
  'key'=>'rls',
  'author' => 'RLS',
  'description' => 'Reports modules for Community Edition by Richlode Solutions',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'RLS Reports Module',
  'published_date' => '2017-10-26',
  'type' => 'module',
  'version' => '2.11.4',
  'remove_tables' => 'prompt',
);

$installdefs = array (
  'id' => 'RLS_Reports_Module',
  'beans' =>
  array (
    array (
      'module' => 'rls_Reports',
      'class' => 'rls_Reports',
      'path' => 'modules/rls_Reports/rls_Reports.php',
      'tab' => true,
    ),
    array (
      'module' => 'rls_Dashboards',
      'class' => 'rls_Reports',
      'path' => 'modules/rls_Reports/rls_Reports.php',
      'tab' => true,
    ),
    array (
      'module' => 'RLS_Scheduling_Reports',
      'class' => 'RLS_Scheduling_Reports',
      'path' => 'modules/RLS_Scheduling_Reports/RLS_Scheduling_Reports.php',
      'tab' => true,
    ),
  ),

  'logic_hooks' =>
  array (
    array (
      'module' => 'RLS_Scheduling_Reports',
      'hook' => 'before_save',
      'order' => 100010,
      'description' => 'Set next runtime',
      'file' => 'modules/RLS_Scheduling_Reports/hooks/SchedulingReportsHooks.php',
      'class' => 'SchedulingReportsHooks',
      'function' => 'set_next_runtime',
    ),
  ),

  'layoutdefs' =>
  array (
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_contacts_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_users_Users.php',
      'to_module' => 'Users',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_users_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_rls_reports_rls_Reports.php',
      'to_module' => 'rls_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/rls_scheduling_reports_rls_reports_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
  ),

  'relationships' =>
  array (
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/rls_scheduling_reports_contactsMetaData.php',
    ),
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/rls_scheduling_reports_usersMetaData.php',
    ),
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/rls_scheduling_reports_rls_reportsMetaData.php',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'copy' =>
  array (
    array (
      'from' => '<basepath>/copy/Extension/modules/Schedulers/Ext/Language/en_us.SendReports.php',
      'to' => 'custom/Extension/modules/Schedulers/Ext/Language/en_us.SendReports.php',
    ),
    array (
      'from' => '<basepath>/copy/Extension/modules/Schedulers/Ext/ScheduledTasks/SendReports.php',
      'to' => 'custom/Extension/modules/Schedulers/Ext/ScheduledTasks/SendReports.php',
    ),

    array (
      'from' => '<basepath>/copy/include/tcpdf/fonts/helvetica.php',
      'to' => 'include/tcpdf/fonts/helvetica.php',
    ),
    array (
      'from' => '<basepath>/copy/include/tcpdf/fonts/verdanai.php',
      'to' => 'include/tcpdf/fonts/verdanai.php',
    ),
    array (
      'from' => '<basepath>/copy/include/tcpdf/fonts/verdanai.ctg.z',
      'to' => 'include/tcpdf/fonts/verdanai.ctg.z',
    ),
    array (
      'from' => '<basepath>/copy/include/tcpdf/fonts/verdanai.z',
      'to' => 'include/tcpdf/fonts/verdanai.z',
    ),
//    array (
//      'from' => '<basepath>/copy/include/tabConfig.php',
//      'to' => 'custom/include/tabConfig.php',
//    ),
    array (
      'from' => '<basepath>/copy/Extension/application/Ext/Language/en_us.lang.php',
      'to' => 'custom/Extension/application/Ext/Language/en_us.lang.php',
    ),
    array (
      'from' => '<basepath>/copy/Extension/application/Ext/Language/ru_ru.lang.php',
      'to' => 'custom/Extension/application/Ext/Language/ru_ru.lang.php',
    ),
    
//    array (
//      'from' => '<basepath>/SugarModules/modules',
//      'to' => 'modules',
//    ),

    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/Dashlets/RLS_Scheduling_ReportsDashlet/RLS_Scheduling_ReportsDashlet.meta.php',
      'to' => 'modules/RLS_Scheduling_Reports/Dashlets/RLS_Scheduling_ReportsDashlet/RLS_Scheduling_ReportsDashlet.meta.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/Dashlets/RLS_Scheduling_ReportsDashlet/RLS_Scheduling_ReportsDashlet.php',
      'to' => 'modules/RLS_Scheduling_Reports/Dashlets/RLS_Scheduling_ReportsDashlet/RLS_Scheduling_ReportsDashlet.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/RLS_Scheduling_Reports.php',
      'to' => 'modules/RLS_Scheduling_Reports/RLS_Scheduling_Reports.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/RLS_Scheduling_Reports_sugar.php',
      'to' => 'modules/RLS_Scheduling_Reports/RLS_Scheduling_Reports_sugar.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/controller.php',
      'to' => 'modules/RLS_Scheduling_Reports/controller.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/hooks/SchedulingReportsHooks.php',
      'to' => 'modules/RLS_Scheduling_Reports/hooks/SchedulingReportsHooks.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/language/en_us.lang.php',
      'to' => 'modules/RLS_Scheduling_Reports/language/en_us.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/SearchFields.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/SearchFields.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/dashletviewdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/dashletviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/detailviewdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/detailviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/editviewdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/editviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/listviewdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/listviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/metafiles.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/metafiles.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/popupdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/popupdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/quickcreatedefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/quickcreatedefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/searchdefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/searchdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/studio.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/studio.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/subpaneldefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/subpaneldefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/metadata/subpanels/default.php',
      'to' => 'modules/RLS_Scheduling_Reports/metadata/subpanels/default.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/RLS_Scheduling_Reports/vardefs.php',
      'to' => 'modules/RLS_Scheduling_Reports/vardefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Dashboards/index.php',
      'to' => 'modules/rls_Dashboards/index.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Dashboards/language/en_us.lang.php',
      'to' => 'modules/rls_Dashboards/language/en_us.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Dashboards/language/ru_ru.lang.php',
      'to' => 'modules/rls_Dashboards/language/ru_ru.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Dashboards/rls_Reports.php',
      'to' => 'modules/rls_Dashboards/rls_Reports.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Dashlets/MyReports/configure.tpl',
      'to' => 'modules/rls_Reports/Dashlets/MyReports/configure.tpl',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Dashlets/MyReports/rls_MyReports.meta.php',
      'to' => 'modules/rls_Reports/Dashlets/MyReports/rls_MyReports.meta.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Dashlets/MyReports/rls_MyReports.php',
      'to' => 'modules/rls_Reports/Dashlets/MyReports/rls_MyReports.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Dashlets/rls_ReportsDashlet/rls_ReportsDashlet.meta.php',
      'to' => 'modules/rls_Reports/Dashlets/rls_ReportsDashlet/rls_ReportsDashlet.meta.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Dashlets/rls_ReportsDashlet/rls_ReportsDashlet.php',
      'to' => 'modules/rls_Reports/Dashlets/rls_ReportsDashlet/rls_ReportsDashlet.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/DynamicAction.php',
      'to' => 'modules/rls_Reports/DynamicAction.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/Menu.php',
      'to' => 'modules/rls_Reports/Menu.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Dashboard/Dashlets.php',
      'to' => 'modules/rls_Reports/classes/Dashboard/Dashlets.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Dashboard/Layout.php',
      'to' => 'modules/rls_Reports/classes/Dashboard/Layout.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Dashboard/Tabs.php',
      'to' => 'modules/rls_Reports/classes/Dashboard/Tabs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Dashboard/View.php',
      'to' => 'modules/rls_Reports/classes/Dashboard/View.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Columns.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Columns.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Drilldown.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Drilldown.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Drilldown/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Drilldown/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Drilldown/Date.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Drilldown/Date.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Drilldown/Users.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Drilldown/Users.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Funnel.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Funnel.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/None.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/None.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Chart/Pie.php',
      'to' => 'modules/rls_Reports/classes/Reports/Chart/Pie.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/DisplayColumns.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/DisplayColumns.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/DisplayFilters.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/DisplayFilters.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/DisplayGroupBy.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/DisplayGroupBy.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/DisplaySummaries.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/DisplaySummaries.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/Fields.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/Fields.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/FieldsControl.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/FieldsControl.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/Grid.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/Grid.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/Modules.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/Modules.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/ModulesControl.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/ModulesControl.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayColumns.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayColumns.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayFilters.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayFilters.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayGroupBy.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/tpls/DisplayGroupBy.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Configurator/tpls/DisplaySummaries.php',
      'to' => 'modules/rls_Reports/classes/Reports/Configurator/tpls/DisplaySummaries.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Collection.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Collection.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Criterion.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Criterion.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Date.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Date.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Days.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Days.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Hours.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Hours.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Months.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Months.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Quarters.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Quarters.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Weeks.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Weeks.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Grouping/Year.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Grouping/Year.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Operations.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Operations.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Data/Summarizing.php',
      'to' => 'modules/rls_Reports/classes/Reports/Data/Summarizing.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Collection.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Collection.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Condition.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Condition.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Dropdown.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Dropdown.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Multiselect.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Multiselect.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Number.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Number.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Periods.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Periods.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/PeriodsForDateTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/PeriodsForDateTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/PeriodsWithoutTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/PeriodsWithoutTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Relate.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Relate.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/RlsBool.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/RlsBool.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/RlsString.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/RlsString.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Skills.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Skills.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Conditions/Users.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Conditions/Users.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Dropdown.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Dropdown.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/FilterControl.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/FilterControl.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Grouping.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Grouping.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Multiselect.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Multiselect.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Number.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Number.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Periods.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Periods.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/PeriodsForDateTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/PeriodsForDateTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/PeriodsWithoutTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/PeriodsWithoutTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Quarters.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Quarters.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Relate.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Relate.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/RlsBool.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/RlsBool.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/RlsString.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/RlsString.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Skills.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Skills.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Controls/Users.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Controls/Users.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/Number.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/Number.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/Periods.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/Periods.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/PeriodsForDateTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/PeriodsForDateTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/PeriodsWithoutTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/PeriodsWithoutTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/Relate.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/Relate.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Filter/tpls/Skills.php',
      'to' => 'modules/rls_Reports/classes/Reports/Filter/tpls/Skills.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Checkbox.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Checkbox.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Date.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Date.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/DateTime.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/DateTime.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Dropdawn.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Dropdawn.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Multienum.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Multienum.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Name.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Name.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Radioenum.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Radioenum.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Cell/Varchar.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Cell/Varchar.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Grouped.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Grouped.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/NoGrouped.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/NoGrouped.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Grid/Sheet.php',
      'to' => 'modules/rls_Reports/classes/Reports/Grid/Sheet.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/PDF/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/PDF/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/PDF/Content.php',
      'to' => 'modules/rls_Reports/classes/Reports/PDF/Content.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/PDF/DefaultType.php',
      'to' => 'modules/rls_Reports/classes/Reports/PDF/DefaultType.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/PDF/DefaultTypeForSchedulers.php',
      'to' => 'modules/rls_Reports/classes/Reports/PDF/DefaultTypeForSchedulers.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/PDF/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/PDF/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/Factory.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/Factory.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/Joins.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/Joins.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/Report.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/Report.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/Storage.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/Storage.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/WIzard/Basic.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/WIzard/Basic.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayFields.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayFields.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayFilters.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayFilters.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayGroupBy.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/WIzard/DisplayGroupBy.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/Reports/Settings/WIzard/DisplaySummaries.php',
      'to' => 'modules/rls_Reports/classes/Reports/Settings/WIzard/DisplaySummaries.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/classes/load.php',
      'to' => 'modules/rls_Reports/classes/load.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/controller.php',
      'to' => 'modules/rls_Reports/controller.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/css/ReportsView.css',
      'to' => 'modules/rls_Reports/css/ReportsView.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/css/dashboard.css',
      'to' => 'modules/rls_Reports/css/dashboard.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/css/wizard.css',
      'to' => 'modules/rls_Reports/css/wizard.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/dashboard.php',
      'to' => 'modules/rls_Reports/dashboard.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/exportCSV1.php',
      'to' => 'modules/rls_Reports/exportCSV1.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/functions/template.php',
      'to' => 'modules/rls_Reports/functions/template.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/functions/wizardStepOne.php',
      'to' => 'modules/rls_Reports/functions/wizardStepOne.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/images/advanced_search.gif',
      'to' => 'modules/rls_Reports/images/advanced_search.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/images/basic_search.gif',
      'to' => 'modules/rls_Reports/images/basic_search.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/DetailView.js',
      'to' => 'modules/rls_Reports/js/DetailView.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/EditView.js',
      'to' => 'modules/rls_Reports/js/EditView.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/adminPanel.js',
      'to' => 'modules/rls_Reports/js/adminPanel.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard-onready.js',
      'to' => 'modules/rls_Reports/js/dashboard-onready.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/Dashboard.Dashlets.js',
      'to' => 'modules/rls_Reports/js/dashboard/Dashboard.Dashlets.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/Dashboard.Layout.js',
      'to' => 'modules/rls_Reports/js/dashboard/Dashboard.Layout.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/Dashboard.Tabs.js',
      'to' => 'modules/rls_Reports/js/dashboard/Dashboard.Tabs.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/Dashboard.js',
      'to' => 'modules/rls_Reports/js/dashboard/Dashboard.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/MySugar.js',
      'to' => 'modules/rls_Reports/js/dashboard/MySugar.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/dashboard/dashlets.js',
      'to' => 'modules/rls_Reports/js/dashboard/dashlets.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/jquery.cookie.js',
      'to' => 'modules/rls_Reports/js/jquery.cookie.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard-onready.js',
      'to' => 'modules/rls_Reports/js/wizard-onready.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Control.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Control.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Drilldown.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Drilldown.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Fields.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Fields.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Grid.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Grid.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Modules.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Modules.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.Request.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.Request.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/js/wizard/Wizard.js',
      'to' => 'modules/rls_Reports/js/wizard/Wizard.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/language/en_us.lang.php',
      'to' => 'modules/rls_Reports/language/en_us.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/language/ru_ru.lang.php',
      'to' => 'modules/rls_Reports/language/ru_ru.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/jquery.jstree.js',
      'to' => 'modules/rls_Reports/libs/jstree/jquery.jstree.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/apple/bg.jpg',
      'to' => 'modules/rls_Reports/libs/jstree/themes/apple/bg.jpg',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/apple/d.png',
      'to' => 'modules/rls_Reports/libs/jstree/themes/apple/d.png',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/apple/dot_for_ie.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/apple/dot_for_ie.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/apple/style.css',
      'to' => 'modules/rls_Reports/libs/jstree/themes/apple/style.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/apple/throbber.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/apple/throbber.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/classic/d.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/classic/d.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/classic/d.png',
      'to' => 'modules/rls_Reports/libs/jstree/themes/classic/d.png',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/classic/dot_for_ie.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/classic/dot_for_ie.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/classic/style.css',
      'to' => 'modules/rls_Reports/libs/jstree/themes/classic/style.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/classic/throbber.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/classic/throbber.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default-rtl/d.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default-rtl/d.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default-rtl/d.png',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default-rtl/d.png',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default-rtl/dots.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default-rtl/dots.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default-rtl/style.css',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default-rtl/style.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default-rtl/throbber.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default-rtl/throbber.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default/d.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default/d.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default/d.png',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default/d.png',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default/style.css',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default/style.css',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/jstree/themes/default/throbber.gif',
      'to' => 'modules/rls_Reports/libs/jstree/themes/default/throbber.gif',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/libs/tabs/rls_tabs.js',
      'to' => 'modules/rls_Reports/libs/tabs/rls_tabs.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/OutfittersLicense.php',
      'to' => 'modules/rls_Reports/license/OutfittersLicense.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/config.php',
      'to' => 'modules/rls_Reports/license/config.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/de_de.lang.php',
      'to' => 'modules/rls_Reports/license/language/de_de.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/en_us.lang.php',
      'to' => 'modules/rls_Reports/license/language/en_us.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/es_es.lang.php',
      'to' => 'modules/rls_Reports/license/language/es_es.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/fr_FR.lang.php',
      'to' => 'modules/rls_Reports/license/language/fr_FR.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/hu_hu.lang.php',
      'to' => 'modules/rls_Reports/license/language/hu_hu.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/it_it.lang.php',
      'to' => 'modules/rls_Reports/license/language/it_it.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/nl_NL.lang.php',
      'to' => 'modules/rls_Reports/license/language/nl_NL.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/pt_br.lang.php',
      'to' => 'modules/rls_Reports/license/language/pt_br.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/ru_ru.lang.php',
      'to' => 'modules/rls_Reports/license/language/ru_ru.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/language/ua_ua.lang.php',
      'to' => 'modules/rls_Reports/license/language/ua_ua.lang.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/lib/jquery-1.7.1.min.js',
      'to' => 'modules/rls_Reports/license/lib/jquery-1.7.1.min.js',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/license/tpls/license.tpl',
      'to' => 'modules/rls_Reports/license/tpls/license.tpl',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/SearchFields.php',
      'to' => 'modules/rls_Reports/metadata/SearchFields.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/dashletviewdefs.php',
      'to' => 'modules/rls_Reports/metadata/dashletviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/detailviewdefs.php',
      'to' => 'modules/rls_Reports/metadata/detailviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/editviewdefs.php',
      'to' => 'modules/rls_Reports/metadata/editviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/listviewdefs.php',
      'to' => 'modules/rls_Reports/metadata/listviewdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/metafiles.php',
      'to' => 'modules/rls_Reports/metadata/metafiles.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/popupdefs.php',
      'to' => 'modules/rls_Reports/metadata/popupdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/quickcreatedefs.php',
      'to' => 'modules/rls_Reports/metadata/quickcreatedefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/searchdefs.php',
      'to' => 'modules/rls_Reports/metadata/searchdefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/studio.php',
      'to' => 'modules/rls_Reports/metadata/studio.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/subpaneldefs.php',
      'to' => 'modules/rls_Reports/metadata/subpaneldefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/metadata/subpanels/default.php',
      'to' => 'modules/rls_Reports/metadata/subpanels/default.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/outfitterscontroller.php',
      'to' => 'modules/rls_Reports/outfitterscontroller.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/rls_Reports.php',
      'to' => 'modules/rls_Reports/rls_Reports.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/rls_Reports_sugar.php',
      'to' => 'modules/rls_Reports/rls_Reports_sugar.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/settings/settings.php',
      'to' => 'modules/rls_Reports/settings/settings.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/dashboard.php',
      'to' => 'modules/rls_Reports/tpls/dashboard.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/report.php',
      'to' => 'modules/rls_Reports/tpls/report.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard.php',
      'to' => 'modules/rls_Reports/tpls/wizard.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard_1.php',
      'to' => 'modules/rls_Reports/tpls/wizard_1.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard_2.php',
      'to' => 'modules/rls_Reports/tpls/wizard_2.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard_3.php',
      'to' => 'modules/rls_Reports/tpls/wizard_3.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard_4_group_by.php',
      'to' => 'modules/rls_Reports/tpls/wizard_4_group_by.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/tpls/wizard_5_summaries.php',
      'to' => 'modules/rls_Reports/tpls/wizard_5_summaries.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/vardefs.php',
      'to' => 'modules/rls_Reports/vardefs.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/views/view.detail.php',
      'to' => 'modules/rls_Reports/views/view.detail.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/views/view.edit.php',
      'to' => 'modules/rls_Reports/views/view.edit.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/views/view.license.php',
      'to' => 'modules/rls_Reports/views/view.license.php',
    ),
    array (
      'from' => '<basepath>/SugarModules/modules/rls_Reports/wizardStepOne.php',
      'to' => 'modules/rls_Reports/wizardStepOne.php',
    ),
    
  // end copy <basepath>/SugarModules/modules'
    
    array (
      'from' => '<basepath>/copy/custom/modules/Home/views/view.list.php',
      'to' => 'custom/modules/Home/views/view.list.php',
    ),    

//    array (
//      'from' => '<basepath>/copy/include/SugarCharts/SugarChart.php',
//      'to' => 'include/SugarCharts/SugarChart.php',
//    ),


    array (
      'from' => '<basepath>/copy/custom/modules/Configurator/rls_Reports_configurator.tpl',
      'to' => 'custom/modules/Configurator/rls_Reports_configurator.tpl',
    ),
    
    array (
      'from' => '<basepath>/copy/custom/modules/Configurator/rls_Reports_configurator.php',
      'to' => 'custom/modules/Configurator/rls_Reports_configurator.php',
    ),
    
    array (
      'from' => '<basepath>/copy/custom/include/javascript/jquery.blockUI.js',
      'to' => 'custom/include/javascript/jquery.blockUI.js',
    ),

    array (
      'from' => '<basepath>/copy/custom/include/img/busy.gif',
      'to' => 'custom/include/img/busy.gif',
    ),

    array (
      'from' => '<basepath>/copy/custom/Extension/modules/Administration/Ext/Language/en_us.Reports_configurator.php',
      'to' => 'custom/Extension/modules/Administration/Ext/Language/en_us.Reports_configurator.php',
    ),

    array (
      'from' => '<basepath>/copy/custom/Extension/modules/Administration/Ext/Administration/rls_Reports_configurator.php',
      'to' => 'custom/Extension/modules/Administration/Ext/Administration/rls_Reports_configurator.php',
    ),
    array (
      'from' => '<basepath>/copy/custom/modules/rls_Reports/metadata/detailviewdefs.php',
      'to' => 'custom/modules/rls_Reports/metadata/detailviewdefs.php',
    ),
  ),

  'language' =>
  array (
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/language/application/ru_ru.lang.php',
      'to_module' => 'application',
      'language' => 'ru_ru',
    ),
    array (
      'from' => '<basepath>/copy/license_admin/language/en_us.rls_Reports.php',
      'to_module' => 'Administration',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/copy/Extension/modules/Home/Ext/Language/en_us.lang.php',
      'to_module' => 'Home',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/language/RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Users.php',
      'to_module' => 'Users',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/language/RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/language/rls_Reports.php',
      'to_module' => 'rls_Reports',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/language/RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
      'language' => 'en_us',
    ),
  ),

  'vardefs' =>
  array (
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_contacts_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_users_Users.php',
      'to_module' => 'Users',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_users_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_rls_reports_rls_Reports.php',
      'to_module' => 'rls_Reports',
    ),
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/rls_scheduling_reports_rls_reports_RLS_Scheduling_Reports.php',
      'to_module' => 'RLS_Scheduling_Reports',
    ),
  ),

  'administration' =>
  array (
    array (
      'from' => '<basepath>/copy/license_admin/menu/rls_Reports_admin.php',
      'to' => 'modules/Administration/rls_Reports_admin.php',
    ),
  ),

  'action_view_map' =>
  array (
    array (
      'from'=> '<basepath>/copy/license_admin/actionviewmap/rls_Reports_actionviewmap.php',
      'to_module'=> 'rls_Reports',
    ),
   ),

  'post_execute' => array (
     0 => '<basepath>/install/post_execute.php',
   ),
);
