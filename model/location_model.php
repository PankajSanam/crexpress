<?php
function get_city_name($id) {
	$db = new Db_query;

	$condition = array('id' => $id);
	$query = $db-> select_query('locations',$condition);
	foreach($query as $q){
		$row = $q['name'];
	}
	return $row;
}

function get_states(){
	$db = new Db_query;
	
	$query = $db->select_query('locations');

	foreach($query as $q){
		if($q['parent_id']==1 AND $q['sub_id']==0) {
			$row[] = $q;
		}
	}
	return $row;
}

function get_cities(){
	$db = new Db_query;
	$query = $db->select_query('locations');
	foreach($query as $q){
		if($q['sub_id']==0 AND $q['parent_id']!=1 AND $q['parent_id']!=0 ) {
			$row[] = $q;
		}
	}
	return $row;
}

function get_localities(){
	$db = new Db_query;
	$cond = array( 'sub_id' => 1);
	$query = $db->select_query('locations',$cond,'name','asc');
	foreach($query as $q){
		$row[] = $q;
	}
	return $row;
}
?>