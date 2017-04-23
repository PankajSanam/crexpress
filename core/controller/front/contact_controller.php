<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Contact_Controller extends Controller
{
	private $table = 'pages';

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
			    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> <!-- Google maps -->
			    <script src="'.FRONT_VIEW.'js/jquery.gmap.min.js" type="text/javascript"></script> <!-- gMap -->
			    <script type="text/javascript" src="'.FRONT_VIEW.'js/revslider.jquery.themepunch.plugins.min.js"></script> <!-- swipe gestures -->
			    <script src="'.FRONT_VIEW.'js/jquery.tipsy.js" type="text/javascript"></script> <!-- tooltips -->
			    <script src="'.FRONT_VIEW.'style-switcher/style-switcher.js" type="text/javascript"></script> <!-- style switcher -->
			    <script src="'.FRONT_VIEW.'js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
			    <!-- end JS -->
			',
		));
		$model = new Model();
		$product_menu = $model->product_navigation();
		$pages_menu = $model->pages_navigation();
		$meta = new Meta();
		$navigation = new Navigation();

		$this->template->assign(array(
			'meta_title' => $meta->title($this->table,$this->slug,true),
			'meta_description' => $meta->description($this->table,$this->slug,true),
			'meta_keywords' => $meta->keywords($this->table,$this->slug,true),
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