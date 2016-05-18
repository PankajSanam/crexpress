<?php

// DOCTYPE of html file
function doc_type(){
	return '<!DOCTYPE html>'."\n";
}
$doctype = doc_type();


// GET HTML XMLNS 
function html_xmlns(){
	return 'xmlns="http://www.w3.org/1999/xhtml"';
}
$html = html_xmlns();


// Content type of page
function content_type(){
	return '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
}
$content_type = content_type();


// Get all stylesheets
function stylesheets($styles){
	foreach($styles as $style => $media){
		echo '<link rel="stylesheet" type="text/css" href="css/'.$style.'.css" media="'.$media.'" />';
		echo "\n";
	}
}


// Get all javascript files
function javascripts($javascripts){
	foreach($javascripts as $javascript){
		echo '<script type="text/javascript" src="js/'.$javascript.'.js"></script>';
		echo "\n";
	}
}


// Author of page
function page_author(){
	return '<meta name="author" content="Pankaj Sanam" />'."\n";
}
$author = page_author();


// Meta revisit tag
function revisit_after(){
	return '<meta name="revisit-after" content="2 days" />'."\n";
}
$revisit_after = revisit_after();

// Meta Title Tag
function meta_title($page){
	$db = new Db_query;
	
	$count = $db->count_query('pages', array('page_slug' => $page, 'status' => 1 ));
	$result = $db->select_query('pages', array('page_slug' => $page, 'status' => 1 ));

	$count1 = $db->count_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	$result1 = $db->select_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	
	if($count > 0){
		$meta_title = $result[0]['meta_title'];
	} else {
		if($count1 > 0){
			$meta_title = $result1[0]['meta_title'];
		} else {
			$meta_title = '404 - Not Found';	
		}
	}

	$meta_title = '<title>'.$meta_title.'</title>'."\n";
	return $meta_title;
}


// Meta Description Tag
function meta_description($page){
	$db = new Db_query;

	$count = $db->count_query('pages', array('page_slug' => $page, 'status' => 1 ));
	$result = $db->select_query('pages', array('page_slug' => $page, 'status' => 1 ));

	$count1 = $db->count_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	$result1 = $db->select_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));

	if($count > 0){
		$meta_description = $result[0]['meta_description'];
	} else {
		if($count1 > 0){
			$meta_description = $result1[0]['meta_description'];
		} else {
			$meta_description = 'Content Not found';
		}
	}

	$meta_description = '<meta name="description" content="'.$meta_description.'" />'."\n";
	return $meta_description;
}


// Meta Keywords Tag
function meta_keywords($page){
	$db = new Db_query;

	$count = $db->count_query('pages', array('page_slug' => $page, 'status' => 1 ));
	$result = $db->select_query('pages', array('page_slug' => $page, 'status' => 1 ));

	$count1 = $db->count_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	$result1 = $db->select_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	
	if($count > 0){
		$meta_keywords = $result[0]['meta_keywords'];
	} else {
		if($count1 > 0){
			$meta_keywords = $result1[0]['meta_keywords'];
		} else {
			$meta_keywords = 'not found, 404 error';
		}
	}

	$meta_keywords = '<meta name="keywords" content="'.$meta_keywords.'" />'."\n";
	return $meta_keywords;
}

?>