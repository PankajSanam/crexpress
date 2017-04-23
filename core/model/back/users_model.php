<?php if (!defined('CREXO')) exit('No Trespassing!');

class Users_Model extends Crexo_Model{

	public function meta_title($content){
		$meta_title = '<title>'.$content.'</title>'."\n";
		return $meta_title;
	}
	
	public function users(){
		$Db = new \Db;
		$rows = $Db->select('users');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('users',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}