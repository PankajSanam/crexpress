<?php if (!defined('CREXO')) exit('No Trespassing!');

class Contact_Controller extends Crexo_Controller
{
	public function front_index()
	{
		$this->template->assign(array(
			'styles1' => Html::styles( array(
					'front/css/html5-reset.css' => '',
					'front/css/flexslider.css' => '',
					'front/css/tipsy.css' => '',
					'front/css/jquery.fancybox.css' => '',
					'front/css/smoothness/jquery-ui-1.10.1.custom.min.css' => '',
					'front/css/shortcodes.css' => '',
					'front/css/style.css' => 'id="main-style"',
					'front/css/responsive.css' => '',
				)),
			'styles2' => Html::styles(array(
					'front/css/ie.css' => '',
				)),
			'styles3' => Html::styles(array(
					//'front/css/colors/green.css' => 'id="color-style"',
					'front/css/colors/blue.css' => 'id="color-style"',
					//'front/css/colors/indigo.css' => 'id="color-style"',
					//'front/css/colors/orange.css' => 'id="color-style"',
					//'front/css/colors/pink.css' => 'id="color-style"',
					//'front/css/colors/purple.css' => 'id="color-style"',
					//'front/css/colors/red.css' => 'id="color-style"',
					//'front/css/colors/retro-green.css' => 'id="color-style"',
					//'front/css/colors/teal.css' => 'id="color-style"',
					//'front/css/colors/yellow.css' => 'id="color-style"',
				))
		));

		$this->template->assign(array(
			'scripts1' => Html::scripts(array(
					//jQuery
					'front/js/jquery-1.8.2.min.js',
					//IE detection
					'front/js/ie.js',
					//jQuery easing
					'front/js/jquery.easing.1.3.js',
					//Modernizr
					'front/js/modernizr.custom.js'
				)),
			'scripts2' => Html::scripts(array(
					'front/js/respond.min.js',
					'front/js/selectivizr-min.js',
				)),
			'scripts3' => Html::scripts(array(
					'front/js/ddlevelsmenu.js'
				)),
		));

		$this->template->assign(array(
			'script1' => Html::script('
				ddlevelsmenu.setup("nav", "topbar");
			')
		));

		$this->template->assign(array(
			'scripts4' => Html::scripts(array(
					//<!-- tiny nav -->
					'front/js/tinynav.min.js',
					//<!-- form validation -->
					'front/js/jquery.validate.min.js',
					//<!-- scroll to top -->
					'front/js/jquery.ui.totop.min.js',
					//<!-- responsive video embeds -->
					'front/js/jquery.fitvids.js',
					//<!-- Twitter widget -->
					'front/js/jquery.tweet.js',
				)
			),
			//<!-- Google maps -->
			'scripts5' => '<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>',
			'scripts6' => Html::scripts(array(
						//<!-- gMap -->
						'front/js/jquery.gmap.min.js',
						//<!-- jQuery REVOLUTION Slider  -->
						//<!-- swipe gestures -->
						'front/js/revslider.jquery.themepunch.plugins.min.js',
						//<!-- tooltips -->
						'front/js/jquery.tipsy.js',
						//<!-- jQuery initialization -->
						'front/js/custom.js'
					)
				),
		));

		$Db = new Db;
		$row = $Db->dbquery('SELECT product_id,parent_id,is_product,slug,title,sort_order,status FROM cp_product where is_product = 0 AND status=1 order by parent_id, sort_order, title');
		$items = $row->fetchAll();
		// Create a multidimensional array to contain a list of items and parents
		$menu = array(
			'items' => array(),
			'parents' => array()
		);
		// Builds the array lists with data from the menu table
		foreach($items as $item)
		{
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menu['items'][$item['product_id']] = $item;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menu['parents'][$item['parent_id']][] = $item['product_id'];
		}

		$rowx = $Db->dbquery('
			SELECT
				status,
				menu_position,
				page_category_id,
				slug,
				menu_name as title,
				menu_sort_order,
				id
			FROM cp_pages
			where
				menu_position LIKE "%top%" AND
				status=1 AND
				page_category_id=0 AND
				menu_name<> "" AND
				menu_sort_order<>0 order by page_category_id, menu_sort_order, menu_name');

		$itemx = $rowx->fetchAll();
		// Create a multidimensional array to contain a list of items and parents
		$menux = array(
			'items' => array(),
			'parents' => array()
		);
		// Builds the array lists with data from the menu table
		foreach($itemx as $ite)
		{
			// Creates entry into items array with current menu item id ie. $menu['items'][1]
			$menux['items'][$ite['id']] = $ite;
			// Creates entry into parents array. Parents array contains a list of all items with children
			$menux['parents'][$ite['page_category_id']][] = $ite['id'];
		}

		$this->template->assign(array(
			'meta_title' => $this->model['crexo']->meta_title($this->slug),
			'meta_description' => $this->model['crexo']->meta_description($this->slug),
			'meta_keywords' => $this->model['crexo']->meta_keywords($this->slug),
			'page_title' => $this->model[$this->page_template]->page_title($this->slug),
			'page_content' => $this->model[$this->page_template]->page_content($this->slug),
			'assets' => CONTENT_DIR,
			'site_path' => SITE_PATH,
			'images' => IMAGES,
			'current' => $this->library['navigation']->current_menu($this->slug,''),
			'logo' => Html::img('logo.png'),
			'product_navigation' => $this->library['navigation']->buildMenu(0,$menu,'id="submenu2" class="ddsubmenustyle"'),
			'pages_navigation' => $this->library['navigation']->pageMenu(0,$menux,'id="submenu3" class="ddsubmenustyle"'),
		));

		parent::load();
	}
}