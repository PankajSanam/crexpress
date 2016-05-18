<?php if (!defined('CREXO')) exit('No Trespassing!');

/**
 * Autoload Class
 * 
 * Autoload all required classes when they are needed.
 * 
 * @package   
 * @author Crexo.com
 * @copyright Pankaj Sanam
 * @version 2014
 * @access public
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
		$file = CONTROLLER_DIR . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
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
		$file = MODEL_DIR . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) {
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
	public static function front_widgets($class_name) 
	{
		$file = WIDGET_PATH . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
		{
			require_once($file);
		}
	}
	
	/**
	 * Autoload::back_widgets()
	 * 
	 * Autoload all widgets for admin panel
	 * 
	 * @param mixed $class_name
	 * @return
	 */
	public static function back_widgets($class_name) 
	{
		$file = WIDGET_PATH . $class_name. '.php';
		$file = strtolower($file);
		if ( file_exists($file) ) 
		{
			require_once($file);
		}
	}
}