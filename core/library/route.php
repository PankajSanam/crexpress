<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Route
{
	public static function make_slug($input)
	{
		$sanitize = new Sanitize;

		$output = $sanitize->clean($input).Route::get_slug();
		return $output;
	}
	
	public static function get_slug()
	{
		$db = new Db;
		$slug = $db->select('*')
					->from($db->getT('setting'))
					->where("title='slug'")
					->run('getRows');

		return $slug[0]['content'];
	}

	// Loading one model at a time.
	public static function model($page_template)
	{
		$pt = explode('.',$page_template);
		$template = ucfirst($pt[0]).'_Model';
		return new $template;
	}

	public static function load()
	{
		/** Set error reporting begins */
		$today = date('d.m.Y');
		$random = base_convert(microtime(true), 10, 36);
		if(DEBUG_MODE === 0)
		{
			error_reporting(0);
			ini_set('display_errors', 0);
		}
		else
		{
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}
		ini_set('log_errors',1);
		ini_set('error_log',SERVER_PATH.'/content/logs/error'.$random.$today.'.log');
		/** Set error reporting end */

		Route::set();
	}
	
	public static function slug($page)
	{
		$slug = null;

		/** find the value of slug which is set in settings table */
		$post_slug = self::get_slug();
		
		/** find and replace slugs value so it can be used to match in respective table */
		$page = str_replace($post_slug,'',$page);

		$db = new Db;
		$meta_tables = $db->check_meta();
		$count_tables = count($meta_tables);

		if(strrchr($page, '?'))
		{
			$p = explode('?',$page);
			$slug = $p[0];
		}
		else
		{
			for($i = 0 ; $i <= $count_tables-1; $i++)
			{
				$result =  $db->select('*')
							->from($meta_tables[$i])
							->where("slug='$page' AND status= 1")
							->run('getRows');

				$count = count($result);

				if($count > 0)
				{
					$slug = $result[0]['slug'];
					break;
				}
				else
				{
					$slug = '404.html';
				}
			}
		}
		return $slug;
	}

	public static function template_name($id)
	{
		$db = new Db;
		$title = $db->select('title')
					->from($db->getT('page_template'))
					->where('page_template_id='.$id)
					->run('getField');

		return $title;
	}

	public static function template($page)
	{
		$page_template = null;
		$db = new Db;
		
		/** find the value of slug which is set in settings table */
		$post_slug = self::get_slug();

		/** find and replace slugs value so it can be used to match in respective table */
		$page = str_replace($post_slug,'',$page);

		//$meta_tables = $db->check_meta();
		//$count_tables = count($meta_tables);

		if(strrchr($page, '?'))
		{
			$page = explode('?',$page);
			$page = $page[0];
		}

		$page_template_id =  $db->select('page_template_id')
						->from($db->getT('page'))
						->where("slug='$page' AND status=1")
						->run('getField');

		if($page_template_id)
		{
			$page_template = Route::template_name($page_template_id);
		}
		else
		{
			$page_template = 'e404';
		}

		return $page_template;
	}

	public static function set()
	{
		$uri_segment = explode("/",$_SERVER['REQUEST_URI']);
		$uri_segment = array_values(array_filter($uri_segment, 'strlen'));

		$page_template = 'home';
		$page_slug = 'index';

		$_back = 'dashboard';

		if(count($uri_segment) > 0 && $uri_segment[0] != '')
		{
			$page_url = $uri_segment[0];
			$page_template = Route::template($page_url);
			$page_slug = Route::slug($page_url,$page_template);
		}

		if(count($uri_segment) > 1)
		{
			$page_url = $uri_segment[1];
			$page_template = Route::template($page_url);
			$page_slug = Route::slug($page_url,$page_template);

			$_back = $uri_segment[1];
		}

		// This block is for back end admin panel
		if(!empty($uri_segment) && $uri_segment[0] == 'admin')
		{
			$controller = explode('.',$_back);
			$controller_name = ucfirst($controller[0]).'_Controller';
			$file = BACK_CONTROLLER_DIR.strtolower($controller_name).'.php';

			if(file_exists($file))
			{
				$$_back = new $controller_name($_back);
				$$_back->process();
			} 
			else
			{
				$controller_name = 'Error_Controller';
				$error = new $controller_name($_back);
				$error->process();
			}
		}
		else
		{
			$controller = ucfirst($page_template).'_Controller';
			$front_controller = FRONT_CONTROLLER_DIR . strtolower($controller).'.php';

			if(file_exists($front_controller))
			{
				$$page_template = new $controller($page_slug,$page_template);
				$$page_template->process();
			} 
			else 
			{
				echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
				die('Controller for <strong>'.$page_template.' template </strong> is missing!</span>');
			}
		}
	}

	// We are not using this method right now
	// Breaks the url and extracts controller, model and action name form it.
	// http://anantgarg.com/2009/03/13/write-your-own-php-mvc-framework-part-1/
	public static function callHook()
	{
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

	    if ((int)method_exists($controller, $action))
	    {
	        call_user_func_array(array($dispatch,$action),$queryString);
	    }
	    else
	    {
	        /* Error Generation Code Here */
	    }
	}
}