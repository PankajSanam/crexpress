<?php
namespace Retina\Front;

class Private_Job_Model extends Base_Model{

	public function page_title($slug) {
		$Db = new \Db;
		$query= $Db->select('private_jobs',array( 'slug=' => $slug ));
		
		$page_name = '';
		foreach($query as $q){
			$page_name = $q['title'];
		}

		if($page_name!=''){
			return $page_name;
		} else {
			return '';
		}
	}

	public function page_content($slug) {
		$Db = new \Db;
		$query= $Db->select('private_jobs',array( 'slug=' => $slug ));
		
		$page_content = '';
		foreach($query as $q){
			$page_content = $q['content'];
		}
		
		if($page_content!=''){
			return $page_content;
		} else {
			return '';
		}
	}

	public static function category_name($id){
		$Db = new \Db;
		$query = $Db->select('job_categories',array( 'id=' => $id ));
		foreach($query as $q){ }
		return $q['name'];
	}

	public static function featured_image($slug,$width='',$height='',$class=''){
		$Db = new \Db;
		if($slug!=404){
			$query= $Db->select('private_jobs',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				//$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				$featured_image = '';
			}
			return $featured_image;
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
			return $featured_image;
		}
	}

	public static function link($slug){
		$Db = new \Db;
		$query = $Db->select('private_jobs',array('slug=' => $slug));
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = $row.'.html';
		return $col;
	}

	public function latest_page(){
		$Db = new \Db;
		$rows = $Db->select('pages','','last_updated','DESC',0,1);
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

}

?>