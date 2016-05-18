<?php
namespace Retina\Back;

class Base_Model {

	public function __construct(){
		// nothing
	}

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}

}

?>