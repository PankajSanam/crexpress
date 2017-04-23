<?php
ob_start();

define('CREXO', true);

/** Set default timezone **/
ini_set('date.timezone', 'Asia/Kolkata');

/** Current version of Crexpress **/
define('CREXPRESS_VERSION', '0.1.6');

require_once 'config.php';

/** Load core files **/
require_once LIB_DIR.'autoload.php';

//Auto load classes
spl_autoload_register('Autoload::controllers');
spl_autoload_register('Autoload::models');
spl_autoload_register('Autoload::libraries');

Autoload::helpers();

require_once LIB_DIR.'smarty/Smarty.class.php';

//Load template and its content
Route::load();