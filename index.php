<?php
@ob_start();
ini_set('date.timezone', 'Asia/Kolkata');

define('RETINA_VERSION', '0.6');
define('THEME_NAME', 'default');

if($_SERVER['HTTP_HOST']=='localhost')
	define('THEME_PATH', 'http://localhost/careerask.com/theme/'.THEME_NAME);
else
	define('THEME_PATH', 'http://www.careerask.com/theme/'.THEME_NAME);

require_once 'core/autoload.php';

if(isset($_GET['page'])){
	$page_template = Page::template($_GET['page']);
	$page = $_GET['page'];
	$page_slug = Page::slug($_GET['page'],$page_template);
} else {
	$page = 'index';
	$page_slug = 'index';
	$page_template = 'home';
}

if(isset($_GET['search'])) { $page_template = 'search'; }

require_once 'theme/'.THEME_NAME.'/view/header.php';
include_once 'theme/'.THEME_NAME.'/view/'.$page_template.'_template.php';
require_once 'theme/'.THEME_NAME.'/view/footer.php'; 
?>