<?php
function get_page_name($slug,$page_template=''){
	$db = new Db_query;
	
	if($page_template == 'private_job') {
		$conditions = array( 'job_slug' => $slug );
		$query= $db->select_query('private_jobs',$conditions);
		foreach($query as $q){
			$page_name = $q['job_title'];
		}
		return $page_name;
	} else {
		if($slug!=404){
			$conditions = array( 'page_slug' => $slug );
			$query= $db->select_query('pages',$conditions);
			foreach($query as $q){
				$page_name = $q['page_name'];
			}
			return $page_name;
		} else {
			return '404 - Page Not Found';
		}
	}
}

function get_page_content($slug,$page_template=''){
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'page_slug' => $slug );
		$query= $db->select_query('pages',$conditions);
		foreach($query as $q){
			$page_content = $q['page_content'];
		}
		return $page_content;
	} else {
		return 'Page you are looking for does not exist or has been moved';
	}
}

function get_page_featured_image($slug,$width='',$height='',$class=''){
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'page_slug' => $slug );
		$query= $db->select_query('pages',$conditions);
		foreach($query as $q){
			$page_featured_image = $q['featured_image'];
		}
	
		if($page_featured_image!=''){
			$featured_image = '<img class="'.$class.'" src="uploads/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
		}
		return $featured_image;
	} else {
		$featured_image = '<img class="'.$class.'" src="uploads/general/404.png" width="'.$width.'" height="'.$height.'" />';
		return $featured_image;
	}
}

function get_page_last_updated($slug) {
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

function get_page_id($slug) {
	$db = new Db_query;
	
	if($slug!=404){
		$condition = array('page_slug' => $slug);
		$query = $db->select_query('pages',$condition);
		foreach($query as $q){
			$row = $q['id'];
		}
		return $row;
	} else {
		return 1234567890123456789;
	}
}

function get_page_link($slug){
	$db = new Db_query;
	$condition = array('page_slug' => $slug);
	$query = $db->select_query('pages',$condition);
	foreach($query as $q){
		$row = $q['page_slug'];
	}
	$col = $row.'.html';
	return $col;
}

function get_latest_update(){
	$db = new Db_query;
	$query = $db->select_query('pages','','last_updated','DESC',0,1);
	foreach($query as $q){
		$col[] = $q;
	}
	return $col;
}
function get_page_status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function get_page_categories(){
	$db = new Db_query;
	$query = $db->select_query('pages');
	foreach($query as $q){
		$col[] = $q;
	}

	return $col;
}

function get_page_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('pages',$cond);
	foreach($query as $q){
		$page_data[] = $q;
	}
	return $page_data;
}

function get_page_templates(){
	$db = new Db_query;

	$query = $db->select_query('page_templates');
	foreach($query as $q){
		$row[] = $q;
	}
	return $row;
}

function get_page_template_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('page_templates',$cond);
	foreach($query as $q){
		$page_template_data[] = $q;
	}
	return $page_template_data;
}

function get_page_template_name($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('page_templates',$cond);
	foreach($query as $q){ }
	return $q['template_name'];
}

function get_top_navigation(){
	$db = new Db_query;

	$cond = array( 'status' => 1, 'menu_position' => 'top', 'page_category_id' => 0);
	$query = $db->select_query('pages',$cond,'menu_sort_order','ASC');
	foreach($query as $q){
		if($q['menu_name']!='' && $q['menu_sort_order']!=0) {
			$top_navigation[] = $q;	
		}
	}
	return $top_navigation;
}

function get_top_submenus($id){
	$db = new Db_query;
	$cond = array( 'page_category_id' => $id, 'status' => 1 );
	$query = $db->select_query('pages',$cond);
	foreach($query as $q){
		if($q['menu_name']!='') {
			$top_submenus[] = $q;
		}
	}
	return $top_submenus;
}

?>