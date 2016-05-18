<?php
/*
 * ---------------------------------------------------------------------
 * Route
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
define('RETINA_VERSION', '0.1.1');


/*
| ---------------------------------------------------------------------
|  Set essential site paths
| ---------------------------------------------------------------------
|
*/
define('SITE_URL', 'http://www.newway.co.in');

if($_SERVER['HTTP_HOST'] == 'localhost' ) {
	$server_root = 'D:/wamp/www/newway.co.in';
	$site_root = 'http://localhost/newway.co.in';
	define('IS_LIVE', 0);
} else {
	$server_root = '/home/newwayco/public_html';
	$site_root = SITE_URL;
	define('IS_LIVE', 1);
}

define('SERVER_ROOT', $server_root);
define('SITE_ROOT', $site_root);


/*
| ---------------------------------------------------------------------
|  Path of Front end files
| ---------------------------------------------------------------------
*/
define('FRONT_VISION', SITE_ROOT.'/vision/front');


/*
| ---------------------------------------------------------------------
|  Path of Back end files (admin panel)
| ---------------------------------------------------------------------
*/
define('BACK_VISION', SITE_ROOT.'/vision/back');


/*
| ---------------------------------------------------------------------
|  Path for accessing files from data folder
| ---------------------------------------------------------------------
*/
define('DATA_VISION', SITE_ROOT.'/vision/data');


/*
| ---------------------------------------------------------------------
|  Path of data files to be used in image upload and other functions
| ---------------------------------------------------------------------
*/
define('DATA_PATH', SERVER_ROOT.'/vision/data');


/*
| ---------------------------------------------------------------------
|  Path of Ajax files
| ---------------------------------------------------------------------
*/
define('AJAX_PATH', SERVER_ROOT.'/vision/ajax');


/*
| ---------------------------------------------------------------------
|  Loads core files
| ---------------------------------------------------------------------
| Loads all the core files required for the system
| autoload.php 		=>	functions to load library and package classes
| connection.php 	=>	defines connections strings and error reporting
| db.php 			=>	mysql queries
| helper.php 		=>	Useful functions which can be modified by users
| 
*/
require_once SERVER_ROOT.'/retina/core/autoload.php';
require_once SERVER_ROOT.'/retina/core/connection.php';
require_once SERVER_ROOT.'/retina/core/db.php';
require_once SERVER_ROOT.'/retina/core/helper.php';
?>