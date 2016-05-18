<?php

function get_current_page(){
	$path = $_SERVER['PHP_SELF'];
	$file = basename($path, ".php");

	return $file;
}

function redirect($url) {
    header("Location: $url"); /* Redirect browser */
    exit();
}

function truncate($text, $length = 60, $ending = '...', $exact = false, $considerHtml = true) {
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

// Get page template name
function page_template($page){
	$db = new Db_query;
	$count = $db->count_query('pages', array('page_slug' => $page, 'status' => 1 ));
	$result = $db->select_query('pages', array('page_slug' => $page, 'status' => 1 ));
	
	$count1 = $db->count_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
	$result1 = $db->select_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));

	if($count > 0 ) {
		$page_template = get_page_template_name($result[0]['page_template_id']);
	} else {
		if($count1 > 0) {
			$page_template = get_page_template_name($result1[0]['page_template_id']);
		} else {
			$page_template = 'page';	
		}
	}
	return $page_template;
}

// Get page slug name
function page_slug($page,$page_template){
	$db = new Db_query;

	if($page_template=='private_job') {
		$count = $db->count_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));
		$result = $db->select_query('private_jobs', array('job_slug' => $page, 'status' => 1 ));

		if($count > 0)
			$page_slug = $result[0]['job_slug'];
		else
			$page_slug = 404;
	} else {
		$count = $db->count_query('pages', array('page_slug' => $page, 'status' => 1 ));
		$result = $db->select_query('pages', array('page_slug' => $page, 'status' => 1 ));

		if($count > 0)
			$page_slug = $result[0]['page_slug'];
		else
			$page_slug = 404;
	}

	return $page_slug;
}

function get_status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function get_records($table_name,$cond=''){
	$db = new Db_query;
	if(!empty($cond))
		$condition = $cond;
	else
		$condition = '';
	
	$query = $db->select_query($table_name,$condition);
	foreach($query as $sql){
		$row[] = $sql;
	}
	return $row;
}






function get_selected_value($type,$db,$user){
	if($db==$user){
		if($type == 'radio') return ' checked ';
		if($type == 'select') return ' selected ';
	}
}

function get_id_types($id_type = '', $editable = '' ){
	if($editable == '') {
?>
	<select name="id_type">
		<option value="">-- Select --</option>
		<option value="Voter ID Card" >Voter ID Card</option>
		<option value="Pan Card" >Pan Card</option>
		<option value="Driving License" >Driving Licence</option>
		<option value="Aadhar Card" >Aadhar Card</option>
	</select>
<?php } else { ?>
	<select name="id_type">
		<option value="">-- Select --</option>
		<option value="Voter ID Card" <?php echo get_selected_value('select',$id_type,'Voter ID Card'); ?>>Voter ID Card</option>
		<option value="Pan Card" <?php echo get_selected_value('select',$id_type,'Pan Card'); ?>>Pan Card</option>
		<option value="Driving License" <?php echo get_selected_value('select',$id_type,'Driving License'); ?>>Driving Licence</option>
		<option value="Aadhar Card" <?php echo get_selected_value('select',$id_type,'Aadhar Card'); ?>>Aadhar Card</option>
	</select>
<?php
	}
}
?>