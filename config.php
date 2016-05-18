<?php if (!defined('CREXO')) exit('No Trespassing!');

/** Set debug mode 1 for showing errors and 0 for turn off error reporting **/
define('DEBUG_MODE',1);

/** 
 * Encryption key for encrypting URL and parameters in back vision 
 * @length	32
 */
define('PARAM_KEY','a#4h*6$%8Gi^id&f$5E+fx@^_J&+sK>S');

define('SERVER_PATH', 'D:/wamp/www/crexpress');

define('SITE_PATH', 'http://dev.crexo.com');

define('BACK', 'admin');
define('ADMIN_PATH', SITE_PATH.'/'.BACK.'/');

define('TEMPLATE_PATH', 'system/view/template/');

define('CONTROLLER_DIR', 'system/controller/');
define('MODEL_DIR', 'system/model/');
define('LIB_DIR', 'system/library/');
define('HELPER_DIR', 'system/helper/');
define('LIB_PATH','system/library/');

define('WIDGET_PATH', 'system/view/widget/');

define('FRONT_VIEW', SITE_PATH.'/asset/front');
define('BACK_VIEW', SITE_PATH.'/asset/back');
define('DATA_VIEW', SITE_PATH.'/asset/data');

define('IMAGES',FRONT_VIEW.'/images/');

define('DATA_PATH', SERVER_PATH.'/asset/data');
define('AJAX_PATH', SERVER_PATH.'/asset/ajax');

/**
 * Privileges List-
 *	@required		=	ALTER, DELETE, INSERT, SELECT, UPDATE
 *	@notrequired	=	CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, 
 *						DROP, EXECUTE, INDEX, LOCK TABLES, REFERENCES, SHOW VIEW, TRIGGER
 */
define('DB_NAME', 'crexpress_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('TABLE_PREFIX','cp_');