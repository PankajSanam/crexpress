<?php if (!defined('CREXO')) exit('No Trespassing!');

/** Set default timezone **/
ini_set('date.timezone', 'Asia/Kolkata');

/** Current version of Retina Framework **/
define('RETINA_VERSION', '0.1.2');

/** Set debug mode 1 for showing errors and 0 for turn off error reporting **/
define('DEBUG_MODE',1);

/** Encryption key for encrypting URL and parameters in back vision **/
define('PARAM_KEY','<(o_O)>');

/** Set essential site paths **/
define('SERVER_PATH', 'D:/wamp/www/crexpress');
define('SITE_PATH', 'http://dev.crexo.com');

define('LIB_PATH',SERVER_PATH.'/system/library/');

define('FRONT_WIDGET_PATH',SERVER_PATH.'/system/view/front/widget/');
define('BACK_WIDGET_PATH',SERVER_PATH.'/system/view/back/widget/');

define('FRONT_TEMPLATE',SERVER_PATH.'/system/view/front/template/');
define('BACK_TEMPLATE',SERVER_PATH.'/system/view/back/template/');

define('CONTROLLER_DIR', 'system/controller/');

define('MODEL_DIR', 'system/model/');
define('LIB_DIR', 'system/library/');
define('HELPER_DIR', 'system/helper/');

define('FRONT_WIDGET_DIR', 'system/view/front/widget/');
define('BACK_WIDGET_DIR', 'system/view/back/widget/');

/** System paths **/
define('FRONT_VISION', SITE_PATH.'/asset/front');
define('BACK_VISION', SITE_PATH.'/asset/back');
define('DATA_VISION', SITE_PATH.'/asset/data');
define('DATA_PATH', SITE_PATH.'/asset/data');
define('AJAX_PATH', SITE_PATH.'/asset/ajax');

/*
 * Privileges List-
 *	ALTER (Required)
 *	DELETE (Required)
 *	INSERT (Required)
 *	SELECT (Required)
 *	UPDATE (Required)
 *	CREATE (Not Required)
 *	CREATE ROUTINE (Not Required)
 *	CREATE TEMPORARY TABLES (Not Required)
 *	CREATE VIEW (Not Required)
 *	DROP (Not Required)
 *	EXECUTE (Not Required)
 *	INDEX (Not Required)
 *	LOCK TABLES (Not Required)
 *	REFERENCES (Not Required)
 *	SHOW VIEW (Not Required)
 *	TRIGGER (Not Required)
 */
define('DB_NAME', 'crexpress_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DSN', 'mysql:host=localhost;dbname='.DB_NAME );