<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

/**
 * Autoload Class
 * 
 * Autoload all required classes when they are needed.
 * 
 * @author Pankaj Sanam
 * @copyright crex.com
 * @version 2015
  */
class Autoload 
{

	/**
	 * Autoload::controllers()
	 * 
	 * Load all controller classes once application is initialized
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	public static function controllers($class_name) 
	{
		// load controllers from front end
		$file = FRONT_CONTROLLER_DIR . $class_name. '.php';
		$file = strtolower($file);
		if(file_exists($file))
		{
			require_once($file);
		}

		//load controllers for backend
		$file = BACK_CONTROLLER_DIR . $class_name. '.php';
		$file = strtolower($file);
		if(file_exists($file))
		{
			require_once($file);
		}
	}

	/**
	 * Autoload::models()
	 * 
	 * Load all model classes once application is initialized
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	public static function models($class_name) 
	{
		$file = FRONT_MODEL_DIR . $class_name. '.php';
		$file = strtolower($file);
		if(file_exists($file))
		{
			require_once($file);
		}

		$file = BACK_MODEL_DIR . $class_name. '.php';
		$file = strtolower($file);
		if(file_exists($file))
		{
			require_once($file);
		}
	}
	
	/**
	 * Autoload::libraries()
	 * 
	 * Autololad all libraries
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	public static function libraries($class_name) 
	{
		$file = LIB_DIR . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
		{
			require_once($file);
		}
	}
	
	/**
	 * Autoload::helpers()
	 * 
	 * Load Helpers which are not classes but collection of useful functions
	 * 
	 * @return
	 */
	public static function helpers()
	{
	    foreach (glob(HELPER_DIR."*_helper.php") as $filename) 
		{
			require_once $filename;
		}
	}
	
	/**
	 * Autoload::front_widgets()
	 * 
	 * Autoload all widgets for front end
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	/*public static function front_widgets($class_name)
	{
		$file = WIDGET_PATH . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
		{
			require_once($file);
		}
	}*/
	
	/**
	 * Autoload::back_widgets()
	 * 
	 * Autoload all widgets for admin panel
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	/*public static function back_widgets($class_name)
	{
		$file = WIDGET_PATH . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
		{
			require_once($file);
		}
	}*/
}