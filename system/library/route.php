<?php if (!defined('CREXO')) exit('No Trespassing!');

class Route {

	public static function uri_segment() {
		$url_seg = $_SERVER['REQUEST_URI'];
		$url = explode("/",$url_seg);
		array_shift($url);
		return $url;
	}

	// Loading one front model at a time.
	public static function front_model($page_template){
		$template = ucfirst($page_template).'_Model';
		return new $template;
	}

	// Loading one back model at a time.
	public static function back_model($page_template){
		$template = ucfirst($page_template).'_Model';
		return new $template;
	}

	public static function strip_all_slashes($value){
		$value = is_array($value) ? array_map('Route::strip_all_slashes', $value) : stripslashes($value);
		return $value;
	}

	public static function load(){
		if(DEBUG_MODE === 0) {
			error_reporting(0);
			ini_set('display_errors', 0);
			ini_set('log_errors',1);
			ini_set('error_log',SERVER_PATH.'/retina.error.log');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			ini_set('log_errors',1);
			ini_set('error_log',SERVER_PATH.'/retina.error.log');
		}

		// Remove magic quotes if it is enabled on server
		if( get_magic_quotes_gpc()) {
			$_GET	 =	Route::strip_all_slashes($_GET);
			$_POST	 =	Route::strip_all_slashes($_POST);
			$_COOKIE =	Route::strip_all_slashes($_COOKIE);
		}

		// Unregister any available $GLOBALS
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

		Route::set(Route::uri_segment());
	}

	public static function set($uri_segment){
		if(count($uri_segment) <= 1) {
			if( $uri_segment[0]=='' ) {
				$page_template = 'home';
				$page_url = 'index.html';
				$page_slug = 'index.html';
			} else {
				//$uri_seg = explode('.',$uri_segment[0]);
				$uri_seg = $uri_segment;
				$page_template = template($uri_seg[0]);
				$page_url = $uri_seg[0];
				$page_slug = slug($page_url,$page_template);
			}
			$page_category = '';
			$page_category_name='';

			$Db = new Db;
			$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
			foreach ($page_cat_id as $page_cat) {
				$page_category = $page_cat['page_category_id'];
			}

			if($page_slug!=404) {
				$page_cat_names = $Db->select('pages', array('id=' => $page_category));
				foreach ($page_cat_names as $page_cat_name) {
					$page_category_name = $page_cat_name['slug'];
				}
			}

			if($page_category!=0) {
				redirect(SITE_PATH.'/404.html');
			} else {
				$controller = ucfirst($page_template).'_Controller';
				$controller_name = ucfirst($page_template).'_Controller';

				if(file_exists(CONTROLLER_DIR . strtolower($controller).'.php')){
					$$page_template = new $controller_name($page_url,$page_slug,$page_template);
					$$page_template->front_index();
				} else {
					echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
					die('Controller for <strong>'.$page_template.' template </strong> is missing!</span>');
				}
			}
		} else {
			if($uri_segment[0] == 'admin') {
				if(!empty($uri_segment[1])) {
					$uri_seg = explode('.',$uri_segment[1]);
					$_back	= $uri_seg[0];
				} else {
					$_back = 'dashboard';
				}

				$controller = ucfirst($_back).'_Controller';
				$controller_name = ucfirst($_back).'_Controller';

				if(file_exists(CONTROLLER_DIR.strtolower($controller).'.php')){
					$$_back = new $controller_name($_back);
					$$_back->back_index();
				} else {
					$controller_name = 'Error_Controller';
					$error = new $controller_name($_back);
					$error->back_index();
				}
			} else {
				if($uri_segment[0]!='' AND $uri_segment[1]!=''){
					//$uri_seg = explode('.',$uri_segment[1]);
					$uri_seg = $uri_segment[1];
					//$page_template = template($uri_seg[0]);
					$page_template = template($uri_seg);
					$page_url = $uri_seg;
					$page_slug = slug($page_url,$page_template);

					$page_category = '';
					$page_category_name='';

					$Db = new Db;
					$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
					foreach ($page_cat_id as $page_cat) {
						$page_category = $page_cat['page_category_id'];
					}

					if($page_slug!=404) {
						$page_cat_names = $Db->select('pages', array('id=' => $page_category));
						foreach ($page_cat_names as $page_cat_name) {
							$page_category_name = $page_cat_name['slug'];
						}
					}
					$_uri = $uri_segment[0].'.html';
					if($page_category==0 OR $page_slug==404 OR $page_category_name!==$_uri) {
						redirect(SITE_PATH.'/404.html');
					} else {
						$controller = ucfirst($page_template).'_Controller';
						$controller_name = ucfirst($page_template).'_Controller';

						if(file_exists(CONTROLLER_DIR . strtolower($controller).'.php')){
							$$page_template = new $controller_name($page_url,$page_slug,$page_template);
							$$page_template->index();
						} else {
							echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
							die('Controller for <strong>'.$page_template.'</strong> is missing!</span>');
						}
					}
				} else {
					redirect(SITE_PATH.'/404.html');
				}
			}
		}
		return;
	}

	// Breaks the url and extracts controller, model and action name form it.
	// http://anantgarg.com/2009/03/13/write-your-own-php-mvc-framework-part-1/
	public static function callHook() {
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