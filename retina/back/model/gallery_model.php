<?php
namespace Retina\Back;

class Gallery_Model extends Base_Model{

	public function galleries(){
		$Db = new \Db;
		$rows = $Db->select('gallery');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function categories(){
		$Db = new \Db;
		$rows = $Db->select('gallery_categories');
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
		$rows = $Db->select('gallery',array('id=' => $action_id));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>