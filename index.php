<?php
require_once 'retina/core/route.php';

/*
| ---------------------------------------------------------------------
|  Loads core files
| ---------------------------------------------------------------------
| Loads all the core files required for the system
| autoload.php 		=>	functions to load library and package classes
| connection.php 	=>	defines connections strings and error reporting
| 
*/
require_once SERVER_ROOT.'/retina/core/autoload.php';
require_once SERVER_ROOT.'/retina/core/connection.php';
require_once SERVER_ROOT.'/retina/core/db.php';


/*
| ---------------------------------------------------------------------
|  Loads libraries
| ---------------------------------------------------------------------
| Loads all library files from library folder
|
*/
Autoload::library();


/*
| ---------------------------------------------------------------------
|  Loads packages
| ---------------------------------------------------------------------
| Loads all packages from package folder by selecting the package names
| from packages table from db. It does so by converting the package name
| to something like this "New Package Name" to "new_package_name"
|
*/
$package_names = Db::select('packages',array('status=' => 1));
foreach($package_names as $package_name){
	$package = strtolower(preg_replace("/[ ]/", '_', $package_name['name']));
	Autoload::package($package);
}


/*
| ---------------------------------------------------------------------
|  Load Template Functions
| ---------------------------------------------------------------------
|
*/
include SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/right_sidebar.php';


/*
| ---------------------------------------------------------------------
|  Required Configurations
| ---------------------------------------------------------------------
| Set necessary variables to be used in loading website contents. Like-
| page template, page slug, page name etc.
|
*/
if(isset($_GET['page'])){
	$page_template = Page::template($_GET['page']);
	$page = $_GET['page'];
	$page_slug = Page::slug($_GET['page'],$page_template);
} else {
	$page = 'index';
	$page_slug = 'index';
	$page_template = 'home';
}


/*
| ---------------------------------------------------------------------
|  Search Template
| ---------------------------------------------------------------------
| If search is performed then this will override the template name and
| set it to search template.
|
*/
if(isset($_GET['search'])) { $page_template = 'search'; }


/*
| ---------------------------------------------------------------------
|  Load Template Files
| ---------------------------------------------------------------------
| Loads all necessary template files like header, footer and template
| file.
|
*/
if(isset($_GET['page2']) AND $_GET['page']=='admin') {
	$_back	=	$_GET['page2'];
	require_once SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/header.php';

	$include_file = SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/'.$_back.'.php';
	
	if(file_exists($include_file)) {
		require_once SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/'.$_back.'.php';
	} else {
		require_once SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/404.php';
	}

	require_once SERVER_ROOT.'/vision/back/'.THEME_NAME.'/view/footer.php';

} else {
	require_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/header.php';
	include_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/'.$page_template.'_template.php';
	require_once SERVER_ROOT.'/vision/front/'.THEME_NAME.'/view/footer.php';	
}
?>