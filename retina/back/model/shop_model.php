<?php
namespace Retina\Back;

class Shop_Model extends _Model{

	public function products(){
		$Db = new \Db;
		$rows = $Db->select('shop');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('shop',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>