<?php 
include 'core/autoload.php'; 
check_admin();

session_destroy();
header("Location:index.php");
?>