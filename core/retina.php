<?php

class Retina{

	public static function library($files) {
		foreach ($files as $file) {
			require_once 'library/'.$file.'.php';
		}
	}

	public static function package($files) {
		foreach ($files as $location => $file) {
			foreach($file as $f){
				require_once 'package/'. $location.'/'. $f . '.php';
			}
		}
	}

}

?>