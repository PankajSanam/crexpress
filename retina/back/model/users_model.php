<?php
namespace Retina\Back;

class Users_Model extends Base_Model{

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

?>