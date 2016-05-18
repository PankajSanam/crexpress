<?php function left_sidebar() { ?>
<div id="left">
	<form action="search-results.html" method="GET" class='search-form'>
		<div class="search-pane">
			<input type="text" name="search" placeholder="Search here...">
			<button type="submit"><i class="icon-search"></i></button>
		</div>
	</form>
	<div class="subnav">
		<div class="subnav-title"><a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Content</span></a></div>
		<ul class="subnav-menu">
			<li class='dropdown'>
				<a href="pages.php" data-toggle="dropdown">Pages</a>
				<ul class="dropdown-menu">
					<li><a href="pages.php">All Pages</a></li>
					<li><a href="pages-new.php">Add New</a></li>
				</ul>
			</li>
			<li><a href="page-templates.php">Templates</a></li>
			<li><a href="#">Comments</a></li>
		</ul>
	</div>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Media</span></a>
		</div>
		<ul class="subnav-menu">
			<li><a href="file-manager.php">File Manager</a></li>
			<li class='dropdown'>
				<a href="#" data-toggle="dropdown">Slider</a>
				<ul class="dropdown-menu">
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Home Slider</a>
						<ul class="dropdown-menu">
							<li><a href="home-slider.php">Home Slider</a></li>
							<li><a href="manage-slider.php">Add Slider</a></li>
						</ul>
					</li>
					<li><a href="#">Pages Slider</a></li>
					<li><a href="#">Footer Slider</a></li>
					<li><a href="#">Other Slider</a></li>
				</ul>
			</li>
			<li><a href="#">Site Logo</a></li>
			<li class='dropdown'>
				<a href="#" data-toggle="dropdown">Gallery</a>
				<ul class="dropdown-menu">
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Photo Gallery</a>
						<ul class="dropdown-menu">
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="manage-gallery.php">Add Gallery</a></li>
						</ul>
					</li>
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Video Gallery</a>
						<ul class="dropdown-menu">
							<li><a href="video-gallery.php">Gallery</a></li>
							<li><a href="manage-video-gallery.php">Add Gallery</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="subnav">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Settings</span></a>
		</div>
		<ul class="subnav-menu">
			<li><a href="social-icons.php">Social Icons</a></li>
			<li class='dropdown'>
				<a href="#" data-toggle="dropdown">Page settings</a>
				<ul class="dropdown-menu">
					<li><a href="#">Action #1</a></li>
					<li><a href="#">Antoher Link</a></li>
					<li class='dropdown-submenu'>
						<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
						<ul class="dropdown-menu">
							<li><a href="#">This is level 3</a></li>
							<li><a href="#">Unlimited levels</a></li>
							<li><a href="#">Easy to use</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="subnav subnav-hidden">
		<div class="subnav-title">
			<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Packages</span></a>
		</div>
		<ul class="subnav-menu">
			<li><a href="packages.php">All Packages</a></li>
			<li><a href="manage-package.php">Install Package</a></li>
		</ul>
	</div>
</div>
<?php } ?>