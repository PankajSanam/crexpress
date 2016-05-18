<?php
ob_start();

define('CREXO', true);

/** Set default timezone **/
ini_set('date.timezone', 'Asia/Kolkata');

/** Current version of Retina Framework **/
define('RETINA_VERSION', '0.1.4');

require_once 'config.php';

/** Load core files **/
require_once LIB_PATH.'autoload.php';

//Auto load classes
spl_autoload_register('Autoload::controllers');
spl_autoload_register('Autoload::models');
spl_autoload_register('Autoload::libraries');
spl_autoload_register('Autoload::front_widgets');
spl_autoload_register('Autoload::back_widgets');
Autoload::helpers();

//Load template and its content
Route::load();