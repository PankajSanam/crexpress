<?php
class Slider {
	public static function category_name($id){
		$query = Db::select('slider_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}
}
?>