<?php

//Core Files
require_once '../core/config.php';
require_once '../core/connection.php';
require_once '../core/db.php';

//Library Files
require_once '../library/helper.php';
require_once '../library/validation.php';
require_once '../library/sanitize.php';
require_once '../library/location.php';
require_once '../library/gallery.php';
require_once '../library/slider.php';
require_once '../library/upload.php';
require_once '../library/ajax.php';
require_once '../library/html.php';
require_once '../library/image.php';
require_once '../library/page.php';

//Model Files
require_once '../package/'.$package['job'].'/private_jobs_model.php';


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