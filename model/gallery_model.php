<?php
function get_gallery_category_name($id){
	$db = new DB;

	$cond = array( 'id=' => $id );
	$query = $db->select_query('gallery_categories',$cond);
	foreach($query as $q){ }
	return $q['name'];
}
?>