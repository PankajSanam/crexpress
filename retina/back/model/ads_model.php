<?php
namespace Retina\Back;

class Ads_Model extends _Model{

	public function ads(){
		$Db = new \Db;
		$rows = $Db->select('ads');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function pages(){
		$Db = new \Db;
		$rows = $Db->select('pages', array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function category_name($id){
		$Db = new \Db;
		$query = $Db->select('gallery_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}

	public function edit_data($action_id){
		$Db = new \Db;
		$rows = $Db->select('ads',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>