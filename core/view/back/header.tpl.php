<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	{$meta_title}
	<meta name="author" content="Pankaj Sanam" />
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
	{$resources}

	<script type="text/javascript">
		function change_theme(code)
		{
			var dataString = 'code=' + code;
			$.ajax({
				type: "POST",
				url: "{$site_path}/content/themes/back/ajax/back_theme_color.php",
				data: dataString,
				cache: false,
				success: function(html) {
					$("body").attr("class", html);
					//$("#body").html(html);
				}
			});
		}
	</script>
</head>
<!-- Body -->
<!-- Add the class .hide-side-content to <body> to hide side content by default -->
<body>
	<!-- Page Container -->
	<div id="page-container" class="full-width">
		<!-- Header -->
		<!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
		<!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to <body> element! -->
		<!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to <body> element! -->
		<!-- <header class="navbar navbar-inverse navbar-fixed-top"> -->
		<!-- <header class="navbar navbar-inverse navbar-fixed-bottom"> -->
		<header class="navbar navbar-inverse">
			<!-- Navbar Inner -->
			<div class="navbar-inner">
				<!-- div#row-fluid -->
				<div class="row-fluid">
					<!-- Sidebar Toggle Buttons (Desktop & Tablet) -->
					<div class="span4 hidden-phone">
						<ul class="nav pull-left">
							<!-- Desktop Button (Visible only on desktop resolutions) -->
							<li class="visible-desktop">
								<a href="javascript:void(0)" id="toggle-side-content">
									<i class="icon-reorder"></i>
								</a>
							</li>
							<!-- END Desktop Button -->

							<!-- Tablet Button -->
							<li class="visible-tablet">
								<!-- It is set to open and close the left sidebar on tablets. The class .nav-collapse was added to aside#page-sidebar -->
								<a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
									<i class="icon-reorder"></i>
								</a>
							</li>
							<!-- END Tablet Button -->

							<!-- Divider -->
							<li class="divider-vertical remove-margin"></li>
						</ul>
					</div>
					<!-- END Sidebar Toggle Buttons -->

					<!-- Brand and Search Section -->
					<div class="span4 text-center">
						<!-- Top search -->
						<form id="top-search" class="pull-left" action="page_ready_search_results.html" method="post">
							<input type="text" id="search-term" name="search-term" placeholder="Search..">
						</form>
						<!-- END Top search -->

						<!-- Logo -->
						<a href="{$site_path}" class="brand">
							<img src="{$back_view}img/template/logo.png" alt="logo">
						</a>
						<!-- END Logo -->

						<!-- Loading Indicator, Used for demostrating how loading of notifications could happen, check main.js - uiDemo() -->
						<div id="loading" class="hide"><i class="icon-spinner icon-spin"></i></div>
					</div>
					<!-- END Brand and Search Section -->

					<!-- Header Nav Section -->
					<div id="header-nav-section" class="span4 clearfix">
					<!-- Header Nav -->
					<ul class="nav pull-right">
						<!-- Theme Options, functionality initialized at main.js - templateOptions() -->
						<li class="dropdown dropdown-theme-options">
							<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Theme Options</a>
							<ul class="dropdown-menu">
								<!-- Page Options -->
								<li class="theme-extra visible-desktop">
									<label for="theme-page-full">
										<input type="checkbox" id="theme-page-full" name="theme-page-full" class="input-themed">
										Full width page
									</label>
								</li>
								<!-- END Page Options -->

								<!-- Divider -->
								<li class="divider visible-desktop"></li>

								<!-- Sidebar Options -->
								<li class="theme-extra visible-desktop">
									<label for="theme-sidebar-sticky">
										<input type="checkbox" id="theme-sidebar-sticky" name="theme-sidebar-sticky" class="input-themed">
										Sticky Sidebar
									</label>
								</li>
								<!-- END Sidebar Options -->

								<!-- Divider -->
								<li class="divider visible-desktop"></li>

								<!-- Header Options -->
								<li class="theme-extra visible-desktop">
									<label for="theme-header-top">
										<input type="checkbox" id="theme-header-top" name="theme-header-top" class="input-themed">
										Top fixed header
									</label>
									<label for="theme-header-bottom">
										<input type="checkbox" id="theme-header-bottom" name="theme-header-bottom" class="input-themed">
										Bottom fixed header
									</label>
								</li>
								<!-- END Header Options -->

								<!-- Divider -->
								<li class="divider visible-desktop"></li>

								<!-- Color Themes -->
								<li>
									<ul class="theme-colors clearfix">
										<li class="active">
											<a href="javascript:void(0)" class="img-circle themed-background-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-army themed-border-army" data-theme="css/themes/army.css" data-toggle="tooltip" title="Army"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-asphalt themed-border-asphalt" data-theme="css/themes/asphalt.css" data-toggle="tooltip" title="Asphalt"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-autumn themed-border-autumn" data-theme="css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-cherry themed-border-cherry" data-theme="css/themes/cherry.css" data-toggle="tooltip" title="Cherry"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-city themed-border-city" data-theme="css/themes/city.css" data-toggle="tooltip" title="City"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-dawn themed-border-dawn" data-theme="css/themes/dawn.css" data-toggle="tooltip" title="Dawn"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-deepsea themed-border-deepsea" data-theme="css/themes/deepsea.css" data-toggle="tooltip" title="Deepsea"></a>
										</li>
										<li><a href="javascript:void(0)" class="img-circle themed-background-diamond themed-border-diamond" data-theme="css/themes/diamond.css" data-toggle="tooltip" title="Diamond"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-fire themed-border-fire" data-theme="css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-grass themed-border-grass" data-theme="css/themes/grass.css" data-toggle="tooltip" title="Grass"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-leaf themed-border-leaf" data-theme="css/themes/leaf.css" data-toggle="tooltip" title="Leaf"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-night themed-border-night" data-theme="css/themes/night.css" data-toggle="tooltip" title="Night"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-ocean themed-border-ocean" data-theme="css/themes/ocean.css" data-toggle="tooltip" title="Ocean"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-oil themed-border-oil" data-theme="css/themes/oil.css" data-toggle="tooltip" title="Oil"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-stone themed-border-stone" data-theme="css/themes/stone.css" data-toggle="tooltip" title="Stone"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-sun themed-border-sun" data-theme="css/themes/sun.css" data-toggle="tooltip" title="Sun"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-tulip themed-border-tulip" data-theme="css/themes/tulip.css" data-toggle="tooltip" title="Tulip"></a>
										</li>
										<li>
											<a href="javascript:void(0)" class="img-circle themed-background-wood themed-border-wood" data-theme="css/themes/wood.css" data-toggle="tooltip" title="Wood"></a>
										</li>
									</ul>
								</li>
								<!-- END Color Themes -->
							</ul>
						</li>
						<!-- END Theme Options -->

						<!-- Divider -->
						<li class="divider-vertical remove-margin"></li>

						<!-- Notifications -->
						<li class="dropdown dropdown-notifications">
							<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-warning-sign"></i>
								<span class="badge badge-neutral">4</span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="alert">
										<i class="icon-bell"></i> <strong>App</strong> Please pay attention!
									</div>
									<div class="alert alert-error">
										<i class="icon-bell-alt"></i> <strong>App</strong> There was an error!
									</div>
									<div class="alert alert-info">
										<i class="icon-bolt"></i> <strong>App</strong> Info message!
									</div>
									<div class="alert alert-success">
										<i class="icon-bullhorn"></i> <strong>App</strong> Service restarted!
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0)"><i class="icon-warning-sign pull-right"></i>Notification Center</a>
								</li>
							</ul>
						</li>
						<!-- END Notifications -->

						<!-- Messages -->
						<li class="dropdown dropdown-messages">
							<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-envelope-alt"></i>
								<span class="badge badge-neutral display-none"></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="media">
										<a class="pull-left" href="javascript:void(0)" data-toggle="tooltip" title="Newbie">
											<img src="{$back_view}img/placeholders/image_64x64_dark.png" alt="fakeimg" class="img-circle">
										</a>
										<div class="media-body">
											<h5 class="media-heading clearfix">
												<span class="label label-success">1 min ago</span><a href="javascript:void(0)">Username</a>
											</h5>
											<div class="media">Lorem ipsum dolor sit amet, consectetur..</div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="media">
										<a class="pull-left" href="javascript:void(0)" data-toggle="tooltip" title="Pro">
											<img src="{$back_view}img/placeholders/image_64x64_dark.png" alt="fakeimg" class="img-circle">
										</a>
										<div class="media-body">
											<h5 class="media-heading clearfix"><span class="label label-success">2 hours ago</span><a href="javascript:void(0)">Username</a></h5>
											<div class="media">Lorem ipsum dolor sit amet, consectetur..</div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="media">
										<a class="pull-left" href="javascript:void(0)" data-toggle="tooltip" title="VIP">
											<img src="{$back_view}img/placeholders/image_64x64_dark.png" alt="fakeimg" class="img-circle">
										</a>
										<div class="media-body">
											<h5 class="media-heading clearfix"><a href="javascript:void(0)">Username</a><span class="label label-success">3 days ago</span></h5>
											<div class="media">Lorem ipsum dolor sit amet, consectetur..</div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<a href="page_comp_inbox.html"><i class="icon-envelope-alt pull-right"></i>Message Center</a>
								</li>
							</ul>
						</li>
						<!-- END Messages -->
					</ul>
					<!-- END Header Nav -->

					<!-- Mobile Navigation, Shows up on mobile -->
					<ul class="nav pull-left visible-phone">
						<li>
							<!-- It is set to open and close the main navigation on mobiles. The class .nav-collapse was added to aside#page-sidebar -->
							<a href="javascript:void(0)" data-toggle="collapse" data-target=".nav-collapse">
								<i class="icon-reorder"></i>
							</a>
						</li>
						<li class="divider-vertical remove-margin"></li>
					</ul>
					<!-- END Mobile Navigation, Shows up on mobile -->
				</div>
				<!-- END Header Nav Section -->
			</div>
		<!-- END div#row-fluid -->
		</div>
	<!-- END Navbar Inner -->
	</header>
	<!-- END Header -->

	<!-- Left Sidebar -->
	<!-- Add the class .sticky for a sticky sidebar -->
	<aside id="page-sidebar" class="nav-collapse collapse">
	<!--
	Wrapper for scrolling functionality
	Used only if the .sticky class added above. You can remove it and you will have a sticky sidebar
	without scrolling enabled when you set the sidebar to be sticky
	-->
	<div class="side-scrollable">
		<!-- Mini Profile -->
		<div class="mini-profile">
			<div class="mini-profile-options">
				<a href="javascript:void(0)" class="badge badge-info loading-on" data-toggle="tooltip" data-placement="right" title="Refresh">
					<i class="icon-refresh"></i>
				</a>
				<a href="page_ready_shopping_cart.html" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="6 Products">
					<i class="glyphicon-shopping_cart"></i>
				</a>
				<!-- Modal div is at the bottom of the page before including javascript code, we use .enable-tooltip class for the tooltip because data-toggle is used for modal -->
				<a href="#modal-user-account" class="badge badge-success enable-tooltip" role="button" data-toggle="modal" data-placement="right" title="Settings">
					<i class="glyphicon-cogwheel"></i>
				</a>
				<a href="page_login.html" class="badge badge-important" data-toggle="tooltip" data-placement="right" title="Log out">
					<i class="icon-signout"></i>
				</a>
			</div>
			<a href="page_ready_user_profile.html">
				<img src="{$back_view}img/template/avatar2.jpg" alt="Avatar" class="img-circle">
			</a>
		</div>
		<!-- END Mini Profile -->

		<!-- Sidebar Tabs -->
		<div class="sidebar-tabs-con">
			<ul class="sidebar-tabs" data-toggle="tabs">
				<li class="active">
					<a href="#side-tab-menu"><i class="glyphicon-list"></i></a>
				</li>
				<li>
					<a href="#side-tab-extra"><i class="glyphicon-user"></i></a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="side-tab-menu">
					<!-- Primary Navigation -->
					<nav id="primary-nav">
						<ul>
							<li>
								<a href="index.html" class=" active"><i class="glyphicon-display"></i>Dashboard</a>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-vector_path_curve"></i>User Interface</a>
								<ul>
									<li>
										<a href="page_ui_blocks.html">Blocks</a>
									</li>
									<li>
										<a href="page_ui_grid.html">Grid</a>
									</li>
									<li>
										<a href="page_ui_typography.html">Typography</a>
									</li>
									<li>
										<a href="page_ui_navigation.html">Navigation</a>
									</li>
									<li>
										<a href="page_ui_tabs_accordions.html">Tabs &amp; Accordions</a>
									</li>
									<li>
										<a href="page_ui_buttons_dropdowns.html">Buttons &amp; Dropdowns</a>
									</li>
									<li>
										<a href="page_ui_progress_bars.html">Progress Bars</a>
									</li>
									<li>
										<a href="page_ui_carousel.html">Carousel</a>
									</li>
									<li>
										<a href="page_ui_extras.html">Extras</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-table"></i>Tables</a>
								<ul>
									<li>
										<a href="page_tables_static.html">Static</a>
									</li>
									<li>
										<a href="page_tables_dynamic.html">Dynamic</a>
									</li>
									<li>
										<a href="page_tables_editable.html">Editable</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-more_windows"></i>Forms</a>
								<ul>
									<li>
										<a href="page_forms_general.html">General</a>
									</li>
									<li>
										<a href="page_forms_layouts_styles.html">Layouts &amp; Styles</a>
									</li>
									<li>
										<a href="page_forms_pickers_grid.html">Pickers &amp; Grid</a>
									</li>
									<li>
										<a href="page_forms_textareas_wysiwyg.html">Textareas &amp; WYSIWYG</a>
									</li>
									<li>
										<a href="page_forms_upload_dropzone.html">File Upload &amp; Dropzone</a>
									</li>
									<li>
										<a href="page_forms_validation.html">Validation</a>
									</li>
									<li>
										<a href="page_forms_wizard.html">Wizard</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-fire"></i>Components</a>
								<ul>
									<li>
										<a href="page_comp_inbox.html">Inbox</a>
									</li>
									<li>
										<a href="page_comp_chat.html">Chat</a>
									</li>
									<li>
										<a href="page_comp_timeline.html">Timeline</a>
									</li>
									<li>
										<a href="page_comp_tiles.html">Tiles</a>
									</li>
									<li>
										<a href="page_comp_gallery.html">Gallery</a>
									</li>
									<li>
										<a href="page_comp_charts.html">Charts</a>
									</li>
									<li>
										<a href="page_comp_calendar.html">Calendar</a>
									</li>
									<li>
										<a href="#" class="submenu-link">Maps</a>
										<ul>
											<li>
												<a href="page_comp_vector_maps.html">Vector Maps</a>
											</li>
											<li>
												<a href="page_comp_google_maps.html">Google Maps</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="page_comp_syntax_highlighting.html">Syntax Highlighting</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-pizza"></i>Icon Packs</a>
								<ul>
									<li>
										<a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
									</li>
									<li>
										<a href="page_icons_glyphicons_halflings_pro.html">Glyphicons Halflings Pro</a>
									</li>
									<li>
										<a href="page_icons_fontawesome.html">FontAwesome</a>
									</li>
									<li>
										<a href="page_icons_gemicon.html">Gemicon</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#" class="menu-link"><i class="glyphicon-certificate"></i>Ready UI</a>
								<ul>
									<li>
										<a href="page_ready_search_results.html">Search Results</a>
									</li>
									<li>
										<a href="page_ready_user_profile.html">User Profile</a>
									</li>
									<li>
										<a href="page_ready_pricing_tables.html">Pricing Tables</a>
									</li>
									<li>
										<a href="#" class="submenu-link">e-Shop</a>
										<ul>
											<li>
												<a href="page_ready_product.html">Product</a>
											</li>
											<li>
												<a href="page_ready_products_list.html">Products List</a>
											</li>
											<li>
												<a href="page_ready_shopping_cart.html">Shopping Cart</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="page_ready_invoice.html">Invoice</a>
									</li>
									<li>
										<a href="page_ready_article.html">Article</a>
									</li>
									<li>
										<a href="page_ready_faq.html">FAQ</a>
									</li>
									<li>
										<a href="#" class="submenu-link">Errors</a>
										<ul>
											<li>
												<a href="page_ready_errors.html">In-Page</a>
											</li>
											<li>
												<a href="page_ready_standalone_error.html">Standalone</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="page_ready_blank.html">Blank</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="page_landing.html"><i class="glyphicon-leaf"></i>Landing Page</a>
							</li>
							<li>
								<a href="page_login.html"><i class="glyphicon-power"></i>Login Page</a>
							</li>
						</ul>
					</nav>
					<!-- END Primary Navigation -->
				</div>
				<div class="tab-pane tab-pane-side" id="side-tab-extra">
					<h5><i class="icon-briefcase pull-right"></i>Balance</h5>
					<div class="side-stat text-center text-info"><strong>$25.230,<small>00</small></strong></div>

					<h5><i class="icon-dollar pull-right"></i>Earnings (today)</h5>
					<div class="side-stat text-center text-info"><strong>$1.752,<small>00</small></strong></div>

					<h5><i class="icon-shopping-cart pull-right"></i>Sales (today)</h5>
					<div class="side-stat text-center text-info"><strong>368</strong></div>

					<h5><i class="icon-shopping-cart pull-right"></i>Sales (this month)</h5>
					<div class="side-stat text-center text-success"><strong>+38%</strong></div>

					<h5><i class="icon-ticket pull-right"></i>Open Tickets</h5>
					<div class="side-stat text-center text-warning"><strong>23</strong></div>

					<h5><i class="icon-bug pull-right"></i>Bugs to fix</h5>
					<div class="side-stat text-center text-error"><strong>1</strong> (important)</div>
					<div class="side-stat text-center text-warning"><strong>3</strong> (normal)</div>
				</div>
			</div>
		</div>
		<!-- END Sidebar Tabs -->
	</div>
	<!-- END Wrapper for scrolling functionality -->
</aside>
<!-- END Left Sidebar -->

{*<li class="<?php echo $navigation->admin_current_menu($_back, 'dashboard'); ?>"><a href="<?php echo ADMIN_PATH; ?>dashboard/"><span>Dashboard</span></a></li>
<li class="<?php echo $navigation->admin_current_menu($_back, 'pages'); ?>">
	<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Content</span><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="<?php echo ADMIN_PATH; ?>pages/templates/">Page Templates</a></li>
	</ul>
</li>
<span id="themeColor" class="satgreen" onclick="change_theme('theme-satgreen')"></span>
<?php
if( get( 'logout') )
{
	$var = $encrypt->unlock( get('logout') );
	if(date("Y-m-d") == $var)
	{
		@session_start();
		session_destroy();
		$url = ADMIN_PATH.'/index/';
		redirect($url);
	}
}
?>*}