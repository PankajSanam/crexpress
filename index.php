<?php
/*
 * ---------------------------------------------------------------------
 * Front Route
 * ---------------------------------------------------------------------
 * This file specifies the theme name, theme path and system version. It
 * is also used to autoload all required classes and function. This file
 * is used to set meta tags on all pages.
 *
 */


/*
| ---------------------------------------------------------------------
|  Output Buffering
| ---------------------------------------------------------------------
| Output buffering is on so no output is sent from the script (other 
| than headers), instead the output is stored in an internal buffer.
|
| @	=>	Surpressing any warnings from the function
|
*/
@ob_start();


/*
| ---------------------------------------------------------------------
|  Set Timezone
| ---------------------------------------------------------------------
| Sets the default timezone in php ini file. If it is not set then it
| will use the default timezone already set in php ini file.
|
*/
ini_set('date.timezone', 'Asia/Kolkata');


/*
| ---------------------------------------------------------------------
|  Set Version
| ---------------------------------------------------------------------
| Sets the current version of system
|
*/
define('RETINA_VERSION', '0.0.7');


/*
| ---------------------------------------------------------------------
|  Set Theme Name
| ---------------------------------------------------------------------
| Sets the theme name which is being used on front-end
|
*/
define('THEME_NAME', 'default');


/*
| ---------------------------------------------------------------------
|  Set Theme Path
| ---------------------------------------------------------------------
| Sets the path of theme where it is stored on server
|
*/
if($_SERVER['HTTP_HOST']=='localhost')
	// Defines the theme path when system is hosted in local computer.
	define('THEME_PATH', 'http://localhost/careerask.com/theme/'.THEME_NAME);
else
	// Defines the theme path when system is online.
	define('THEME_PATH', 'http://www.careerask.com/theme/'.THEME_NAME);


/*
| ---------------------------------------------------------------------
|  Loads core files
| ---------------------------------------------------------------------
| Loads all the core files required for the system
| autoload.php 		=>	functions to load library and package classes
| connection.php 	=>	defines connections strings and error reporting
| 
*/
require_once 'core/autoload.php';
require_once 'core/connection.php';
require_once 'core/db.php';


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
| Loads template files from theme/view folder.
|
*/
include 'theme/'.THEME_NAME.'/view/right_sidebar.php';


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
require_once 'theme/'.THEME_NAME.'/view/header.php';
include_once 'theme/'.THEME_NAME.'/view/'.$page_template.'_template.php';
require_once 'theme/'.THEME_NAME.'/view/footer.php'; 
?>