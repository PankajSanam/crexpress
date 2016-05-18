<?php
require_once 'retina/core/route.php';

// Remove magic quotes if it is enabled on server
Autoload::remove_magic_quotes();

// Unregister any available $GLOBALS
Autoload::unregister_globals();

// Load all libraries from retina/library
Autoload::libraries();

// Load controllers for front and back
Autoload::front_controllers();
Autoload::back_controllers();

// Load models for front and back
Autoload::front_models();
Autoload::back_models();

// Load all packages from retina/packages
//Autoload::packages();


// Load Template Functions
include SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/right_sidebar.php';

/*
| ---------------------------------------------------------------------
|  Required Configurations
| ---------------------------------------------------------------------
| Set necessary variables to be used in loading website contents. Like-
| page template, page slug, page name etc.
|
*/
$page_template	= 	'';
$page_url 		= 	'';
$page_slug		= 	'';

if(isset($_GET['page']) AND !isset($_GET['search'])){
	$page_template = template($_GET['page']);
	$page_url = $_GET['page'];
	$page_slug = slug($_GET['page'],$page_template);
} elseif (isset($_GET['search'])){
	$page_template = 'search';
} else {
	$page_url = 'index';
	$page_slug = 'index';
	$page_template = 'home';
}


/*
| ---------------------------------------------------------------------
|  Load Template Files
| ---------------------------------------------------------------------
| Loads all necessary template files like header, footer and template
| file.
|
*/
if(isset($_GET['page2']) AND $_GET['page']=='admin') {

	// Template files for admin
	$_back	=	$_GET['page2'];

	//Template Files
	include SERVER_ROOT.'/vision/back/view/top_navigation.php';
	include SERVER_ROOT.'/vision/back/view/left_sidebar.php';
	include SERVER_ROOT.'/vision/back/view/sub_header.php';
	
	$controller = ucfirst($_back).'_Controller';
	$controller_name = 'Retina\Back\\'.ucfirst($_back).'_Controller';

	if(file_exists('retina/back/controller/'.strtolower($controller).'.php')){
		$$_back = new $controller_name($_back);
		$$_back->index();
	} else {
		$error = new Retina\Back\Error_Controller($_back);
		$error->index();
	}

} else {

// Template files for front end	
	$controller = ucfirst($page_template).'_Controller';
	$controller_name = 'Retina\Front\\'.ucfirst($page_template).'_Controller';

	if(file_exists('retina/front/controller/'.strtolower($controller).'.php')){
		$$page_template = new $controller_name($page_url,$page_slug,$page_template);
		$$page_template->index();
	} else {
		echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
		die('Controller for <strong>'.$page_template.'</strong> is not found!</span>');
	}
}
?>