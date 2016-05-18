<?php 
check_admin();

session_destroy();
header("Location:index.html");
?>