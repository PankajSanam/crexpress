<?php
class Autoload{
	
	public static function core($class_name) {
		$file = 'core/' . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}

	public static function library($class_name) {
		$file = 'library/' . $class_name. '.php';
		if (file_exists($file)) {
			require_once($file);
		}
	}
}
?>