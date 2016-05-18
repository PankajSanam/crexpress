<?php

//Core Files
require_once '../core/connection.php';
require_once '../core/database.php';

//Library Files
require_once '../lib/helper.php';
require_once '../lib/validation.php';
require_once '../lib/upload.php';
require_once '../lib/ajax.php';
require_once '../lib/sanitize.php';
require_once '../lib/html.php';
require_once '../lib/pages.php';

//Model Files
require_once '../model/private_jobs_model.php';
require_once '../model/location_model.php';
require_once '../model/gallery_model.php';
require_once '../model/slider_model.php';


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