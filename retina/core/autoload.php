<?php
/*
 * ---------------------------------------------------------------------
 * Autoload
 * ---------------------------------------------------------------------
 * This class is used for loading all library files from library folder
 * and package files from package folder.
 *
 */

class Autoload{

	public static function libraries(){
	    foreach (glob("retina/library/*.php") as $filename) {
			require_once $filename;
		}
	}


	public static function front_controllers(){
	    foreach (glob("retina/front/controller/*.php") as $filename) {
			require_once $filename;
		}
	}


	public static function back_controllers(){
	    foreach (glob("retina/back/controller/*.php") as $filename) {
			require_once $filename;
		}
	}


	public static function front_models(){
	    foreach (glob("retina/front/model/*.php") as $filename) {
			require_once $filename;
		}
	}


	public static function back_models(){
	    foreach (glob("retina/back/model/*.php") as $filename) {
			require_once $filename;
		}
	}


	/*
	| ---------------------------------------------------------------------
	|  Loads packages
	| ---------------------------------------------------------------------
	| Loads all packages from package folder by selecting the package names
	| from packages table from db. It does so by converting the package name
	| to something like this "New Package Name" to "new_package_name"
	|	---------------(Not being used by now)-----------------------
	|
	*/
	// public static function _packages($folder){
	// 	foreach (glob("retina/package/$folder/*.php") as $filename) {
	// 		require_once $filename;
	// 	}
	// }
	
	// public static function packages() {
	// 	$package_names = Db::select('packages',array('status=' => 1));
	// 	foreach($package_names as $package_name){
	// 		$package = strtolower(preg_replace("/[ ]/", '_', $package_name['name']));
	// 		Autoload::_packages($package);
	// 	}
	// }


	// Loading one front model at a time.
	public static function front_model($page_template){
		$template = '\Retina\Front\\'.ucfirst($page_template).'_Model';
		return new $template;
	}


	// Loading one back model at a time.
	public static function back_model($page_template){
		$template = '\Retina\Back\\'.ucfirst($page_template).'_Model';
		return new $template;
	}


	public static function front_view($view,$data,$library,$model){
		extract($library);
		extract($model);
		extract($data);
		
		require_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/header.php';
		include_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/'.$view.'_template.php';
		require_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/footer.php';
	}


	public static function back_view($view,$data,$library,$model){
		extract($library);
		extract($model);
		extract($data);
		
		require_once SERVER_ROOT.'/vision/back/view/header.php';
		include_once SERVER_ROOT.'/vision/back/view/'.$view.'.php';
		require_once SERVER_ROOT.'/vision/back/view/footer.php';
	}


	public static function error($level){
		if($level == 0) {
			error_reporting(0);
			ini_set('display_errors', 0);
			ini_set('log_errors',1);
			ini_set('error_log',SERVER_ROOT.'retina.error.log');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}
	}


	public static function strip_all_slashes($value){
		$value = is_array($value) ? array_map('Autoload::strip_all_slashes', $value) : stripslashes($value);
		return $value;
	}

	public static function remove_magic_quotes(){
		if( get_magic_quotes_gpc()) {
			$_GET	 =	Autoload::strip_all_slashes($_GET);
			$_POST	 =	Autoload::strip_all_slashes($_POST);
			$_COOKIE =	Autoload::strip_all_slashes($_COOKIE);
		}
	}


	public static function unregister_globals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}


	
	// This is not being used atm. It breaks the url and extracts controller, model and action name form it.
	// http://anantgarg.com/2009/03/13/write-your-own-php-mvc-framework-part-1/
	function callHook() {
	    global $url;
	 
	    $urlArray = array();
	    $urlArray = explode("/",$url);
	 
	    $controller = $urlArray[0];
	    array_shift($urlArray);
	    $action = $urlArray[0];
	    array_shift($urlArray);
	    $queryString = $urlArray;
	 
	    $controllerName = $controller;
	    $controller = ucwords($controller);
	    $model = rtrim($controller, 's');
	    $controller .= 'Controller';
	    $dispatch = new $controller($model,$controllerName,$action);
	 
	    if ((int)method_exists($controller, $action)) {
	        call_user_func_array(array($dispatch,$action),$queryString);
	    } else {
	        /* Error Generation Code Here */
	    }
	}
}
?>