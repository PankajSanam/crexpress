<?php
class Helper {
	public static function current_page(){
		$path = $_SERVER['PHP_SELF'];
		$file = basename($path, ".php");

		return $file;
	}

	public static function redirect($url) {
	    header("Location: $url");
	    exit();
	}

	public static function status($status){
		if($status!=0){
			$page_status = '<span class="label label-satgreen">Enabled</span>';
		} else {
			$page_status = '<span class="label label-lightred">Disabled</span>';
		}
		return $page_status;
	}

	public static function from_to($from, $to){
		if($from == $to){
			return $from;
		} else {
			return $from . ' from ' . $to;
		}
	}

}
?>