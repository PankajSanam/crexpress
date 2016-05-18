<?php if (!defined('CREXO')) exit('No Trespassing!');

class Pages_Model extends Crexo_Model{

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function pages(){
		$Db = new \Db;
		$rows = $Db->select('pages');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function page_templates(){
		$Db = new \Db;
		$rows = $Db->select('page_templates');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_page($action_id){
		$Db = new \Db;
		$rows = $Db->select('pages',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
}