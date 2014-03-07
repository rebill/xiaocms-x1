<?php
/**
 * xiaocms.php
 * 框架入口文件
 */
define('IN_XIAOCMS', true);
error_reporting(E_ALL^E_NOTICE);

/**
 * 配置
 */
define('ENTRY_SCRIPT_NAME',  'index.php');//定义入口文件名
define('HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');// 来源
define('ADMIN_DIR',     'admin');                                  //后台模板和css路径
define('SYS_START_TIME',     microtime(true));                                  //设置程序开始执行时间
define('CORE_PATH',           dirname(__FILE__) . DIRECTORY_SEPARATOR);          //核心文件所在路径
define('DATA_DIR',         XIAOCMS_PATH . 'data' . DIRECTORY_SEPARATOR);        //data目录的路径
define('TEMPLATE_DIR',           XIAOCMS_PATH . 'template' . DIRECTORY_SEPARATOR);         //模板目录的路径
define('MODEL_DIR',          CORE_PATH . 'models' . DIRECTORY_SEPARATOR);           //model目录的路径
define('CONTROLLER_DIR',     CORE_PATH . 'controllers' . DIRECTORY_SEPARATOR);   //controller目录的路径
define('COOKIE_PRE',			'xiaocms_');//Cookie 前缀，同一域名下安装多套系统时，请修改Cookie前缀

date_default_timezone_set('Asia/Shanghai');//时区设置

xiaocms::load_file(CORE_PATH . 'library' . DIRECTORY_SEPARATOR . 'global.function.php');//加载全局函数
xiaocms::load_file(CORE_PATH . 'version.php');
xiaocms::load_class('Model','',0);

/**
 * 系统核心全局控制类
 */

abstract class xiaocms {
	public static $namespace;
	public static $controller;
	public static $action;
	/**
	 * 分析URL信息
	 */
	private static function parse_request() {
		$path_url_string = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] ? $_SERVER['QUERY_STRING'] : $_SERVER['REQUEST_URI'];
		$new_url_string  = '';
		if (!isset($_SERVER['QUERY_STRING']) || empty($_SERVER['QUERY_STRING'])) {
			$router_config_file = DATA_DIR . 'config/router.ini.php';
			if (is_file($router_config_file)) {
				$router_array   = require_once $router_config_file;
				if (is_array($router_array) && !empty($router_array)) {
					$path_url_router = str_replace(str_replace('/' . ENTRY_SCRIPT_NAME, '', $_SERVER['SCRIPT_NAME']), '', $_SERVER['REQUEST_URI']);
					$path_url_router = str_replace('/' . ENTRY_SCRIPT_NAME, '', $path_url_router);
					if (substr($path_url_router, 0, 1) == '/') $path_url_router = substr($path_url_router, 1);
					if ($path_url_router) {
						foreach ($router_array as $router_key=>$router_value) {									
							if (preg_match('#' . $router_key . '#', $path_url_router)) {
							    $new_url_string = preg_replace('#' . $router_key . '#', $router_value, $path_url_router);
								break;
							}
						}
						if (empty($new_url_string)) exit('没有找到该目录，请检查伪静态配置.');
					}
				}
			}
		}
		$path_url_string  = $new_url_string ? $new_url_string : $path_url_string;
		parse_str($path_url_string, $url_info_array);
		$namespace_name   = trim((isset($url_info_array['s']) && $url_info_array['s']) ? $url_info_array['s'] : '');
		$controller_name  = trim((isset($url_info_array['c']) && $url_info_array['c']) ? $url_info_array['c'] : 'Index'); //controller默认为index
		$action_name      = trim((isset($url_info_array['a']) && $url_info_array['a']) ? $url_info_array['a'] : 'index'); //action默认为index
		self::$namespace  = strtolower($namespace_name);
		self::$controller = ucfirst(strtolower($controller_name));
		self::$action 	  = strtolower($action_name);
		$_GET             = array_merge($_GET, $url_info_array);
		return true;
	}
	
	/**
	 * 项目运行函数
	 */
	public static function run() {
		$config         = self::load_config('config');
		if ($config['SITE_MOBILE'] == true && is_mobile()) {
			$config['SITE_THEME'] =  (is_dir(TEMPLATE_DIR . 'mobile') ? 'mobile' : $config['SITE_THEME']);
		}
		static $_app	= array();
		$app_id 		= self::$controller . '_' . self::$action;
		define('SYS_THEME_DIR',	$config['SITE_THEME'] . DIRECTORY_SEPARATOR);	//模板风格
		self::parse_request();
		if (!isset($_app[$app_id]) || $_app[$app_id] == null) {
			$namespace  = self::$namespace;
			$controller = self::$controller . 'Controller';
			$action     = self::$action . 'Action';
			self::load_file(CONTROLLER_DIR . 'Controller.php');
			if ($namespace && is_dir(CONTROLLER_DIR . $namespace)) {
				$controller_file = CONTROLLER_DIR . $namespace . DIRECTORY_SEPARATOR . $controller . '.php';
				if (!is_file($controller_file)) exit('Controller does not exist.');
				if (is_file(CONTROLLER_DIR . $namespace . DIRECTORY_SEPARATOR . 'Controller.php')) self::load_file(CONTROLLER_DIR . $namespace . DIRECTORY_SEPARATOR . 'Controller.php');
			    self::load_file($controller_file);
			} elseif (is_file(CONTROLLER_DIR . $controller . '.php')) {	
				self::load_file(CONTROLLER_DIR . $controller . '.php');				
			} else {
			   exit('Controller does not exist.');
			}
			$app_object = new $controller();
			if (method_exists($controller, $action)) {
				$_app[$app_id] = $app_object->$action();
			} else {
				exit('Action does not exist.');
			}
		}
		return $_app[$app_id];
	}
	
	/**
	 * 静态加载文件(相当于PHP函数require_once)
	 */
	public static function load_file($file_name) {
		static $_inc_files = array();
		//参数分析
		if (!$file_name) return false;
		 if (!isset($_inc_files[$file_name])) {
			if (!file_exists($file_name)) {
				exit('The file:' . $file_name . ' not found!');
			}
			include_once $file_name;
			$_inc_files[$file_name] = true;
		}
		
		return $_inc_files[$file_name];
	}
	

	/**
	 * 加载配置文件
	 * @param string $file 配置文件
	 * @param string $key  要获取的配置荐
	 * @param string $default  默认配置。当获取配置项目失败时该值发生作用。
	 */
	public static function load_config($file) {
		static $configs = array();
		$path = XIAOCMS_PATH . 'data' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $file . '.ini.php';
		if (file_exists($path)) {
			$configs[$file] = include $path;
			return $configs[$file];
		}
	}

	/**
	 * 加载数据模型
	 * @param string $classname 类名
	 */
	public static function load_model($table_name) {
		$model_name = ucfirst(strtolower($table_name)) . 'Model';
		return self::load_class($model_name,'models');
	}
	
	/**
	 * 加载类
	 * @param string $classname 类名
	 * @param string $path 扩展地址
	 * @param intger $initialize 是否初始化
	 */
	public static function load_class($classname, $path = '', $initialize = 1) {
		static $classes = array();
		if (empty($path)) $path = 'library';
		
		$key = md5($path.$classname);
		if (isset($classes[$key])) {
			if (!empty($classes[$key])) {
				return $classes[$key];
			} else {
				return true;
			}
		}
		if (file_exists(CORE_PATH.$path.DIRECTORY_SEPARATOR.$classname.'.class.php')) {
			include CORE_PATH.$path.DIRECTORY_SEPARATOR.$classname.'.class.php';
			$name = $classname;
			if ($initialize) {
				$classes[$key] = new $name;
			} else {
				$classes[$key] = true;
			}
			return $classes[$key];
		} else {
			return false;
		}
	}
		

	/**
	 * 获取当前运行的namespace名称
	 */
	public static function get_namespace_id() {
		return strtolower(self::$namespace);
	}
	
	/**
	 * 获取当前运行的controller名称
	 */
	public static function get_controller_id() {
		return strtolower(self::$controller);
	}
	
	/**
	 * 获取当前运行的action名称
	 */
	public static function get_action_id() {
		return self::$action;
	}

}
