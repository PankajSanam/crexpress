<?php
function get_page_name($slug){
	$db = new Db_query;
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
	$db = new Db_query;
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

function get_page_featured_image($slug,$width='',$height='',$class=''){
	$db = new Db_query;
	if($slug!=404){
		$conditions = array( 'page_slug' => $slug );
		$query= $db->select_query('pages',$conditions);
		foreach($query as $q){
			$page_featured_image = $q['featured_image'];
		}
	
		if($page_featured_image!=''){
			$featured_image = '<img class="'.$class.'" src="uploads/pages/'.$page_featured_image.'" width="'.$width.'" height="'.$height.'" />';
		} else {
			$featured_image = '<img class="'.$class.'" src="uploads/general/default-image.jpg" width="'.$width.'" height="'.$height.'" />';
		}
		return $featured_image;
	} else {
		$featured_image = '<img class="'.$class.'" src="uploads/general/404.png" width="'.$width.'" height="'.$height.'" />';
		return $featured_image;
	}
}

function get_page_last_updated($slug) {
	$db = new Db_query;
	
	if($slug!=404){
		$condition = array('page_slug' => $slug);
		$query = $db->select_query('pages',$condition);
		foreach($query as $q){
			$page_last_updated = $q['last_updated'];
		}
		return $page_last_updated;
	} else {
		return date("Y-m-d");
	}
}

function get_page_id($slug) {
	$db = new Db_query;
	
	if($slug!=404){
		$condition = array('page_slug' => $slug);
		$query = $db->select_query('pages',$condition);
		foreach($query as $q){
			$row = $q['id'];
		}
		return $row;
	} else {
		return 1234567890123456789;
	}
}

function get_page_link($slug){
	$db = new Db_query;
	$condition = array('page_slug' => $slug);
	$query = $db->select_query('pages',$condition);
	foreach($query as $q){
		$row = $q['page_slug'];
	}
	$col = $row.'.html';
	return $col;
}

function get_latest_update(){
	$db = new Db_query;
	$query = $db->select_query('pages','','last_updated','DESC',0,1);
	foreach($query as $q){
		$col[] = $q;
	}
	return $col;
}
function get_page_status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function get_page_categories(){
	$db = new Db_query;
	$query = $db->select_query('pages');
	foreach($query as $q){
		$col[] = $q;
	}

	return $col;
}

function get_page_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('pages',$cond);
	foreach($query as $q){
		$page_data[] = $q;
	}
	return $page_data;
}

function get_page_templates(){
	$db = new Db_query;

	$query = $db->select_query('page_templates');
	foreach($query as $q){
		$row[] = $q;
	}
	return $row;
}

function get_page_template_data($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('page_templates',$cond);
	foreach($query as $q){
		$page_template_data[] = $q;
	}
	return $page_template_data;
}

function get_page_template_name($id){
	$db = new Db_query;

	$cond = array( 'id' => $id );
	$query = $db->select_query('page_templates',$cond);
	foreach($query as $q){ }
	return $q['template_name'];
}

function get_top_navigation(){
	$db = new Db_query;

	$cond = array( 'status' => 1, 'menu_position' => 'top', 'page_category_id' => 0);
	$query = $db->select_query('pages',$cond,'menu_sort_order','ASC');
	foreach($query as $q){
		if($q['menu_name']!='' && $q['menu_sort_order']!=0) {
			$top_navigation[] = $q;	
		}
	}
	return $top_navigation;
}

function get_top_submenus($id){
	$db = new Db_query;
	$cond = array( 'page_category_id' => $id, 'status' => 1 );
	$query = $db->select_query('pages',$cond);
	foreach($query as $q){
		if($q['menu_name']!='') {
			$top_submenus[] = $q;
		}
	}
	return $top_submenus;
}

function truncate($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
	if ($considerHtml) {
		// if the plain text is shorter than the maximum length, return the whole text
		if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
			return $text;
		}
		// splits all html-tags to scanable lines
		preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
		$total_length = strlen($ending);
		$open_tags = array();
		$truncate = '';
		foreach ($lines as $line_matchings) {
			// if there is any html-tag in this line, handle it and add it (uncounted) to the output
			if (!empty($line_matchings[1])) {
				// if it's an "empty element" with or without xhtml-conform closing slash
				if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					// do nothing
				// if tag is a closing tag
				} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
					// delete tag from $open_tags list
					$pos = array_search($tag_matchings[1], $open_tags);
					if ($pos !== false) {
					unset($open_tags[$pos]);
					}
				// if tag is an opening tag
				} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
					// add tag to the beginning of $open_tags list
					array_unshift($open_tags, strtolower($tag_matchings[1]));
				}
				// add html-tag to $truncate'd text
				$truncate .= $line_matchings[1];
			}
			// calculate the length of the plain text part of the line; handle entities as one character
			$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
			if ($total_length+$content_length> $length) {
				// the number of characters which are left
				$left = $length - $total_length;
				$entities_length = 0;
				// search for html entities
				if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
					// calculate the real length of all entities in the legal range
					foreach ($entities[0] as $entity) {
						if ($entity[1]+1-$entities_length <= $left) {
							$left--;
							$entities_length += strlen($entity[0]);
						} else {
							// no more characters left
							break;
						}
					}
				}
				$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
				// maximum lenght is reached, so get off the loop
				break;
			} else {
				$truncate .= $line_matchings[2];
				$total_length += $content_length;
			}
			// if the maximum length is reached, get off the loop
			if($total_length>= $length) {
				break;
			}
		}
	} else {
		if (strlen($text) <= $length) {
			return $text;
		} else {
			$truncate = substr($text, 0, $length - strlen($ending));
		}
	}
	// if the words shouldn't be cut in the middle...
	if (!$exact) {
		// ...search the last occurance of a space...
		$spacepos = strrpos($truncate, ' ');
		if (isset($spacepos)) {
			// ...and cut the text in this position
			$truncate = substr($truncate, 0, $spacepos);
		}
	}
	// add the defined ending to the text
	$truncate .= $ending;
	if($considerHtml) {
		// close all unclosed html-tags
		foreach ($open_tags as $tag) {
			$truncate .= '</' . $tag . '>';
		}
	}
	return $truncate;
}
?>