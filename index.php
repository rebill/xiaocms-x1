<?php
/**
 * index.php 入口文件
 */
header('Content-Type: text/html; charset=utf-8');
define('XIAOCMS_PATH',   dirname(__FILE__) . DIRECTORY_SEPARATOR);
include XIAOCMS_PATH . 'core/xiaocms.php';
xiaocms::run();