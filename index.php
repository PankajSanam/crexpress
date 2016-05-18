<?php
include 'core/autoload.php';

if(isset($_GET['page'])){
	$page_template = page_template($_GET['page']);

	$meta_title = meta_title($_GET['page']);
	$meta_description = meta_description($_GET['page']);
	$meta_keywords = meta_keywords($_GET['page']);

	$page_slug = page_slug($_GET['page'],$page_template);
	

} else {
	$meta_title = meta_title('index');
	$meta_description = meta_description('index');
	$meta_keywords = meta_keywords('index');

	$page_slug = 'index';
	$page_template = 'home';
}

require_once 'view/header.php';

include_once "view/".$page_template."_template.php";

require_once 'view/footer.php'; 
?>