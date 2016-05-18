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
define('RETINA_VERSION', '0.0.8');


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
|  Set All Paths
| ---------------------------------------------------------------------
|
*/
if($_SERVER['HTTP_HOST'] == 'localhost' ) {
	define('SERVER_ROOT','D:/wamp/www/careerask.com');
	define('SITE_ROOT','http://localhost/careerask.com');
} else {
	define('SERVER_ROOT','/home/careeras/public_html');
	define('SITE_ROOT','http://www.careerask.com');
}


/*
| ---------------------------------------------------------------------
|  Set Theme Path
| ---------------------------------------------------------------------
| Sets the path of theme where it is stored on server
|
*/
define('FRONT_VISION', SITE_ROOT.'/vision/front/'.THEME_NAME);
define('BACK_VISION', SITE_ROOT.'/vision/back/'.THEME_NAME);
define('DATA_VISION', SITE_ROOT.'/vision/data/');

?>