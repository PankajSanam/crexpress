<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Dashboard_Controller extends Controller
{
	public function process()
	{
		$this->template->assign(array(
			'resources' => '
				<!-- begin CSS -->
				<link href="'.FRONT_VIEW.'css/style.css" type="text/css" rel="stylesheet" id="main-style">
				<link href="'.FRONT_VIEW.'css/responsive.css" type="text/css" rel="stylesheet">
				<!--[if IE]> <link href="'.FRONT_VIEW.'css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
				'.
				/*<link href="'.FRONT_VIEW.'css/colors/green.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/indigo.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/orange.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/pink.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/purple.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/red.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/retro-green.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/teal.css" type="text/css" rel="stylesheet" id="color-style">
				<link href="'.FRONT_VIEW.'css/colors/yellow.css" type="text/css" rel="stylesheet" id="color-style">*/
				'<link href="'.FRONT_VIEW.'css/colors/blue.css" type="text/css" rel="stylesheet" id="color-style">
			    <!-- end CSS -->

			    <link href="'.IMAGES.'favicon.ico" type="image/x-icon" rel="shortcut icon">

				<!-- begin JS -->
			    <script src="'.FRONT_VIEW.'js/jquery-1.8.2.min.js" type="text/javascript"></script> <!-- jQuery -->
			    <script src="'.FRONT_VIEW.'js/ie.js" type="text/javascript"></script> <!-- IE detection -->
			    <script src="'.FRONT_VIEW.'js/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
				<script src="'.FRONT_VIEW.'js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
			    <!--[if IE 8]>
			    <script src="'.FRONT_VIEW.'js/respond.min.js" type="text/javascript"></script>
			    <script src="'.FRONT_VIEW.'js/selectivizr-min.js" type="text/javascript"></script>
			    <![endif]-->
			    <script src="'.FRONT_VIEW.'js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
			    <script type="text/javascript"> <!-- drop-down menu -->
			        ddlevelsmenu.setup("nav", "topbar");
			    </script>
			    <script src="'.FRONT_VIEW.'js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
			    <script src="'.FRONT_VIEW.'js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
			    <script src="'.FRONT_VIEW.'js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
			    <script src="'.FRONT_VIEW.'js/jquery.fitvids.js" type="text/javascript"></script> <!-- responsive video embeds -->
			    <script src="'.FRONT_VIEW.'js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
				<script type="text/javascript" src="'.FRONT_VIEW.'js/revslider.jquery.themepunch.plugins.min.js"></script> <!-- swipe gestures -->
			    <script src="'.FRONT_VIEW.'js/jquery.tipsy.js" type="text/javascript"></script> <!-- tooltips -->
			    <script src="'.FRONT_VIEW.'js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
			    <!-- end JS -->
			',
		));

		$styles = array(
			//Bootstrap
			'bootstrap.min.css' => '',
			//Bootstrap responsive
			'bootstrap-responsive.min.css' => '',
			//jQuery UI
			'plugins/jquery-ui/smoothness/jquery-ui.css' => '',
			'plugins/jquery-ui/smoothness/jquery.ui.theme.css' => '',
			//PageGuide
			'plugins/pageguide/pageguide.css' => '',
			//Fullcalendar
			'plugins/fullcalendar/fullcalendar.css' => '',
			'plugins/fullcalendar/fullcalendar.print.css' => 'print',
			//chosen
			'plugins/chosen/chosen.css' => '',
			//select2
			'plugins/select2/select2.css' => '',
			//icheck
			'plugins/icheck/all.css' => '',
			//Theme CSS
			'style.css' => '',
			//Color CSS
			'themes.css' => '',
		);

		$scripts = array(
			//jQuery
			'jquery.min.js',
			//Nice Scroll
			'plugins/nicescroll/jquery.nicescroll.min.js',
			//jQuery UI
			'plugins/jquery-ui/jquery.ui.core.min.js',
			'plugins/jquery-ui/jquery.ui.widget.min.js',
			'plugins/jquery-ui/jquery.ui.mouse.min.js',
			'plugins/jquery-ui/jquery.ui.draggable.min.js',
			'plugins/jquery-ui/jquery.ui.resizable.min.js',
			'plugins/jquery-ui/jquery.ui.sortable.min.js',
			//Touch enable for jquery UI
			'plugins/touch-punch/jquery.touch-punch.min.js',
			//slimScroll
			'plugins/slimscroll/jquery.slimscroll.min.js',
			//Bootstrap
			'bootstrap.min.js',
			//vmap
			'plugins/vmap/jquery.vmap.min.js',
			'plugins/vmap/jquery.vmap.world.js',
			'plugins/vmap/jquery.vmap.sampledata.js',
			//Bootbox
			'plugins/bootbox/jquery.bootbox.js',
			//Flot
			'plugins/flot/jquery.flot.min.js',
			'plugins/flot/jquery.flot.bar.order.min.js',
			'plugins/flot/jquery.flot.pie.min.js',
			'plugins/flot/jquery.flot.resize.min.js',
			//imagesLoaded
			'plugins/imagesLoaded/jquery.imagesloaded.min.js',
			//PageGuide
			'plugins/pageguide/jquery.pageguide.js',
			//FullCalendar
			'plugins/fullcalendar/fullcalendar.min.js',
			//Chosen
			'plugins/chosen/chosen.jquery.min.js',
			//select2
			'plugins/select2/select2.min.js',
			//icheck
			'plugins/icheck/jquery.icheck.min.js',
			//Theme framework
			'eakroko.min.js',
			//Theme scripts
			'application.min.js',
			//Just for demonstration
			'demonstration.min.js',
		);
		$this->model[$this->slug] = Route::back_model($this->slug);
		$this->library['validation']->admin_auth();
		$this->data['controller'] = ucfirst($slug);

		$this->data['meta_title'] 	=	meta_title('Dashboard - CrexPress');
		$this->data['body_class']	=	'';
		$this->data['breadcrumb']	=	'
			<li><a href="'.back_url('dashboard/').'">Dashboard</a></li>
		';

	parent::load('back');

		$model = new Model();
		$product_menu = $model->product_navigation();
		$pages_menu = $model->pages_navigation();
		$meta = new Meta();
		$navigation = new Navigation();

		$table = 'page';

		$this->template->assign(array(
			'meta_title' => $meta->title($table,$this->slug,true),
			'meta_description' => $meta->description($table,$this->slug,true),
			'meta_keywords' => $meta->keywords($table,$this->slug,true),
			'page_title' => Route::model($this->page_template)->page_title($this->slug),
			'page_content' => Route::model($this->page_template)->page_content($this->slug),
			'assets' => CONTENT_DIR,
			'site_path' => SITE_PATH,
			'images' => IMAGES,
			'current' => $navigation->current_menu($this->slug,get_slug()),
			'logo' => Html::img('logo.png'),
			'product_navigation' => $navigation->buildMenu(0,$product_menu,'id="submenu2" class="ddsubmenustyle"'),
			'pages_navigation' => $navigation->pageMenu(0,$pages_menu,'id="submenu3" class="ddsubmenustyle"'),
		));

		$this->load();
	}
}