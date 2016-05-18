<?php
function get_slider_category_name($id){
	$cond = array( 'id=' => $id );
	$query = DB::select_query('slider_categories',$cond);
	foreach($query as $q){ }
	return $q['name'];
}
?>