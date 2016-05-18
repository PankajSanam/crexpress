<?php

function get_job_category_name($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('job_categories',$cond);
	foreach($query as $q){ }
	return $q['name'];
}

function get_private_job_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('private_jobs',$cond);
	foreach($query as $q){
		$page_data[] = $q;
	}
	return $page_data;
}

function get_job_categories(){
	$db = new Db_query;
	$query = $db->select_query('job_categories');
	foreach($query as $q){
		$col[] = $q;
	}

	return $col;
}

function get_states(){
	$db = new Db_query;
	
	$query = $db->select_query('locations');

	foreach($query as $q){
		if($q['parent_id']==1 AND $q['sub_id']==0) {
			$row[] = $q;
		}
	}
	return $row;
}

function get_cities(){
	$db = new Db_query;
	$query = $db->select_query('locations');
	foreach($query as $q){
		if($q['sub_id']==0 AND $q['parent_id']!=1 AND $q['parent_id']!=0 ) {
			$row[] = $q;
		}
	}
	return $row;
}

function get_localities(){
	$db = new Db_query;
	$cond = array( 'sub_id' => 1);
	$query = $db->select_query('locations',$cond,'name','asc');
	foreach($query as $q){
		$row[] = $q;
	}
	return $row;
}

function get_private_job_featured_image($slug,$width='',$height='',$class=''){
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'job_slug' => $slug );
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
	$db = new Db_query;
	$condition = array('job_slug' => $slug);
	$query = $db->select_query('private_jobs',$condition);
	foreach($query as $q){
		$row = $q['job_slug'];
	}
	$col = $row.'.html';
	return $col;
}

function get_private_job_description($slug){
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'job_slug' => $slug );
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
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'job_slug' => $slug );
		$query= $db->select_query('private_jobs',$conditions);
		foreach($query as $q){
			$page_name = $q['job_title'];
		}
		return $page_name;
	} else {
		return 'Private Jobs';
	}
}

function get_city_name($id) {
	$db = new Db_query;

	$condition = array('id' => $id);
	$query = $db->select_query('locations',$condition);
	foreach($query as $q){
		$row = $q['name'];
	}
	return $row;
}












function get_page_lasst_updated($slug) {
	$db = new Db_query;
	
	if($slug!=404){
		$condition = array('page_slug' => $slug);
		$query = $db->select_query('pages',$condition);
		foreach($query as $q){
			$page_last_updated = $q['last_updated'];
		}
		return $page_last_updated;
	} else {
		return date("Y-m-d");
	}
}

function get_latest_dupdate(){
	$db = new Db_query;
	$query = $db->select_query('pages','','last_updated','DESC',0,1);
	foreach($query as $q){
		$col[] = $q;
	}
	return $col;
}
function get_page_staftus($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function get_pages_template_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('page_templates',$cond);
	foreach($query as $q){
		$page_template_data[] = $q;
	}
	return $page_template_data;
}
?>