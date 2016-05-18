<?php
class Location {
	public static function name($id) {
		$query = Db::select('locations',array('id=' => $id));
		foreach($query as $q) { }
		return $q['name'];
	}

	public static function states(){
		$query = Db::select('locations',array('parent_id=' => 1, 'sub_id=' => 0));

		foreach($query as $q){
			$row[] = $q;
		}
		return $row;
	}

	public static function cities(){
		$query = Db::select('locations',array( 'parent_id<>' => 0, 'sub_id=' => 0));
		foreach($query as $q){
			if($q['parent_id']!=1){
				$row[] = $q;
			}
		}
		return $row;
	}

	public static function localities(){
		$query = Db::select('locations',array( 'sub_id=' => 1),'name','asc');
		foreach($query as $q){
			$row[] = $q;
		}
		return $row;
	}
}
?>