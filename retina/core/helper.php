<?php if ( ! defined('RETINA_VERSION')) exit('No direct access allowed');

function current_page(){
	$path = $_SERVER['PHP_SELF'];
	$file = basename($path, ".php");

	return $file;
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function from_to($from, $to){
	if($from == $to){
		return $from;
	} else {
		return $from . ' from ' . $to;
	}
}

function social_icons($width = 28){
	$Db = new Db;
	$social = '<ul>';
	$social_icons = $Db->select('social_icons');
	foreach($social_icons as $social_icon){
		$social .= '<li><a title="'.$social_icon['name'].'" href="'.$social_icon['url'].$social_icon['link'].'">
				<img src="'.DATA_VISION.'/social/'.$social_icon['image'].'" width="'.$width.'" /></a></li>';
	}
	$social .= '</ul>';

	return $social;
}

function copyright( $year = '2013' ){
	$copy = '&copy; '.$year.', All Rights Reserved.';
	return $copy;
}

function powered_by( $title = 'Website Designing and Development' ){
	$powered = 'Powered By <a href="http://www.gitinfosys.com" title="'.$title.'">GIT Infosys</a>';
	return $powered;
}

function designed_by( $title = 'Website Designing and Development' ){
	$powered = 'Designed &amp; Developed By <a href="http://www.gitinfosys.com" title="'.$title.'">GIT Infosys</a>';
	return $powered;
}

function slug($page,$page_template){
	$Db = new Db;
	$meta_tables = $Db->check_meta();
	$count_tables = count($meta_tables);
	$cond = array(
		'slug=' => $page,
		'status=' => 1
	);
	
	for($i = 0 ; $i <= $count_tables-1; $i++){
		$result =  $Db->select($meta_tables[$i], $cond);
		$count = count($result);

		if($count > 0){
			$slug = $result[0]['slug'];
			break;
		} else {
			$slug = '404';
		}
	}

	return $slug;
}

function template_name($id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select('page_templates',$cond);
	foreach($query as $q){ }
	return $q['template_name'];
}

function template($page){
	$Db = new Db;
	$meta_tables = $Db->check_meta();
	$count_tables = count($meta_tables);
	$cond = array(
		'slug=' => $page,
		'status=' => 1
	);
	
	for($i = 0 ; $i <= $count_tables-1; $i++){
		$result =  $Db->select($meta_tables[$i], $cond);
		$count = count($result);

		if($count > 0){
			$page_template = template_name($result[0]['page_template_id']);
			break;
		} else {
			$page_template = 'page';
		}
	}

	return $page_template;
}

function url($page){
	$link = SITE_ROOT.'/'.$page.'.html';
	return $link;
}

function category_name($table,$id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select($table,$cond);
	foreach($query as $q){ }
	return $q['name'];
}
?>