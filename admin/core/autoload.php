<?php

//Core Files
require_once '../core/config.php';
require_once '../core/connection.php';
require_once '../core/db.php';

function library($class_name) {
    $file = '../library/' . $class_name. '.php';
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('library');

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