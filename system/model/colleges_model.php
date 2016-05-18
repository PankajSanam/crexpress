<?php if (!defined('CREXO')) exit('No Trespassing!');

class Colleges_Model extends Crexo_Model{

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function colleges(){
		$Db = new \Db;
		$rows = $Db->select('colleges');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function college_pages(){
		$Db = new \Db;
		$rows = $Db->select('pages',array('page_category_id<>' => '0'));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}
	

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('colleges',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}