<?php
$viewdefs ['Cases'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CASE_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_case_information' => 
      array (
        0 => 
        array (
          0 => 'account_name',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'categories_c',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORIES',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'casestatus_c',
            'studio' => 'visible',
            'label' => 'LBL_CASESTATUS',
          ),
          1 => 
          array (
            'name' => 'escalated_c',
            'studio' => 'visible',
            'label' => 'LBL_ESCALATED',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'resolution',
            'comment' => 'The resolution of the case',
            'label' => 'LBL_RESOLUTION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
;
?>
