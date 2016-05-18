<?php 
include 'core/autoload.php'; 
$current_page = get_current_page();
if($current_page == 'index') {
} else {
	check_admin();
}
?>
<!doctype html>
<html>