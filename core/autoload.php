<?php

//Core Files
require_once 'config.php';
require_once 'connection.php';
require_once 'database.php';

//Library Files
require_once 'lib/helper.php';
require_once 'lib/validation.php';
require_once 'lib/upload.php';
require_once 'lib/ajax.php';
require_once 'lib/sanitize.php';
require_once 'lib/html.php';
require_once 'lib/pages.php';

//Model Files
require_once 'model/private_jobs_model.php';
require_once 'model/location_model.php';
require_once 'model/gallery_model.php';
require_once 'model/slider_model.php';

//Template Files
include 'theme/'.$config['theme_name'].'/view/right_sidebar.php';
?>