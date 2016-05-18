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
?>