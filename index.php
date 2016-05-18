<?php
require_once 'retina/core/route.php';

// Remove magic quotes if it is enabled on server
Autoload::remove_magic_quotes();

// Unregister any available $GLOBALS
Autoload::unregister_globals();

// Load all libraries from retina/library
Autoload::libraries();

// Load controllers for front and back
Autoload::front_controllers();
Autoload::back_controllers();

// Load models for front and back
Autoload::front_models();
Autoload::back_models();

// Load all packages from retina/packages
//Autoload::packages();


/*
| ---------------------------------------------------------------------
|  Required Configurations
| ---------------------------------------------------------------------
| Set necessary variables to be used in loading website contents. Like-
| page template, page slug, page name etc.
|
*/
$uri_segment = Autoload::uri_segment();

if(count($uri_segment) <= 1) {
	if( $uri_segment[0]=='' ) {
		$page_template = 'home';
		$page_url = 'index.html';
		$page_slug = 'index.html';
	} else {
		//$uri_seg = explode('.',$uri_segment[0]);
		$uri_seg = $uri_segment;
		$page_template = template($uri_seg[0]);
		$page_url = $uri_seg[0];
		$page_slug = slug($page_url,$page_template);
	}
	$page_category = '';
	$page_category_name='';

	$Db = new Db;
	$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
	foreach ($page_cat_id as $page_cat) {
		$page_category = $page_cat['page_category_id'];
	}

	if($page_slug!=404) {
		$page_cat_names = $Db->select('pages', array('id=' => $page_category));
		foreach ($page_cat_names as $page_cat_name) {
			$page_category_name = $page_cat_name['slug'];
		}
	}

	if($page_category!=0) {
		redirect(SITE_ROOT.'/404.html');
	} else {
		$controller = ucfirst($page_template).'_Controller';
		$controller_name = 'Retina\Front\\'.ucfirst($page_template).'_Controller';

		if(file_exists('retina/front/controller/'.strtolower($controller).'.php')){
			// Load sidebars for front vision
			Autoload::front_sidebars();

			$$page_template = new $controller_name($page_url,$page_slug,$page_template);
			$$page_template->index();
		} else {
			echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
			die('Controller for <strong>'.$page_template.'</strong> is missing!</span>');
		}
	}
} else {
	if($uri_segment[0] == 'admin') {
		if(!empty($uri_segment[1])) {
			$uri_seg = explode('.',$uri_segment[1]);
			$_back	= $uri_seg[0];
		} else {
			$_back = 'dashboard';
		}

		// Load sidebars for back vision
		Autoload::back_sidebars();
		
		$controller = ucfirst($_back).'_Controller';
		$controller_name = 'Retina\Back\\'.ucfirst($_back).'_Controller';

		if(file_exists('retina/back/controller/'.strtolower($controller).'.php')){
			$$_back = new $controller_name($_back);
			$$_back->index();
		} else {
			$controller_name = 'Retina\Back\\Error_Controller';
			$error = new $controller_name($_back);
			$error->index();
		}
	} else {
		if($uri_segment[0]!='' AND $uri_segment[1]!=''){
			//$uri_seg = explode('.',$uri_segment[1]);
			$uri_seg = $uri_segment[1];
			//$page_template = template($uri_seg[0]);
			$page_template = template($uri_seg);
			$page_url = $uri_seg;
			$page_slug = slug($page_url,$page_template);

			$page_category = '';
			$page_category_name='';

			$Db = new Db;
			$page_cat_id = $Db->select('pages', array('slug=' => $page_slug));
			foreach ($page_cat_id as $page_cat) {
				$page_category = $page_cat['page_category_id'];
			}

			if($page_slug!=404) {
				$page_cat_names = $Db->select('pages', array('id=' => $page_category));
				foreach ($page_cat_names as $page_cat_name) {
					$page_category_name = $page_cat_name['slug'];
				}
			}
			$_uri = $uri_segment[0].'.html';
			if($page_category==0 OR $page_slug==404 OR $page_category_name!==$_uri) {
				redirect(SITE_ROOT.'/404.html');
			} else {
				$controller = ucfirst($page_template).'_Controller';
				$controller_name = 'Retina\Front\\'.ucfirst($page_template).'_Controller';

				if(file_exists('retina/front/controller/'.strtolower($controller).'.php')){
					// Load sidebars for front vision
					Autoload::front_sidebars();

					$$page_template = new $controller_name($page_url,$page_slug,$page_template);
					$$page_template->index();
				} else {
					echo '<span style="color:#FFFFFF;font-family:arial;font-size:17px;background-color:#F21C1C;padding:10px;position:absolute;left:40%;">';
					die('Controller for <strong>'.$page_template.'</strong> is missing!</span>');
				}

			}
		} else {
			redirect(SITE_ROOT.'/404.html');
		}
	}
}
?>