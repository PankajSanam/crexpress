<?php if (!defined('CREXO')) exit('No Trespassing!');

class Index_Model extends Crexo_Model{
	
	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
}