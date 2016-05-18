<?php 
include 'core/autoload.php'; 
$current_page = Helper::current_page();
if($current_page == 'index') {
} else {
	Validation::admin_auth();
}
?>
<!doctype html>
<html>