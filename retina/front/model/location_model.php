<?php
namespace Retina\Front;

class Location_Model extends Base_Model {
	public function name($id) {
		$Db = new \Db;
		$query = $Db->select('locations',array('id=' => $id));
		foreach($query as $q) { }
		return $q['name'];
	}

	public function states(){
		$Db = new \Db;

		$query = $Db->select('locations',array('parent_id=' => 1, 'sub_id=' => 0));

		foreach($query as $q){
			$row[] = $q;
		}
		return $row;
	}

	public function cities(){
		$Db = new \Db;
		$query = $Db->select('locations',array( 'parent_id<>' => 0, 'sub_id=' => 0));
		foreach($query as $q){
			if($q['parent_id']!=1){
				$row[] = $q;
			}
		}
		return $row;
	}

	public function localities(){
		$Db = new \Db;
		$query = $Db->select('locations',array( 'sub_id=' => 1),'name','asc');
		foreach($query as $q){
			$row[] = $q;
		}
		return $row;
	}
}
?>