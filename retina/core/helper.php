<?php if ( ! defined('RETINA_VERSION')) exit('No direct access allowed');

function current_page(){
	$path = $_SERVER['PHP_SELF'];
	$file = basename($path, ".php");

	return $file;
}

function redirect($url) {
    header("Location:$url");
    exit();
}

function status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function from_to($from, $to){
	if($from == $to){
		return $from;
	} else {
		return $from . ' from ' . $to;
	}
}

function social_icons($width = '', $height = ''){
	$Db = new Db;
	$social = '<ul>';
	$social_icons = $Db->select('social_icons');
	foreach($social_icons as $social_icon){
		$social .= '<li><a target="_blank" title="'.$social_icon['name'].'" href="'.$social_icon['url'].$social_icon['link'].'">
				<img title="'.$social_icon['name'].'" alt="'.$social_icon['name'].'" src="'.DATA_VISION.'/social/'.$social_icon['image'].'" width="'.$width.'" height="'.$height.'" /></a></li>';
	}
	$social .= '</ul>';

	return $social;
}

function copyright( $year = '2013' ){
	$copy = '&copy; '.$year.', All Rights Reserved.';
	return $copy;
}

function powered_by( $title = 'Website Designing and Development' ){
	$powered = 'Powered By <a href="http://www.gitinfosys.com" title="'.$title.'">GIT Infosys</a>';
	return $powered;
}

function designed_by( $title = 'Website Designing and Development' ){
	$powered = '<a href="http://www.gitinfosys.com" title="'.$title.'">Designed &amp; Developed </a>By GIT Infosys';
	return $powered;
}

function slug($page,$page_template){
	$Db = new Db;
	$meta_tables = $Db->check_meta();
	$count_tables = count($meta_tables);
	$cond = array(
		'slug=' => $page,
		'status=' => 1
	);
	if(strrchr($page, '?')){
		$p = explode('?',$page);
		$slug = $p[0];
	} else {
		for($i = 0 ; $i <= $count_tables-1; $i++){
			$result =  $Db->select($meta_tables[$i], $cond);
			$count = count($result);

			if($count > 0){
				$slug = $result[0]['slug'];
				break;
			} else {
				$slug = '404.html';
			}
		}
	}

	return $slug;
}

function template_name($id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select('page_templates',$cond);
	foreach($query as $q){ }
	return $q['template_name'];
}

function template($page){
	$Db = new Db;
	$meta_tables = $Db->check_meta();
	$count_tables = count($meta_tables);
	
	if(strrchr($page, '?')){
		$p = explode('?',$page);
		$page = $p[0];
	} else {
		$page = $page;
	}

	$cond = array(
		'slug=' => $page,
		'status=' => 1
	);
	
	for($i = 0 ; $i <= $count_tables-1; $i++){
		$result =  $Db->select($meta_tables[$i], $cond);
		$count = count($result);

		if($count > 0){
			$page_template = template_name($result[0]['page_template_id']);
			break;
		} else {
			$page_template = 'page';
		}
	}

	return $page_template;
}

function category_name($table,$id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select($table,$cond);
	foreach($query as $q){ }
	return $q['name'];
}

function page_url($page_slug){
	$page_category = '';
	$page_category_name='';

	$Db = new \Db;
	$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
	foreach ($page_cat_id as $page_cat) {
		$page_category = $page_cat['page_category_id'];
	}

	$page_cat_names = $Db->select('pages', array('id=' => $page_category));
	foreach ($page_cat_names as $page_cat_name) {
		$page_category_name = $page_cat_name['slug'];
	}

	$page_category_name = explode('.',$page_category_name);
	$page_category_name = $page_category_name[0];

	if($page_category!=0) {
		$link = SITE_ROOT.'/'.$page_category_name.'/'.$page_slug;
	} else {
		$link = SITE_ROOT.'/'.$page_slug;
	}

	return $link;
}

function today(){
	return date("Y-m-d");
}

function is_deletable($table,$id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select($table,$cond);

	foreach($query as $q){ }
	if($q['deletable'] == 0) {
		return false;
	} else {
		$Db->delete($table,array( 'id=' => $id ));
		return true;
	}
}

function alert($message){
	echo '<script>alert("'.$message.'");</script>';
}

function generate_sitemap(){
	// Create a sitemap
	$_sitemap = new Sitemap;
	$_sitemap->generate();
	$_sitemap->load(); // Load up sitemap.xml

	$Db = new Db;
	$rows = $Db->select('pages', array('status=' => 1));
	foreach($rows as $row){
		$active_pages[] = $row;
	}
	
	foreach($active_pages as $active_page) {
		$loc = SITE_URL.'/'.$active_page['slug'];
		$lastmod = $active_page['last_updated'];
		
		$priorities = array( '0.7', '0.8', '0.9', '1.0');
		$k = array_rand($priorities);
		if($active_page['slug']=='index.html' OR $active_page['slug']=='index') {
			$priority = '1.0';
		} else {
			$priority = $priorities[$k];
		}
		$changefreq = 'weekly';

		$attr = array(
			'loc'		=>	$loc,
			'lastmod'	=>	$lastmod,
			'priority' 	=>	$priority,
			'changefreq'=>	$changefreq
		);

		$_sitemap->addrow($attr);
	}
	global $dom;
	$dom->save('sitemap.xml'); // Save sitemap
}

?>