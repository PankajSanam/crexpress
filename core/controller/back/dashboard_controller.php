<?php if (!defined('CREXO')) exit('<html><body><div style="position:fixed;top:35%;left:35%;"><img src="http://www.nathanfox.net/content/binary/WindowsLiveWriter/StrongnameaccessdeniederroronWindows.exe_15108/StrongNameAccessDeniedMessageBox_thumb.png"></div></body></html>');

class Dashboard_Controller extends Controller
{
	public function process()
	{
		$this->isBack(true);

		$this->template->assign(array(
			'resources' => '
				<!-- Icons -->
				<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
				<link rel="shortcut icon" href="'.BACK_VIEW.'img/favicon.ico">
				<link rel="apple-touch-icon" href="'.BACK_VIEW.'img/apple-touch-icon.png">
				<link rel="apple-touch-icon" sizes="57x57" href="'.BACK_VIEW.'img/apple-touch-icon-57x57-precomposed.png">
				<link rel="apple-touch-icon" sizes="72x72" href="'.BACK_VIEW.'img/apple-touch-icon-72x72-precomposed.png">
				<link rel="apple-touch-icon" sizes="114x114" href="'.BACK_VIEW.'img/apple-touch-icon-114x114-precomposed.png">
				<link rel="apple-touch-icon-precomposed" href="'.BACK_VIEW.'img/apple-touch-icon-precomposed.png">
				<!-- END Icons -->

				<!-- Stylesheets -->
				<!-- The roboto font is included from Google Web Fonts -->
				<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic">

				<!-- Bootstrap is included in its original form, unaltered -->
				<link rel="stylesheet" href="'.BACK_VIEW.'css/bootstrap.css">

				<!-- Related styles of various icon packs and javascript plugins -->
				<link rel="stylesheet" href="'.BACK_VIEW.'css/plugins.css">

				<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
				<link rel="stylesheet" href="'.BACK_VIEW.'css/main.css">

				<!-- Load a specific file here from css/themes/ folder to alter the default theme of all the template -->

				<!-- The themes stylesheet of this template (for using specific theme color in individual elements (must included last) -->
				<link rel="stylesheet" href="'.BACK_VIEW.'css/themes.css">
				<!-- END Stylesheets -->

				<!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that dont support it) -->
				<script src="'.BACK_VIEW.'js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
			',
		));

		//$validation = new Validation();
		//$validation->admin_auth();

		$model = new Model();
		$product_menu = $model->product_navigation();
		$pages_menu = $model->pages_navigation();
		$meta = new Meta();
		$navigation = new Navigation();

		$this->template->assign(array(
			'meta_title' => $meta->title(null,'Dashboard - CrexPress',false),
			//'page_title' => Route::model($this->page_template)->page_title($this->slug),
			//'page_content' => Route::model($this->page_template)->page_content($this->slug),
			'assets' => CONTENT_DIR,
			'site_path' => SITE_PATH,
			'back_view' => BACK_VIEW,
			'images' => IMAGES,
			'current' => $navigation->current_menu($this->slug,get_slug()),
			//'product_navigation' => $navigation->buildMenu(0,$product_menu,'id="submenu2" class="ddsubmenustyle"'),
			//'pages_navigation' => $navigation->pageMenu(0,$pages_menu,'id="submenu3" class="ddsubmenustyle"'),
		));

		$this->load();
	}
}