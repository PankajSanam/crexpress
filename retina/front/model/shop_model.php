<?php
namespace Retina\Front;

class Shop_Model extends _Model{

	public function categories(){
		$Db = new \Db;
		$rows = $Db->select('shop',array('parent_id=' => 0, 'status=' => 1),'sort_order','ASC');
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public function page_title($slug) {
		$Db = new \Db;
		$rows = $Db->select('pages',array( 'slug=' => $slug ));

		if(!empty($rows)) {
			foreach($rows as $row){
				$data = $row['title'];
			}
		} else{
			$data = 'Not Found';
		}

		return $data;
	}

	public function page_content($slug) {
		$Db = new \Db;
		$rows = $Db->select('pages',array( 'slug=' => $slug ));

		if(!empty($rows)){
			foreach($rows as $row){
				$data = $row['content'];
			}
		} else {
			$data = 'Page not found!';
		}

		return $data;
	}

	public function name($slug,$page_template=''){
		$Db = new \Db;
		if($page_template == 'private_job') {
			$conditions = array( 'slug=' => $slug );
			$query= $Db->select('private_jobs',$conditions);
			foreach($query as $q){
				$page_name = $q['title'];
			}
		} else {
			if($slug!=404){
				$conditions = array( 'slug=' => $slug );
				$query= $Db->select('pages',$conditions);
				foreach($query as $q){
					$page_name = $q['title'];
				}
			} else {
				$page_name = '404 - Page Not Found';
			}
		}
		return $page_name;
	}

	public function content($slug,$page_template=''){
		$Db = new \Db;
		if($slug!=404){
			$conditions = array( 'slug=' => $slug );
			$query= $Db->select('pages',$conditions);
			foreach($query as $q){
				$page_content = $q['content'];
			}
		} else {
			$page_content = 'Page you are looking for does not exist or has been moved';
		}

		return $page_content;
	}

	public function link($slug){
		$Db = new \Db;
		$condition = array('slug=' => $slug);
		$query = $Db->select('pages',$condition);
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = SITE_ROOT.'/'.$row.'.html';
		return $col;
	}

	public function thumb($slug,$width='',$height='',$class=''){
		$Db = new \Db;
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= $Db->select('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
				//$featured_image = '';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}

	public function last_updated($slug) {
		$Db = new \Db;
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = $Db->select('pages',$condition);
			foreach($query as $q){
				$page_last_updated = $q['last_updated'];
			}
		} else {
			$page_last_updated = date("Y-m-d");
		}

		return $page_last_updated;
	}

	public function id($slug) {
		$Db = new \Db;
		if($slug!=404){
			$condition = array('slug=' => $slug);
			$query = $Db->select('pages',$condition);
			foreach($query as $q){
				$row = $q['id'];
			}
		} else {
			$row = 1234567890123456789;
		}

		return $row;
	}

	public function featured_image($slug,$width='',$height='',$class=''){
		$Db = new \Db;
		if($slug!=404){
			$page_featured_image = '';
			$conditions = array( 'slug=' => $slug );
			$query= $Db->select('pages',$conditions);
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
			} else {
				$featured_image = '';
			}
		} else {
			$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/general/404.png" width="'.$width.'" height="'.$height.'" />';
		}

		return $featured_image;
	}
}

?>