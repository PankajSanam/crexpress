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

	public static function social_icons(){
		$social = '<ul>';
		$social_icons = Db::select('social_icons');
		foreach($social_icons as $social_icon){
			$social .= '<li><a title="'.$social_icon['name'].'" href="'.$social_icon['url'].$social_icon['link'].'">
					<img src="uploads/social/'.$social_icon['image'].'" width="28" /></a></li>';
		}
		$social .= '</ul>';

		return $social;
	}

	public static function copyright( $year = '2013' ){
		$copy = '&copy; '.$year.', All Rights Reserved.';
		return $copy;
	}

	public static function powered_by( $title = 'Website Designing and Development' ){
		$powered = 'Powered By <a href="http://www.gitinfosys.com" title="'.$title.'">GIT Infosys</a>';
		return $powered;
	}

}
?>