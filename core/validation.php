<?php
function show_errors(){
	if($_SERVER['HTTP_HOST']=='localhost'){
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	} else{
		error_reporting(0);
		ini_set('display_errors', 0);
	}
}

function db_error(){
	if($_SERVER['HTTP_HOST']=='localhost'){
		return mysql_error();
	} else{
		return 'DB Halt';
	}
}


function get_slug($var){
	$output = strtolower($var);
	$output = str_replace(' ', '-', $output);
	return $output;
}

function check_admin(){
	@session_start();
	if(!isset($_SESSION['admin'])) header("location:index.php");
}

function check_users_admin(){
	if(!isset($_SESSION)) @session_start();
	if(!isset($_SESSION['users']) && !isset($_SESSION['admin'])) header("location:index.php");
}

function check_permission(){
	if(!isset($_SESSION)) @session_start();
	if(!isset($_SESSION['admin'])) { echo 'You do not have enough privileges to perform this action.'; exit(); }
}

function upload_image($image,$destination,$namechoice) {
	$valid_mime_types = array(
		'image/gif',
		'image/png',
		'image/jpeg',
	);
	$valid_file_extensions = array(
		'.jpg',
		'.jpeg',
		'.gif',
		'.png'
	);
	
	$filename = $image['name'];
	$rand = rand(000000,999999);
	$file_ext = strrchr($filename, ".");
	$file_basename = substr($filename, 0, strripos($filename, '.')); // strip extension
	$newfilename = $namechoice.$rand.$file_ext;
	
	if(in_array($file_ext, $valid_file_extensions)) {
		if(in_array($image['type'], $valid_mime_types)){
			if (@getimagesize($image['tmp_name']) !== false) {
				// 524288 = 0.5 MB
				// 1048576 = 1 mb
				if (($file_ext == ".png" || $file_ext == ".jpg") || $file_ext == ".jpeg" || $file_ext == ".gif" &&  ($image['size'] < 524288)) {
 					if(file_exists($destination . $newfilename)) {
						$error = "You have already submitted this file."; // file already exists error
						echo $error;
					} else {
						move_uploaded_file($image['tmp_name'], $destination . $newfilename);
						//echo "File uploaded successfully.";
						return $newfilename;
					}
				} 
			} else { 
				echo 'Invalid File type';
				unlink($image['tmp_name']);
			}
		}
	} elseif (empty($file_basename)) {
		$error = "Please select a file to upload."; // file type error
		//echo $error;
	} else { 
		echo 'Only Image files can be submitted.';
		//unlink($image['tmp_name']);
	}
}
?>