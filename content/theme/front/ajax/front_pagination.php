<?php
ob_start();

define('RETINA', true);

require_once '../../config.php';

/** Load core files **/
require_once LIB_DIR.'autoload.php';

//Auto load classes
spl_autoload_register('Autoload::controllers');
spl_autoload_register('Autoload::models');
spl_autoload_register('Autoload::libraries');
spl_autoload_register('Autoload::front_widgets');
spl_autoload_register('Autoload::back_widgets');
@session_start();

require_once '../../retina/library/route.php';
require_once '../../retina/library/sanitize.php';
require_once '../../retina/library/db.php';
require_once '../../retina/library/retina.php';
if($_POST['page']) {
	$page = $_POST['page'];
	$cur_page = $page;
	$page -= 1;
	$per_page = 5;
	$previous_btn = true;
	$next_btn = true;
	$first_btn = true;
	$last_btn = true;
	$start = $page * $per_page;

	$page_slug = $_POST['slug'];
	
	$sanitize = new Sanitize;
	$Db = new Db;

	function page_id($slug){
		$Db = new \Db;

		$tables = $Db->check_meta();
		$count_tables = count($tables);
		$cond = array( 'slug=' => $slug );

		for($i = 0 ; $i <= $count_tables-1; $i++){
			$result =  $Db->select($tables[$i], $cond);
			$count = count($result);

			if($count > 0){
				$id = $result[0]['id'];
				break;
			} else {
				$id = '';
			}
		}
		return $id;
	}

	$Db = new \Db;
	$col = array();
	$abc = array();
	$id = page_id($page_slug);

	$result = $pdo->prepare("SELECT * from colleges where status=1 AND page_id=$id LIMIT $start, $per_page");
	$result->execute();
	$rows = $result->fetchAll();

	$count_result = $pdo->prepare("SELECT * from colleges where status=1 AND page_id=$id");
	$count_result->execute();
	$total_result = $count_result->fetchAll();
	
	$count = count($total_result);

	foreach($rows as $row){
		$col[] = $row;
	}

	$output = $col;
	
	if(count($output)<1){
		$rows = $Db->select('pages',array('status=' => 1, 'page_category_id=' => $id));
		foreach($rows as $row){
			$col[] = $row;
		}
		$total_result = 0;
		foreach($col as $c) {
			$cid = $c['id'];
			$result = $pdo->prepare("SELECT * from colleges where status=1 AND page_id=$cid LIMIT $start, $per_page");
			$result->execute();
			$rows = $result->fetchAll();

			$co = $Db->select('colleges',array('status=' => 1, 'page_id=' => $c['id']));
			foreach($rows as $row){
				$abc[] = $row;
			}
			$total_result += count($co);
		}
		$output = $abc;
		$count = $total_result;
	}
	
	$msg = "";
	foreach($output as $college){
		$msg .= '
		<div class="listing-1">
			<div class="listing-image">
				<div class="listing-logo">
					<a href="'.Retina::page_url($college["slug"]).'"><img src="'.DATA_VISION.'/colleges/'.$college["featured_image"].'" width="91" height="66" /></a>
				</div>
				<div class="listing-no">
					<span><img src="'.FRONT_VISION.'/images/contact.png" width="14" height="14" />'.' '.$college['contact_number'].'</span>
				</div>
				<div class="request-info"><input type="button" value="View Detail" onClick=""/></div>
			</div>
			<div class="listing-detail">
				<a href="'.Retina::page_url($college['slug']).'">'.$college['title'].'</a>
				<p>'.$college['address'].'</p>
				<span>'.$sanitize->strip_html($college['content'],200,'...').'</span> 
			</div>
		</div>
		';
	}

	$no_of_paginations = ceil($count / $per_page);

	/* ---------------Calculating the starting and ending values for the loop----------------------------------- */
	if ($cur_page >= 7) {
		$start_loop = $cur_page - 3;
		if ($no_of_paginations > $cur_page + 3)
    		$end_loop = $cur_page + 3;
		else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
    		$start_loop = $no_of_paginations - 6;
    		$end_loop = $no_of_paginations;
		} else {
    		$end_loop = $no_of_paginations;
		}
	} else {
		$start_loop = 1;
		if ($no_of_paginations > 7)
    		$end_loop = 7;
		else
    		$end_loop = $no_of_paginations;
	}
	/* ----------------------------------------------------------------------------------------------------------- */
	$msg .= "<div class='pagination'><ul>";

	// FOR ENABLING THE FIRST BUTTON
	if ($first_btn && $cur_page > 1) {
		$msg .= "<li p='1' class='active'>First</li>";
	} else if ($first_btn) {
		$msg .= "<li p='1' class='inactive'>First</li>";
	}

	// FOR ENABLING THE PREVIOUS BUTTON
	if ($previous_btn && $cur_page > 1) {
		$pre = $cur_page - 1;
		$msg .= "<li p='$pre' class='active'>Previous</li>";
	} else if ($previous_btn) {
		$msg .= "<li class='inactive'>Previous</li>";
	}
	for ($i = $start_loop; $i <= $end_loop; $i++) {
		if ($cur_page == $i)
			$msg .= "<li p='$i' style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
		else
			$msg .= "<li p='$i' class='active'>{$i}</li>";
	}

	// TO ENABLE THE NEXT BUTTON
	if ($next_btn && $cur_page < $no_of_paginations) {
		$nex = $cur_page + 1;
		$msg .= "<li p='$nex' class='active'>Next</li>";
	} else if ($next_btn) {
		$msg .= "<li class='inactive'>Next</li>";
	}

	// TO ENABLE THE END BUTTON
	if ($last_btn && $cur_page < $no_of_paginations) {
		$msg .= "<li p='$no_of_paginations' class='active'>Last</li>";
	} else if ($last_btn) {
		$msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
	}
	// $goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
	// $total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
	// $msg = $msg . "</ul>" . $goto . $total_string . "</div>";  // Content for pagination
	$msg = $msg . "</ul></div>";
	echo $msg;
}