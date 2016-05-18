<?php
namespace Retina\Back;

class Social_Model extends _Model{

	public function social_icons(){
		$Db = new \Db;
		$rows = $Db->select('social_icons');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('social_icons',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>