<?php if (!defined('CREXO')) exit('No Trespassing!');

function get_image($folder, $image='', $width='', $height='' )
{
	if( !empty($image) )
	{
		$output = '<img src="'.DATA_VIEW.'/'.$folder.'/'.$image.'" width="'.$width.'" height="'.$height.'" />';
	}
	else
	{
		$output = '<img src="'.BACK_VIEW.'/img/no_image.gif" width="'.$width.'" height="'.$height.'" />';
	}
	return $output;
}

function assign($mVars, $sValue = '') {
	if (!is_array($mVars)) {
		$mVars = array($mVars => $sValue);
	}

	foreach ($mVars as $sVar => $sValue) {
		$this->_aVars[$sVar] = $sValue;
	}

	return $this;
}

function debug($var, $die = FALSE) {
	if (!empty($var)) {
		echo '<br /><pre style="color:white; border:4px #fff dotted; background-color:#576881; padding:10px;">'. print_r($var, true) . '</pre><br />';
	} else {
		echo '<br /><pre style="color:white; border:4px #fff dotted; background-color:#576881; padding:10px;">Variable is empty!</pre><br />';
	}
	if($die) die();
}

function alert($message = 'Hey!')
{
	echo '<script> alert("'.$message.'"); </script>';
}

function meta_title($content)
{
	$meta_title = '<title>'.$content.'</title>'."\n";
	return $meta_title;
}
	
function get_extension($filename) {
	$output = explode('.', $filename);
	return '.'.end($output);
}

function status($status){
	if($status!=0){
		$page_status = '<span class="label label-satgreen">Enabled</span>';
	} else {
		$page_status = '<span class="label label-lightred">Disabled</span>';
	}
	return $page_status;
}

function copyright( $year = '2014' ){
	$copy = '&copy; '.$year.', All Rights Reserved.';
	return $copy;
}

function powered_by( $title = 'Crexpress - Content Management Framework' ){
	$powered = 'Powered By <a href="http://www.crexo.com" title="'.$title.'">Crexo.com</a>';
	return $powered;
}

function designed_by( $title = 'Website Designing and Development' ){
	$designed = '<a href="http://www.gitinfosys.com" title="'.$title.'">Website Designed &amp; Developed </a> by GIT Infosys';
	return $designed;
}

function category_name($table,$id){
	$Db = new Db;
	$cond = array( 'id=' => $id );
	$query = $Db->select($table,$cond);
	foreach($query as $q){ }
	return $q['name'];
}

function menu_name($page_slug){
	$page_category = '';
	$page_category_name='';

	$Db = new \Db;
	if(!is_int($page_slug)) {
		$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
		foreach ($page_cat_id as $page_cat) {
			$page_category = $page_cat['page_category_id'];
		}

		$page_cat_names = $Db->select('pages', array('id=' => $page_category));
		foreach ($page_cat_names as $page_cat_name) {
			$page_category_name = $page_cat_name['menu_name'];
		}

		$page_category_name = explode('.',$page_category_name);
		$page_category_name = $page_category_name[0];
		
		if($page_category!=0) {
			$link = SITE_PATH.'/'.$page_category_name.'/'.$page_slug;
		} else {
			$link = SITE_PATH.'/'.$page_slug;
		}
	} else {
		$page_links = $Db->select('pages', array('id=' => $page_slug));
		foreach ($page_links as $page_link) {
			$link = $page_link['menu_name'];
		}
	}

	return $link;
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
		$loc = SITE_PATH.'/'.$active_page['slug'];
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