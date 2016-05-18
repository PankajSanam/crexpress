<?php

//Core Files
require_once 'core/config.php';
require_once 'core/connection.php';
require_once 'core/autoload.php';

//Load library Files
spl_autoload_register('Autoload::core');
spl_autoload_register('Autoload::library');

$doctype 		= 	Html::doc_type();
$html 			= 	Html::xmlns();
$content_type	= 	Html::content_type();
$author 		= 	Html::author();
$revisit 		= 	Html::revisit();

//Package Files
require_once 'package/'.$package['job'].'/private_jobs_model.php';

//Template Files
include 'theme/'.$config['theme_name'].'/view/right_sidebar.php';


if(isset($_GET['page'])){
	$page_template = Page::template($_GET['page']);

	$page = $_GET['page'];

	$page_slug = Page::slug($_GET['page'],$page_template);
	

} else {
	$page = 'index';

	$page_slug = 'index';
	$page_template = 'home';
}

if(isset($_GET['search'])){
	$page_template = 'search';
}

$meta_title = Html::meta_title($page);
$meta_description = Html::meta_description($page);
$meta_keywords = Html::meta_keywords($page);

require_once 'theme/'.$config['theme_name'].'/view/header.php';
include_once 'theme/'.$config['theme_name'].'/view/'.$page_template.'_template.php';
require_once 'theme/'.$config['theme_name'].'/view/footer.php'; 
?>