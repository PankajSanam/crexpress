<?php
function get_page_name($slug){
	global $db;
	if($slug!=404){
		$conditions = array( 'page_slug' => $slug );
		$query= $db->select_query('pages',$conditions);
		foreach($query as $q){
			$page_name = $q['page_name'];
		}
		return $page_name;
	} else {
		return '404 - Page Not Found';
	}
}

function get_page_content($slug){
	global $db;
	if($slug!=404){
		$conditions = array( 'page_slug' => $slug );
		$query= $db->select_query('pages',$conditions);
		foreach($query as $q){
			$page_content = $q['page_content'];
		}
		return $page_content;
	} else {
		return 'Page you are looking for does not exist or has been moved';
	}
}
?>