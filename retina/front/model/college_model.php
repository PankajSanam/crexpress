<?php
namespace Retina\Front;

class College_Model extends _Model{

	public function page_title($slug) {
		$Db = new \Db;
		$query= $Db->select('pages',array( 'slug=' => $slug ));
		
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
		$query= $Db->select('pages',array( 'slug=' => $slug ));
		
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

	public function colleges($id){
		$Db = new \Db;
		$col = array();
		$abc = array();

		$rows = $Db->select('colleges',array('status=' => 1, 'page_id=' => $id));
		foreach($rows as $row){
			$col[] = $row;
		}
		$output = $col;
		if(count($output)<1){
			$rows = $Db->select('pages',array('status=' => 1, 'page_category_id=' => $id));
			foreach($rows as $row){
				$col[] = $row;
			}

			foreach($col as $c) {
				$rows = $Db->select('colleges',array('status=' => 1, 'page_id=' => $c['id']));
				foreach($rows as $row){
					$abc[] = $row;
				}
			}
			$output = $abc;
		}
		return $output;
	}

}

?>