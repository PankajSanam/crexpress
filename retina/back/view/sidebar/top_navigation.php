<?php 
if ( ! function_exists('top_navigation')) {
function top_navigation($encrypt,$navigation) { 
	global $_back;
	ob_start();
?>
<div id="navigation">
	<div class="container-fluid">
		<a href="#" id="brand">GIT BOX</a>
		<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
		<ul class='main-nav'>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'dashboard'); ?>"><a href="dashboard.html"><span>Dashboard</span></a></li>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'pages'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Content</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="pages.html">Pages</a></li>
					<li><a href="pages.html?templates">Page Templates</a></li>
					<li><a href="#">Comments</a></li>
				</ul>
			</li>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'home-slider'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Media</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="gallery.html">Gallery</a></li>
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Slider</a>
						<ul class="dropdown-menu">
							<li><a href="slider.html?home">Home Slider</a></li>
							<li><a href="slider.html?inner">Page Slider</a></li>
							<li><a href="slider.html?footer">Footer Slider</a></li>
							<li><a href="slider.html?other">Other Slider</a></li>
						</ul>
					</li>
					<li><a href="social.html">Social Icons</a></li>
				</ul>
			</li>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'shop'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Shop</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="shop.html">Shop</a></li>
					<li><a href="shop.html?action=add">New Product</a></li>
				</ul>
			</li>
			<?php /*<li class="<?php echo $navigation->admin_current_menu($_back, 'jobs'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Jobs</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="jobs.html">Jobs</a></li>
					<li><a href="jobs.html?action=add">Post Job</a></li>
					<li><a href="jobs.html?p=enquiry">Job Enquiries</a></li>
				</ul>
			</li> */ ?>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'users'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Users</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="users.html">Users</a></li>
					<li><a href="users.html?action=add">Add User</a></li>
				</ul>
			</li>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'colleges'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Colleges</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="colleges.html">Colleges</a></li>
					<li><a href="colleges.html?action=add">Add New</a></li>
				</ul>
			</li>
			<li class="<?php echo $navigation->admin_current_menu($_back, 'ads'); ?>">
				<a href="#" data-toggle="dropdown" class='dropdown-toggle'><span>Ads</span><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="ads.html">Ads</a></li>
					<li><a href="ads.html?action=add">New Ad</a></li>
				</ul>
			</li>
		</ul>
		<div class="user">
			<ul class="icon-nav">
				<li class='dropdown'>
					<?php
					$Db = new Db;
					$messages = $Db->select('enquiries',array('status=' => 1)); 
					$total_messages = count($messages);
					?>
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred"><?php echo $total_messages; ?></span></a>
					<ul class="dropdown-menu pull-right message-ul">
						<?php foreach($messages as $message) { ?>
						<li>
							<a href="messages.html">
								<img src="<?php echo BACK_VISION; ?>/img/demo/user-2.jpg" alt="">
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
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><img src="<?php echo BACK_VISION; ?>/img/demo/flags/us.gif" alt=""><span>US</span></a>
					<ul class="dropdown-menu pull-right">
						<li><a href="#"><img src="<?php echo BACK_VISION; ?>/img/demo/flags/br.gif" alt=""><span>Brasil</span></a></li>
						<li><a href="#"><img src="<?php echo BACK_VISION; ?>/img/demo/flags/de.gif" alt=""><span>Deutschland</span></a></li>
						<li><a href="#"><img src="<?php echo BACK_VISION; ?>/img/demo/flags/es.gif" alt=""><span>España</span></a></li>
						<li><a href="#"><img src="<?php echo BACK_VISION; ?>/img/demo/flags/fr.gif" alt=""><span>France</span></a></li>
					</ul>
				</li>
			</ul>
			<div class="dropdown">
				<a href="#" class='dropdown-toggle' data-toggle="dropdown">Admin<img src="<?php echo BACK_VISION; ?>/img/demo/user-avatar.jpg" alt=""></a>
				<ul class="dropdown-menu pull-right">
					<li><a href="user-profile.html">Edit profile</a></li>
					<li><a href="account-settings.html">Account settings</a></li>
					<li><a href="?logout=<?php echo $encrypt->lock(date("Y-m-d"));?>">Sign out</a></li>
				</ul>
			</div>
			<?php
			if(isset($_GET['logout'])){
				$var = $encrypt->unlock($_GET['logout']);
				if(date("Y-m-d") == $var){
					@session_start();
					session_destroy();
					redirect('index.html');
				}
			}
			?>
		</div>
	</div>
</div>
<?php 
$content = ob_get_contents();
ob_end_clean();
return $content;
	}  
} ?>