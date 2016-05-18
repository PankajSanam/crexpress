<?php
class Gallery {
	public static function category_name($id){
		$query = Db::select('gallery_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}
}

?>