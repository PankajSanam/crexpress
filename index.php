<?php
include 'core/autoload.php';

if(isset($_GET['page'])){
	if($_GET['page']=='index'){
		$page = 'index';
	} else {
		$page = $_GET['page'];
	}
	$sql = mysql_query("select *from pages where page_slug = '".$page."' AND status='1' ");
	$dol = mysql_fetch_array($sql);
	if(mysql_num_rows($sql)>0){
		$meta_title = $dol['meta_title'];
		$meta_description = $dol['meta_description'];
		$meta_keywords = $dol['meta_keywords'];
	} else {
		$meta_title = '404 - Not Found';
		$meta_description = 'Content Not found';
		$meta_keywords = 'not found';
	}
	
} else {
	$slug = 'index';

	$sql = mysql_query("select *from pages where page_slug='".$slug."' AND status='1' ");
	$tol = mysql_fetch_array($sql);

	$meta_title = $tol['meta_title'];
	$meta_description = $tol['meta_description'];
	$meta_keywords = $tol['meta_keywords'];
}

require_once 'view/header.php';

if(isset($_GET['page'])){
	if($_GET['page']=='index'){
		$page = 'index';
	} else {
		$page = $_GET['page'];
	}
	$query = mysql_query("select *from pages where page_slug='".$page."' AND status='1' ");
	$col = mysql_fetch_array($query);
	if(mysql_num_rows($query)>0){
		$page_slug = $col['page_slug'];
		$page_template = get_page_template_name($col['page_template_id']);
	} else {
		$page_slug = 404;
		$page_template = 'page';
	}

	include_once "view/".$page_template."_template.php";

} else {
	$page_slug = 'index';
	include_once 'view/home_template.php'; 
}

require_once 'view/footer.php'; 
?>