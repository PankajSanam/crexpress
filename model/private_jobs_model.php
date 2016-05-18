<?php

function get_job_category_name($id){
	$db = new DB;

	$cond = array( 'id=' => $id );
	$query = $db->select_query('job_categories',$cond);
	foreach($query as $q){ }
	return $q['name'];
}

function get_private_job_featured_image($slug,$width='',$height='',$class=''){
	$db = new DB;
	if($slug!=404){
		$conditions = array( 'job_slug=' => $slug );
		$query= $db->select_query('private_jobs',$conditions);
		foreach($query as $q){
			$page_featured_image = $q['featured_image'];
		}
	
		if($page_featured_image!=''){
			$featured_image = '<img class="'.$class.'" src="uploads/privatejobs/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
		}
		return $featured_image;
	} else {
		$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
		return $featured_image;
	}
}

function get_private_job_link($slug){
	$db = new DB;
	$condition = array('job_slug=' => $slug);
	$query = $db->select_query('private_jobs',$condition);
	foreach($query as $q){
		$row = $q['job_slug'];
	}
	$col = $row.'.html';
	return $col;
}

function get_private_job_description($slug){
	$db = new DB;
	if($slug!=404){
		$conditions = array( 'job_slug=' => $slug );
		$query= $db->select_query('private_jobs',$conditions);
		foreach($query as $q){
			$page_content = $q['job_description'];
		}
		return $page_content;
	} else {
		return '';
	}
}

function get_private_job_title($slug){
	$db = new DB;
	if($slug!=404){
		$conditions = array( 'job_slug=' => $slug );
		$query= $db->select_query('private_jobs',$conditions);
		foreach($query as $q){
			$page_name = $q['job_title'];
		}
		return $page_name;
	} else {
		return 'Private Jobs';
	}
}
?>