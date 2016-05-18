<?php
include 'core/autoload.php';

if(isset($_GET['page'])){
	$page_template = Pages::page_template($_GET['page']);

	$page = $_GET['page'];

	$page_slug = Pages::page_slug($_GET['page'],$page_template);
	

} else {
	$page = 'index';

	$page_slug = 'index';
	$page_template = 'home';
}

$meta_title = Html::meta_title($page);
$meta_description = Html::meta_description($page);
$meta_keywords = Html::meta_keywords($page);

require_once 'theme/'.$config['theme_name'].'/view/header.php';

include_once 'theme/'.$config['theme_name'].'/view/'.$page_template.'_template.php';

require_once 'theme/'.$config['theme_name'].'/view/footer.php'; 
?>