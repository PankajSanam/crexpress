<?php
namespace Retina\Front;

class College_detail_Model extends _Model{

	public function page_title($slug) {
		$Db = new \Db;
		$query= $Db->select('colleges',array( 'slug=' => $slug ));
		
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
		$query= $Db->select('colleges',array( 'slug=' => $slug ));
		
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

	public function about_us($slug) {
		$Db = new \Db;
		$query= $Db->select('colleges',array( 'slug=' => $slug ));
		
		$output = '';
		foreach($query as $q){
			$output = $q['about'];
		}
		
		if($output!=''){
			return $output;
		} else {
			return '';
		}
	}

	public function courses($slug) {
		$Db = new \Db;
		$query= $Db->select('colleges',array( 'slug=' => $slug ));
		
		$output = '';
		foreach($query as $q){
			$output = $q['courses'];
		}
		
		if($output!=''){
			return $output;
		} else {
			return '';
		}
	}

	public function contact_us($slug) {
		$Db = new \Db;
		$query= $Db->select('colleges',array( 'slug=' => $slug ));
		
		$contact_number = '';
		$address = '';
		foreach($query as $q){
			$contact_number = $q['contact_number'];
			$address = $q['address'];
		}
		
		$contact_us = '<strong>Address : </strong><br />'. $address;
		$contact_us .= '<br /><br /><strong>Contact Number : </strong><br />'.$contact_number;
		
		return $contact_us;
	}

	public function colleges(){
		$Db = new \Db;
		$rows = $Db->select('colleges',array('status=' => 1));
		foreach($rows as $row){
			$col[] = $row;
		}
		return $col;
	}

	public static function featured_image($slug,$width='',$height='',$class=''){
		$Db = new \Db;
		if($slug!=404){
			$query= $Db->select('colleges',array( 'slug=' => $slug ));
			foreach($query as $q){
				$page_featured_image = $q['featured_image'];
			}
		
			if(isset($page_featured_image) && $page_featured_image!=''){
				$featured_image = '<img class="'.$class.'" src="'.DATA_VISION.'/colleges/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
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
		$query = $Db->select('colleges',array('slug=' => $slug));
		foreach($query as $q){
			$row = $q['slug'];
		}
		$col = $row.'.html';
		return $col;
	}

}