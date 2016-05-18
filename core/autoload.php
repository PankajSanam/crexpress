<?php
//Core Files
require_once 'core/retina.php';
require_once 'core/connection.php';
require_once 'core/db.php';

Retina::library(array(
	'helper',
	'validation',
	'sanitize',
	'location',
	'gallery',
	'slider',
	'upload',
	'ajax',
	'html',
	'image',
	'page'
));

Retina::package( array(
	'job_portal' => array (
		'private_jobs_model'
	)
));


//Template Files
include 'theme/'.THEME_NAME.'/view/right_sidebar.php';
?>