<?php /* Smarty version Smarty-3.1.20, created on 2015-01-04 19:20:29
         compiled from "core\view\back\dashboard.tpl.php" */ ?>
<?php /*%%SmartyHeaderCode:1325554a92e1e770ef1-77477073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee7d40f144c3ecc945900679fb8e2d664801af5c' => 
    array (
      0 => 'core\\view\\back\\dashboard.tpl.php',
      1 => 1420379427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1325554a92e1e770ef1-77477073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.20',
  'unifunc' => 'content_54a92e1e7815c5_79480280',
  'variables' => 
  array (
    'back_view' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a92e1e7815c5_79480280')) {function content_54a92e1e7815c5_79480280($_smarty_tpl) {?><!-- Pre Page Content -->
<div id="pre-page-content">
	<h1><i class="glyphicon-dashboard themed-color"></i>Dashboard<br><small>Welcome <strong>Admin</strong>, everything looks good!</small></h1>
</div>
<!-- END Pre Page Content -->

<!-- Page Content -->
<div id="page-content">
	<!-- Dashboard Tiles Block -->
	<div class="block block-tiles block-tiles-animated clearfix">
		<a href="javascript:void(0)" class="tile tile-height-2x tile-themed themed-background-tulip">
			<i class="icon-envelope"></i>
			<div class="tile-info">
				<div class="pull-left">Messages</div>
				<div class="pull-right"><strong>5</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-height-2x tile-themed themed-background-fire">
			<i class="icon-rocket"></i>
			<div class="tile-info">
				<div class="pull-left">Sales</div>
				<div class="pull-right"><strong>50k</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-width-2x tile-height-2x tile-themed themed-background-leaf">
			<i class="icon-flag-checkered"></i>
			<div class="tile-info">
				<div class="pull-left">Profit</div>
				<div class="pull-right"><strong>500k</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-height-2x tile-themed themed-background-city">
			<i class="icon-ticket"></i>
			<div class="tile-info">
				<div class="pull-left">Tickets</div>
				<div class="pull-right"><strong>112</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-height-2x tile-themed themed-background-night">
			<i class="icon-cloud-download"></i>
			<div class="tile-info">
				<div class="pull-left">Downloads</div>
				<div class="pull-right"><strong>1.5m</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-width-2x tile-themed themed-background-amethyst">
			<i class="icon-group"></i>
			<div class="tile-info">
				<div class="pull-left">Users</div>
				<div class="pull-right"><strong>593k</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-themed themed-background-sun">
			<i class="icon-smile"></i>
			<div class="tile-info"><strong>1000</strong> Smiles!</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-themed themed-background-wood">
			<i class="icon-gamepad"></i>
			<div class="tile-info"><strong>75</strong> Video Games</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-themed themed-background-deepsea">
			<i class="icon-facebook"></i>
			<div class="tile-info">
				<div class="pull-left">Likes</div>
				<div class="pull-right"><strong>212k</strong></div>
			</div>
		</a>
		<a href="javascript:void(0)" class="tile tile-themed themed-background-ocean">
			<i class="icon-twitter"></i>
			<div class="tile-info">
				<div class="pull-left">Followers</div>
				<div class="pull-right"><strong>153k</strong></div>
			</div>
		</a>
	</div>
	<!-- END Dashboard Tiles Block -->

	<!-- Live Updates Block -->
	<div class="block block-themed">
		<!-- Live Updates Title -->
		<div class="block-title">
			<h4><i id="dash-timeline-icon" class="icon-spinner icon-spin"></i> App Live</h4>
		</div>
		<!-- END Live Updates Title -->

		<!-- Live Updates Content -->
		<div class="block-content">
			<!-- Timeline Container -->
			<div class="timeline-container">
				<!-- Scrolling -->
				<div class="timeline-scrollable">
					<!-- Timeline -->
					<ul class="timeline">
						<li class="clearfix">
							<i class="timeline-meta-cat icon-comments themed-background-leaf"></i>
							<span class="timeline-meta-time">1 min ago</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/template/avatar.jpg" alt="Avatar" class="timeline-avatar">
							<span class="timeline-title"><a href="page_ready_user_profile.html">John Doe</a> just commented on an <a href="page_ready_article.html">Article</a></span>
							<span class="timeline-text">Hi, I think that it's a great article! Keep it up!</span>
						</li>
						<li>
							<i class="timeline-meta-cat icon-cog themed-background-city"></i>
							<span class="timeline-meta-time">5 min ago</span>
							<span class="timeline-title">System Update</span>
							<span class="timeline-text"><strong>App</strong> updated to 2.0 version! Please check <a href="page_ready_faq.html">FAQ</a> for more info!</span>
						</li>
						<li class="clearfix">
							<i class="timeline-meta-cat icon-comments themed-background-leaf"></i>
							<span class="timeline-meta-time">3 hours ago</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" alt="Avatar" class="timeline-avatar">
							<span class="timeline-title"><a href="page_ready_user_profile.html">Chloe</a> just commented on an <a href="page_ready_product.html">Product</a></span>
							<span class="timeline-text">Its a great product! I highly recommend it!</span>
						</li>
						<li>
							<i class="timeline-meta-cat icon-pencil themed-background-tulip"></i>
							<span class="timeline-meta-time">4 hours ago</span>
							<span class="timeline-title">Page Edited</span>
							<span class="timeline-text"><a href="page_ready_pricing_tables.html">Pricing Tables</a></span>
						</li>
						<li class="clearfix">
							<i class="timeline-meta-cat glyphicon-picture themed-background-wood"></i>
							<span class="timeline-meta-time">1 day ago</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" alt="Avatar" class="timeline-avatar">
							<span class="timeline-title"><a href="page_ready_user_profile.html">Michael</a> just added 1 new photo</span>
							<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" data-toggle="lightbox-image"><img src="img/placeholders/image_160x120_light.png" alt="image"></a>
						</li>
						<li class="clearfix">
							<i class="timeline-meta-cat glyphicon-circle_plus themed-background-diamond"></i>
							<span class="timeline-meta-time">1 day ago</span>
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" alt="Avatar" class="timeline-avatar">
							<span class="timeline-title"><a href="page_ready_user_profile.html">Estelle</a> just added 1 new <a href="page_ready_article.html">Article</a></span>
							<p class="timeline-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
							<p class="timeline-text remove-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
						</li>
					</ul>
					<!-- END Timeline -->
				</div>
				<!-- END Scrolling -->
			</div>
			<!-- END Timeline Container -->
		</div>
		<!-- END Live Updates Content -->
	</div>
	<!-- END Live Updates Block -->

	<!-- div.row-fluid -->
	<div class="row-fluid">
		<!-- Messages and Notifications -->
		<div class="span6">
			<div class="block block-tabs block-themed">
				<div class="block-options">
					<a href="javascript:void(0)" class="btn btn-inverse" data-toggle="tooltip" title="Settings"><i class="icon-cog"></i></a>
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#dashboard-notifications" data-toggle="tooltip" title="Latest Notifications"><i class="icon-bullhorn"></i></a></li>
					<li><a href="#dashboard-messages" data-toggle="tooltip" title="Latest Messages"><i class="icon-envelope"></i></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="dashboard-notifications">
						<div class="scrollable">
							<!-- App Notifications -->
							<h4 class="sub-header"><i class="icon-file"></i> App</h4>
							<div class="alert alert-success">
								<i class="icon-ok"></i> Everything went well! <strong>(2 hours ago)</strong>
							</div>
							<div class="alert alert-info">
								<i class="icon-bullhorn"></i> Info Message! <strong>(12 hours ago)</strong>
							</div>
							<div class="alert">
								<i class="icon-warning-sign"></i> Please pay attention! <strong>(yesterday)</strong>
							</div>
							<div class="alert alert-error">
								<i class="icon-remove-sign"></i> There was an error! <strong>(last month)</strong>
							</div>
							<!-- END App Notifications -->

							<!-- Server Notifications -->
							<h4 class="sub-header"><i class="icon-hdd"></i> Server</h4>
							<div class="alert alert-success">
								<i class="icon-ok"></i> Service restarted! <strong>(1 hour ago)</strong>
							</div>
							<div class="alert alert-info">
								<i class="icon-bullhorn"></i> Apache updated! <strong>(5 hour ago)</strong>
							</div>
							<div class="alert">
								<i class="icon-warning-sign"></i> Please pay attention! <strong>(12 hours ago)</strong>
							</div>
							<div class="alert alert-error">
								<i class="icon-remove-sign"></i> There was an error! <strong>(last week)</strong>
							</div>
							<!-- END Server Notifications -->
						</div>
					</div>
					<div class="tab-pane" id="dashboard-messages">
						<div class="scrollable">
							<!-- Message #1 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">22:43</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #1 -->

							<!-- Message #2 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_light.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">21:00</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #2 -->

							<!-- Message #3 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">20:41</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #3 -->

							<!-- Message #4 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_light.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">17:14</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #4 -->

							<!-- Message #5 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">15:12</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #5 -->

							<!-- Message #6 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_light.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">13:10</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #6 -->

							<!-- Message #7 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">12:05</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #7 -->

							<!-- Message #8 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_light.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">11:00</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #8 -->

							<!-- Message #9 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_dark.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">10:23</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #9 -->

							<!-- Message #10 -->
							<div class="media">
								<a href="javascript:void(0)" class="pull-left" data-toggle="tooltip" title="Username">
									<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_64x64_light.png" class="media-object img-circle" alt="Image">
								</a>
								<div class="media-body">
									<h5 class="media-heading">
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Reply"><i class="icon-reply"></i></a>
										<a href="javascript:void(0)" class="badge badge-neutral" data-toggle="tooltip" title="Archive"><i class="icon-folder-open"></i></a>
										<a href="javascript:void(0)" class="badge badge-important" data-toggle="tooltip" title="Delete"><i class="icon-trash"></i></a>
										<span class="label label-info">May 20, 2013</span>
										<span class="label label-warning">08:35</span>
									</h5>
									<p>This new idea is really awesome! I can't wait till we get started.. <a href="javascript:void(0)" class="badge badge-inverse">Read more</a></p>
								</div>
							</div>
							<!-- END Message #10 -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Messages and Notifications -->

		<!-- Charts & Maps -->
		<div class="span6">
			<div class="block block-tabs block-themed">
				<div class="block-options-left">
					<a href="javascript:void(0)" class="btn btn-inverse" data-toggle="tooltip" title="Settings"><i class="icon-cog"></i></a>
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="pull-right active"><a href="#dashboard-stats" data-toggle="tooltip" title="Quick App Statistics"><i class="icon-bar-chart"></i> Quick Stats</a></li>
					<li class="pull-right"><a href="#dashboard-maps" data-toggle="tooltip" title="A map can be useful"><i class="icon-globe"></i> Map</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="dashboard-stats">
						<div id="dashboard-chart"></div>
					</div>
					<div class="tab-pane" id="dashboard-maps">
						<div id="dashboard-map" class="gmap-con"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Charts & Maps -->
	</div>
	<!-- END div.row-fluid -->

	<!-- Latest Uploaded Projects Block -->
	<div class="block block-themed block-last">
		<!-- Latest Uploaded Projects Title -->
		<div class="block-title">
			<div class="block-options">
				<div class="btn-group">
					<a href="javascript:void(0)" class="btn btn-inverse" data-toggle="tooltip" title="Share on Facebook"><i class="icon-facebook"></i></a>
					<a href="javascript:void(0)" class="btn btn-inverse" data-toggle="tooltip" title="Share on Twitter"><i class="icon-twitter"></i></a>
					<a href="javascript:void(0)" class="btn btn-inverse" data-toggle="tooltip" title="Settings"><i class="icon-cog"></i></a>
					<a href="javascript:void(0)" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown"><i class="icon-angle-down"></i></a>
					<ul class="dropdown-menu pull-right">
						<li class="active"><a href="javascript:void(0)">Today</a></li>
						<li><a href="javascript:void(0)">Yesterday</a></li>
						<li class="divider"></li>
						<li><a href="javascript:void(0)">Web Design</a></li>
						<li><a href="javascript:void(0)">App Design</a></li>
					</ul>
				</div>
			</div>
			<h4><i class="icon-cloud-upload"></i> Latest Uploaded Projects</h4>
		</div>
		<!-- END Latest Uploaded Projects Title -->

		<!-- Latest Uploaded Projects Content -->
		<div class="block-content">
			<div class="gallery" data-toggle="lightbox-gallery">
				<div class="row-fluid row-items">
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" alt="image">
						</a>
					</div>
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" alt="image">
						</a>
					</div>
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" alt="image">
						</a>
					</div>
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" alt="image">
						</a>
					</div>
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_dark.png" alt="image">
						</a>
					</div>
					<div class="span2">
						<a href="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" class="gallery-link">
							<img src="<?php echo $_smarty_tpl->tpl_vars['back_view']->value;?>
img/placeholders/image_720x450_light.png" alt="image">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- END Latest Uploaded Projects Content -->
	</div>
	<!-- END Latest Uploaded Projects Block -->
</div>
<!-- END Page Content --><?php }} ?>
