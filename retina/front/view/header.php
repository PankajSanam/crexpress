<?php echo $doc_type; ?>
<html <?php echo $lang; ?>>
<head>
	<?php echo $content_type; ?>
	
	<?php echo $meta_title; ?>
	<?php echo $meta_description; ?>
	<?php echo $meta_keywords; ?>
	
	<?php echo $author; ?>
	<?php echo $robots; ?>
	<?php echo $canonical; ?>
	<?php //echo $alexa; ?>
	<?php echo $favicon; ?>
	
	<?php echo $styles; ?>
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 
	<?php echo $scripts; ?>
	
	<script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 716,
            responsive  : true
          });

        });
      </script>
</head>
<body>
<div class="top-bg">
	<div class="maindiv">
		<div class="top-menu">
			<ul>
				<li><a href="<?php echo $home_url; ?>">Home</a></li>
				<li><a href="<?php echo page_url('about'); ?>">About us </a></li>
				<li><a href="<?php echo page_url('services'); ?>">Services</a></li>
				<li><a href="<?php echo page_url('contact'); ?>">Contact us </a></li>
			</ul>
		</div>
		<div class="call-us">Call us now : <?php echo $landline; ?></div>
		<div class="social-icon"><?php echo social_icons(28,28); ?></div>
	</div>
</div>
<div class="clear"></div>
<div class="maindiv">
	<div class="logo"><?php echo $logo; ?></div>
	<div class="top-adbanner">
		<div id="rotator">
			<ul>
				<?php
				$Db = new Db;
				$ads = $Db->select('ads',array('status=' => 1, 'position=' => 'top'),'rand()','asc',1);
				foreach($ads as $ad) { 
				?>
				<li><a title="<?php echo $ad['title'];?>" href="<?php echo 'http://'.$ad['link']; ?>"><?php echo $html->img( array( 'src' => '/banners/'.$ad['image'], 'width' => 468, 'height' => 60),2); ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="nav-bg">
	<div class="maindiv">
		<div id='cssmenu' >
			<ul>
				<?php
				$top_menus = $navigation->top_menus();
				foreach($top_menus as $top_menu){
				?>
				<li>
					<a href="<?php echo page_url($top_menu['slug']); ?>" class="<?php echo $navigation->current_menu($page_slug,$top_menu['slug']) ?>"><?php echo $top_menu['menu_name']; ?></a>
					<?php
					$top_submenus = $navigation->top_submenus($top_menu['id']);
					if(count($top_submenus) > 0){
					?>
					<ul>
						<?php foreach($top_submenus as $top_submenu){ ?>
						<li class='has-sub'>
							<?php
							$submenus = $navigation->submenus($top_submenu['id']);
							if(count($submenus) <= 0)
							?>
							<a href="<?php echo page_url($top_submenu['slug']); ?>" class="<?php echo $navigation->current_menu($page_slug,$top_menu['slug']) ?>"><?php echo $top_submenu['menu_name']; ?></a>
							<?php
							if(count($submenus) > 0){
							?>
							<ul>
								<?php
								$sub_submenus = $navigation->sub_submenus($top_submenu['id']);
								foreach($sub_submenus as $sub_submenu){
								?>
								<li><a href="<?php echo page_url($sub_submenu['slug']); ?>" class="<?php echo $navigation->current_menu($page_slug,$top_menu['slug']) ?>"><?php echo $sub_submenu['menu_name']; ?></a></li>
								<?php } //foreach ending loop ?>
							</ul>
							<?php } //ending else part ?>
						</li>
						<?php } ?>
					</ul>
					<?php } ?>
				</li>
				<?php } ?>
			</ul>
		</div>
		<div></div>
	</div>
</div>
<!-- <div class="clear"></div>
<div class="maindiv">
	<div class="news-marque">
		<span>Latest News :</span>
		<marquee behavior="scroll" direction="left" width="849px;" height="26px">
			<a href="#">Lorem ipsum dolor sit amet.</a> 
			<a href="#">Lorem ipsum dolor sit amet.</a>
			<a href="#">Lorem ipsum dolor sit amet.</a>
		</marquee>
	</div>
</div> -->