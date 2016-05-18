<?php
class Slider {
	public static function category_name($id){
		$query = DB::select_query('slider_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}
}
?>