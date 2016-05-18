<?php
//Core Files
require_once 'retina.php';
require_once '../core/connection.php';
require_once '../core/db.php';

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
include 'view/top_navigation.php';
include 'view/left_sidebar.php';
include 'view/sub_header.php';
include 'view/task_panel.php';
include 'view/server_load.php';
include 'view/chat_box.php';
include 'view/user_regions.php';
include 'view/address_book.php';
include 'view/audience_overview.php';
include 'view/hdd_usage.php';
include 'view/my_calender.php';
?>