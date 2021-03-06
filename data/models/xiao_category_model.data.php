<?php
if (!defined('IN_XIAOCMS')) exit();
return array (
  'primary_key' => 'catid',
  'fields' => 
  array (
    0 => 'catid',
    1 => 'typeid',
    2 => 'modelid',
    3 => 'parentid',
    4 => 'arrparentid',
    5 => 'child',
    6 => 'arrchildid',
    7 => 'catname',
    8 => 'image',
    9 => 'content',
    10 => 'seo_title',
    11 => 'seo_keywords',
    12 => 'seo_description',
    13 => 'catdir',
    14 => 'url',
    15 => 'http',
    16 => 'items',
    17 => 'listorder',
    18 => 'ismenu',
    19 => 'ispost',
    20 => 'verify',
    21 => 'islook',
    22 => 'categorytpl',
    23 => 'listtpl',
    24 => 'showtpl',
    25 => 'pagetpl',
    26 => 'pagesize',
  ),
  'types' => 
  array (
    'catid' => 'int',
    'typeid' => 'int',
    'modelid' => 'int',
    'parentid' => 'int',
    'arrparentid' => 'string',
    'child' => 'int',
    'arrchildid' => 'string',
    'catname' => 'string',
    'image' => 'string',
    'content' => 'blob',
    'seo_title' => 'string',
    'seo_keywords' => 'string',
    'seo_description' => 'string',
    'catdir' => 'string',
    'url' => 'string',
    'http' => 'string',
    'items' => 'int',
    'listorder' => 'int',
    'ismenu' => 'int',
    'ispost' => 'int',
    'verify' => 'int',
    'islook' => 'int',
    'categorytpl' => 'string',
    'listtpl' => 'string',
    'showtpl' => 'string',
    'pagetpl' => 'string',
    'pagesize' => 'int',
  ),
);