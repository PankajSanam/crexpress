<?php
namespace Retina\Front;

class Search_Model extends _Model{

	public function latest_page(){
		$Db = new \Db;
		$rows = $Db->select('pages','','last_updated','DESC',0,1);
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function meta_title($value){
		return '<title>'.$value.'</title>'."\n";
	}

	public function meta_description($value){
		return '<meta name="description" content="'.$value.'" />'."\n";
	}

	public function meta_keywords($value){
		return '<meta name="keywords" content="'.$value.'" />'."\n";
	}

}

?>