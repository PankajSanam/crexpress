<?php
class PrivateJob {
	public static function category_name($id){
		$query = DB::select_query('job_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}

	public static function featured_image($slug,$width='',$height='',$class=''){
		if($slug!=404){
			$query= DB::select_query('private_jobs',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="uploads/privatejobs/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				//$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				$featured_image = '';
			}
			return $featured_image;
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
			return $featured_image;
		}
	}

	public static function link($slug){
		$query = DB::select_query('private_jobs',array('slug=' => $slug));
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = $row.'.html';
		return $col;
	}

	public static function description($slug){
		if($slug!=404){
			$query= DB::select_query('private_jobs',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_content = $q['content'];
			}
			return $page_content;
		} else {
			return '';
		}
	}

	public static function title($slug){
		if($slug!=404){
			$query= DB::select_query('private_jobs',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			$page_name = 'Private Jobs';
		}
		return $page_name;
	}
}
?>