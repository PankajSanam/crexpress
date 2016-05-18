<?php if (!defined('CREXO')) exit('No Trespassing!');

/** Set debug mode 1 for showing errors and 0 for turn off error reporting **/
define('DEBUG_MODE', 1);

/** 
 * Encryption key for encrypting URL and parameters in back vision 
 * @length	32
 */
define('PARAM_KEY','a#4h*6$%8Gi^id&f$5E+fx@^_J&+sK>S');

define('SERVER_PATH', 'D:/xampp/htdocs/crexpress');

define('SITE_PATH', 'http://dev.crexo.com');

define('BACK', 'admin');
define('ADMIN_PATH', SITE_PATH.'/'.BACK.'/');

define('CONTROLLER_DIR', 'core/controller/');
define('FRONT_CONTROLLER_DIR', CONTROLLER_DIR.'front/');
define('BACK_CONTROLLER_DIR', CONTROLLER_DIR.'back/');

define('MODEL_DIR', 'core/model/');
define('FRONT_MODEL_DIR', 'core/model/front/');
define('BACK_MODEL_DIR', 'core/model/back/');

define('LIB_DIR', 'core/library/');
define('HELPER_DIR', 'core/helper/');
define('CONTENT_DIR', SITE_PATH.'/content/');
define('THEME_DIR', CONTENT_DIR.'theme/');

define('FRONT_VIEW', SITE_PATH.'/content/theme/front/');
define('BACK_VIEW', SITE_PATH.'/content/theme/back/');
define('DATA_VIEW', SITE_PATH.'/content/uploads/');

define('IMAGES',FRONT_VIEW.'images/');

define('DATA_PATH', SERVER_PATH.'/asset/data');
define('AJAX_PATH', SERVER_PATH.'/asset/ajax');

/**
 * Privileges List-
 *	@required		=	ALTER, DELETE, INSERT, SELECT, UPDATE
 *	@not-required	=	CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW,
 *						DROP, EXECUTE, INDEX, LOCK TABLES, REFERENCES, SHOW VIEW, TRIGGER
 */
define('DB_NAME', 'crexpress_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('TABLE_PREFIX','cp_');