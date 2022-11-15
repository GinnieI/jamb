<?php
$dashletData['CasesDashlet']['searchFields'] = array (
  'account_name' => 
  array (
    'default' => '',
  ),
  'categories_c' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
);
$dashletData['CasesDashlet']['columns'] = array (
  'account_name' => 
  array (
    'width' => '29%',
    'link' => true,
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'ACLTag' => 'ACCOUNT',
    'label' => 'LBL_ACCOUNT_NAME',
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
    'name' => 'account_name',
    'default' => true,
  ),
  'categories_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CATEGORIES',
    'width' => '10%',
  ),
  'casestatus_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CASESTATUS',
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => true,
  ),
  'case_number' => 
  array (
    'width' => '6%',
    'label' => 'LBL_NUMBER',
    'default' => false,
    'name' => 'case_number',
  ),
  'status' => 
  array (
    'width' => '8%',
    'label' => 'LBL_STATUS',
    'default' => false,
    'name' => 'status',
  ),
  'priority' => 
  array (
    'width' => '15%',
    'label' => 'LBL_PRIORITY',
    'default' => false,
    'name' => 'priority',
  ),
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => false,
    'name' => 'name',
  ),
  'resolution' => 
  array (
    'width' => '8%',
    'label' => 'LBL_RESOLUTION',
    'name' => 'resolution',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
