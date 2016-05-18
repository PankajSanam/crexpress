<?php if (!defined('CREXO')) exit('No Trespassing!');

class Autoload {

	public static function controllers($class_name) {
		$file = CONTROLLER_DIR . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}

	public static function models($class_name) {
		$file = MODEL_DIR . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}
	
	public static function libraries($class_name) {
		$file = LIB_DIR . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}
	
	public static function helpers(){
	    foreach (glob(HELPER_DIR."*_helper.php") as $filename) {
			require_once $filename;
		}
	}
	
	public static function front_widgets($class_name) {
		$file = FRONT_WIDGET_DIR . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}
	
	public static function back_widgets($class_name) {
		$file = BACK_WIDGET_DIR . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}
}