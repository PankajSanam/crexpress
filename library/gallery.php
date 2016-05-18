<?php
class Gallery {
	public static function category_name($id){
		$query = DB::select_query('gallery_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}
}

?>