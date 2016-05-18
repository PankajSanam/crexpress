<?php if (!defined('CREXO')) exit('No Trespassing!');

class Search_Model extends Crexo_Model{

	private $db;
	
	public function __construct(){
		$this->db = new Db();
	}

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function latest_page(){
		$rows = $this->db->select('pages','','last_updated','DESC',0,1);
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