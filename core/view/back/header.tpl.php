<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="author" content="Pankaj Sanam" />
	<?php echo $meta_title; ?>
	<?php echo $styles; ?>
	<?php echo $scripts; ?>

	<!--[if lte IE 9]>
	<?php $html->scripts(array( 'plugins/placeholder/jquery.placeholder.min'), 1); ?>
	<script>
		$(document).ready(function() {
			$('input, textarea').placeholder();
		});
	</script>
	<![endif]-->

	<link rel="shortcut icon" href="<?php echo BACK_VIEW; ?>/img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo BACK_VIEW; ?>/img/apple-touch-icon-precomposed.png" />
	<script type="text/javascript">
		function change_theme(code) {
			var dataString = 'code=' + code;
			$.ajax({
				type: "POST",
				url: "<?php echo SITE_PATH; ?>/content/themes/back/ajax/back_theme_color.php",
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
<?php
$data_theme = '';
$Db = new Db;
if(isset($_SESSION['id'])) {
	$theme_colors = $Db->select('admin', array('id=' => $_SESSION['id']));
	foreach($theme_colors as $theme_color) {

	}
	$color_class = $theme_color['color_theme'];
	$data_theme = $theme_color['color_theme'];
}
global $_back;
if(isset($_SESSION['id'])) { $body_class = ''; } else { $body_class='login'; $color_class= ''; $data_theme = ''; }
?>
<body class="<?php echo $body_class . ' ' . $color_class; ?>" data-theme="<?php echo $data_theme; ?>" id="body" data-layout-sidebar="fixed" data-layout-topbar="fixed">
	<?php if(isset($_SESSION['id'])) { ?>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">CrexPress</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'dashboard'); ?>"><a href="<?php echo ADMIN_PATH; ?>dashboard/"><span>Dashboard</span></a></li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'pages'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Content</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>pages/">Pages</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>pages/templates/">Page Templates</a></li>
						<li><a href="#">Comments</a></li>
					</ul>
				</li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'slider'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Media</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>gallery/">Gallery</a></li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Slider</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo ADMIN_PATH; ?>slider/home/">Home Slider</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>slider/inner/">Page Slider</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>slider/footer/">Footer Slider</a></li>
								<li><a href="<?php echo ADMIN_PATH; ?>slider/other/">Other Slider</a></li>
							</ul>
						</li>
						<li><a href="<?php echo ADMIN_PATH; ?>social/">Social Icons</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>client/">Client Logo</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>software/">Softwares</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>download/">Downloads</a></li>
					</ul>
				</li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'product'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Products</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>product/">Products</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>product/add/">Add Product</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>product/category/add/">Add Product Category</a></li>
					</ul>
				</li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'jobs'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Jobs</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>jobs/">Jobs</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>jobs/add/">Post Job</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>jobs/enquiry/">Job Enquiries</a></li>
					</ul>
				</li>
				 <li class="<?php echo $navigation->admin_current_menu($_back, 'colleges'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Colleges</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>colleges/">Colleges</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>colleges/add/">Add New</a></li>
					</ul>
				</li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'users'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Users</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>users/">Users</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>users/add/">Add User</a></li>
					</ul>
				</li>
				<li class="<?php echo $navigation->admin_current_menu($_back, 'ads'); ?>">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Ads</span><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo ADMIN_PATH; ?>ads/">Ads</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>ads/add/">New Ad</a></li>
					</ul>
				</li>
			</ul>
			<div class="user">
				<ul class="icon-nav">
					<li class='dropdown'>
						<?php
						$Db = new Db;
						$messages = $Db->select('enquiries', array('status=' => 1));
						$total_messages = count($messages);
						?>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred"><?php echo $total_messages; ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
								<?php foreach($messages as $message) { ?>
								<li>
									<a href="messages.html">
										<img src="<?php echo BACK_VIEW; ?>/img/demo/user-2.jpg" alt="">
										<div class="details">
											<div class="name"><?php echo $message['name']; ?></div>
											<div class="message"><?php echo $message['email']; ?></div>
										</div>
										<!-- <div class="count"><i class="icon-comment"></i><span>3</span></div> -->
									</a>
								</li>
								<?php } ?>
							<li>
								<a href="messages.html" class='more-messages'>Go to Message Box <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
					<li class="dropdown sett">
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-cog"></i></a>
						<ul class="dropdown-menu pull-right theme-settings">
							<li>
								<span>Layout-width</span>
								<div class="version-toggle">
									<a href="#" class='set-fixed'>Fixed</a>
									<a href="#" class="active set-fluid">Fluid</a>
								</div>
							</li>
							<li>
								<span>Topbar</span>
								<div class="topbar-toggle">
									<a href="#" class='set-topbar-fixed'>Fixed</a>
									<a href="#" class="active set-topbar-default">Default</a>
								</div>
							</li>
							<li>
								<span>Sidebar</span>
								<div class="sidebar-toggle">
									<a href="#" class='set-sidebar-fixed'>Fixed</a>
									<a href="#" class="active set-sidebar-default">Default</a>
								</div>
							</li>
						</ul>
					</li>
					<li class='dropdown colo'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-tint"></i></a>
						<ul class="dropdown-menu pull-right theme-colors">
							<li class="subtitle">Choose color theme</li>
							<li>
								<span id="themeColor" class='red' onclick="change_theme('theme-red')"></span>
								<span id="themeColor" class='orange' onclick="change_theme('theme-orange')"></span>
								<span id="themeColor" class='green' onclick="change_theme('theme-green')"></span>
								<span id="themeColor" class="brown" onclick="change_theme('theme-brown')"></span>
								<span id="themeColor" class="blue" onclick="change_theme('theme-blue')"></span>
								<span id="themeColor" class='lime' onclick="change_theme('theme-lime')"></span>
								<span id="themeColor" class="teal" onclick="change_theme('theme-teal')"></span>
								<span id="themeColor" class="purple" onclick="change_theme('theme-purple')"></span>
								<span id="themeColor" class="pink" onclick="change_theme('theme-pink')"></span>
								<span id="themeColor" class="magenta" onclick="change_theme('theme-magenta')"></span>
								<span id="themeColor" class="grey" onclick="change_theme('theme-grey')"></span>
								<span id="themeColor" class="darkblue" onclick="change_theme('theme-darkblue')"></span>
								<span id="themeColor" class="lightred" onclick="change_theme('theme-lightred')"></span>
								<span id="themeColor" class="lightgrey" onclick="change_theme('theme-lightgrey')"></span>
								<span id="themeColor" class="satblue" onclick="change_theme('theme-satblue')"></span>
								<span id="themeColor" class="satgreen" onclick="change_theme('theme-satgreen')"></span>
							</li>
						</ul>
					</li>
					<li class='dropdown language-select'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><img src="<?php echo BACK_VIEW; ?>/img/demo/flags/us.gif" alt=""><span>US</span></a>
						<ul class="dropdown-menu pull-right">
							<li><a href="#"><img src="<?php echo BACK_VIEW; ?>/img/demo/flags/br.gif" alt=""><span>Brasil</span></a></li>
							<li><a href="#"><img src="<?php echo BACK_VIEW; ?>/img/demo/flags/de.gif" alt=""><span>Deutschland</span></a></li>
							<li><a href="#"><img src="<?php echo BACK_VIEW; ?>/img/demo/flags/es.gif" alt=""><span>España</span></a></li>
							<li><a href="#"><img src="<?php echo BACK_VIEW; ?>/img/demo/flags/fr.gif" alt=""><span>France</span></a></li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">Admin<img src="<?php echo BACK_VIEW; ?>/img/demo/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="#">Edit profile</a></li>
						<li><a href="#">Account settings</a></li>
						<li><a href="<?php echo ADMIN_PATH; ?>logout/<?php echo $encrypt->lock(date("Y-m-d")); ?>">Sign out</a></li>
					</ul>
				</div>
				<?php
				if( get( 'logout') ) {
					$var = $encrypt->unlock( get('logout') );
					if(date("Y-m-d") == $var) {
						@session_start();
						session_destroy();
						$url = ADMIN_PATH.'/index/';
						redirect($url);
					}
				}
				?>
			</div>
		</div>
	</div>

	<div id="modal-user" class="modal hide">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="user-infos">Pankaj Sanam</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span2"><img src="<?php echo BACK_VIEW; ?>/img/demo/user-1.jpg" alt=""></div>
				<div class="span10">
					<dl class="dl-horizontal" style="margin-top:0;">
						<dt>Full name:</dt>
						<dd>Pankaj Sanam</dd>
						<dt>Email:</dt>
						<dd>pankaj@crexo.com</dd>
						<dt>Address:</dt>
						<dd>
							<address>
								<strong>Crexo.com</strong><br/>
								24-A, Shanti Nagar, DCM<br/>
								Ajmer Road, Jaipur, 302019<br/>
								<abbr title="Phone">P:</abbr>(902) 455-1674
							</address>
						</dd>
						<dt>Social:</dt>
						<dd>
							<a href="http://www.facebook.com/" class='btn'><i class="icon-facebook"></i></a>
							<a href="http://www.twitter.com/" class='btn'><i class="icon-twitter"></i></a>
							<a href="http://www.linkedin.com" class='btn'><i class="icon-linkedin"></i></a>
							<a href="#" class='btn'><i class="icon-envelope"></i></a>
							<a href="#" class='btn'><i class="icon-rss"></i></a>
							<a href="#" class='btn'><i class="icon-github"></i></a>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
	</div>
	<div class="container-fluid" id="content">
		<div id="left" class='force-full no-resize'>
			<div class='search-form'><div class="search-pane"><marquee>Please make sure to check your messages.</marquee></div></div>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Quick stats</span></a>
				</div>
				<div class="subnav-content">
					<ul class="quickstats">
						<li><span class="value">412</span><span class="name">User</span></li>
						<li><span class="value">52</span><span class="name">Products</span></li>
						<li><span class="value">951</span><span class="name">Purchases</span></li>
						<li><span class="value">62</span><span class="name">Clicks</span></li>
					</ul>
				</div>
			</div>
			<div class="subnav">
				<div class="subnav-title"><a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Progress</span></a></div>
				<div class="subnav-content">
					<div class="pagestats bar">
						<span>Diskspace usage:</span><div class="progress small"><div class="bar" style="width:40%"></div></div>
					</div>
					<div class="pagestats bar">
						<span>Traffic bandwidth:</span><div class="progress small"><div class="bar bar-lightred" style="width:80%"></div></div>
					</div>
					<div class="pagestats bar">
						<span>Resources used:</span><div class="progress small"><div class="bar bar-green" style="width:20%"></div></div>
					</div>
				</div>
			</div>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Calendar</span></a>
				</div>
				<div class="subnav-content less"><div class="jq-datepicker"></div></div>
			</div>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Userlist</span></a>
				</div>
				<!-- <div class="subnav-content">
					<ul class="userlist">
						<li>
							<a href="#"><img src="img/demo/user-1.jpg" alt=""></a>
							<div class="user">
								<span class="name">Jane Doe</span>
								<span class="position">Team manager</span>
							</div>
							<div class="status active"><i class="icon-circle"></i></div>
						</li>
						<li>
							<a href="#"><img src="img/demo/user-2.jpg" alt=""></a>
							<div class="user">
								<span class="name">John Doe</span>
								<span class="position">Webdesign</span>
							</div>
							<div class="status"><i class="icon-circle"></i></div>
						</li>
						<li>
							<a href="#"><img src="img/demo/user-3.jpg" alt=""></a>
							<div class="user">
								<span class="name">John Doe</span>
								<span class="position">UI Design</span>
							</div>
							<div class="status afk"><i class="icon-circle"></i></div>
						</li>
					</ul>
				</div> -->
			</div>
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left"><h1><?php echo $controller; ?></h1></div>
					<div class="pull-right">
						<ul class="minitiles">
							<li class='grey'><a href="<?php echo ADMIN_PATH; ?>settings/"><i class="icon-cogs"></i></a></li>
							<li class='lightgrey'><a href="<?php echo SITE_PATH; ?>" target="_blank"><i class="icon-globe"></i></a></li>
						</ul>
						<ul class="stats">
							<li class='satgreen'>
								<i class="icon-money"></i>
								<div class="details"><span class="big">$0</span><span>Balance</span></div>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details"><span class="big"><?php echo date('F d, Y'); ?></span><span><?php echo date('l, g:i A'); ?></span></div>
							</li>
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo ADMIN_PATH; ?>dashboard/">Home</a><i class="icon-angle-right"></i></li>
						<?php echo $breadcrumb; ?>
					</ul>
					<div class="close-bread"><a href="#"><i class="icon-remove"></i></a></div>
				</div>
	<?php } ?>