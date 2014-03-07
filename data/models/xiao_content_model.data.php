<?php
if (!defined('IN_XIAOCMS')) exit();
return array (
  'primary_key' => 'id',
  'fields' => 
  array (
    0 => 'id',
    1 => 'catid',
    2 => 'modelid',
    3 => 'title',
    4 => 'thumb',
    5 => 'keywords',
    6 => 'description',
    7 => 'url',
    8 => 'listorder',
    9 => 'status',
    10 => 'hits',
    11 => 'username',
    12 => 'inputtime',
  ),
  'types' => 
  array (
    'id' => 'int',
    'catid' => 'int',
    'modelid' => 'int',
    'title' => 'string',
    'thumb' => 'string',
    'keywords' => 'string',
    'description' => 'string',
    'url' => 'string',
    'listorder' => 'int',
    'status' => 'int',
    'hits' => 'int',
    'username' => 'string',
    'inputtime' => 'int',
  ),
);