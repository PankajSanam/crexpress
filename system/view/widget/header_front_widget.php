<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php echo $meta_title; ?>
	<?php echo $meta_description; ?>
	<?php echo $meta_keywords; ?>
	
	<meta name="author" content="Pankaj Sanam" />
	<meta name="robots" content="index, follow" />
	<link rel="canonical" href="<?php echo SITE_PATH ?>" />
	<link rel="shortcut icon" href="<?php echo IMAGES ?>favicon.png" type="image/png" />
	<?php echo $styles; ?>
	<?php echo $scripts; ?>
	<style> .slider > a { background: url("<?php echo IMAGES; ?>active.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0); margin-left: 45px; padding: 93px 56px; text-decoration: none; } </style>
</head>
<body>
	<div class="container">
		<div class="row-fluid">
			<div class="span12 header">
				<div class="span3 logo"> <a href="<?php echo SITE_PATH;?>"><?php echo Html::img('logo.png'); ?></a> </div>
				<div class="span9 menu">
					<div class="row-fluid">
						<div class="span12 menu1">				
							<div class="span6 menu_l">
								<p>Approved by</p>
								<ul>
									<li><a href="#">ISI 9001:2008 </a></li>
									<li><a href="#"><img src="<?php echo IMAGES; ?>iso_mark.png" /></a></li>
									<li><a href="#">ISI 14001: 2004</a></li>
								</ul>
							</div>
							<div class="span6 menu_r">
								<?php echo $social->icons(24,24); ?>
								<div class="control-group">
									<div class="controls">
										<div class="input-append Search_go">
											<input id="appendedtext" name="appendedtext" class="input-medium" placeholder="Search" type="text" />
											<span class="add-on gone"><a href="#">Go!</a></span> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main_menu">
		<div class="container">
			<div class="row-fluid">
				<div class="span12 main_menu1">
					<ul id="menu">
						<li><span><a href="<?php echo page_url('index');?>"><?php echo menu_name(9); ?></a></span></li>
						<li><span><a href="<?php echo page_url('about');?>"><?php echo menu_name(1); ?></a></span></li>
						<li>
							<span><a href="<?php echo page_url('our-products'); ?>">Our Products</a></span>
							<ul>
                                <?php
    							$Db = new Db;
								$produc = $Db->select('product',array('parent_id=' => 0, 'is_product=' => 0, 'status=' => 1),'sort_order','asc');
								foreach($produc as $produ) { 
								?>
    							<li class='has-sub'>
									<?php
                                	$Db = new Db;
                            		$submenus = $Db->select('product',array('parent_id=' => $produ['product_id'], 'is_product=' => 0, 'status=' => 1),'sort_order','asc');
									if(count($submenus) <= 0)
									?>
									<span><a href="<?php echo page_url($produ['slug']);?>"><?php echo $produ['title'];?></a></span>
									<?php
									if(count($submenus) > 0){
									?>
									<ul>
										<?php
                                    	$Db = new Db;
                                        $sub_submenus = $Db->select('product',array('parent_id=' => $produ['product_id'], 'is_product=' => 0, 'status=' => 1),'sort_order','asc');
										foreach($sub_submenus as $sub_submenu){
										?>
										<li><span><a href="<?php echo page_url($sub_submenu['slug']); ?>"><?php echo $sub_submenu['title']; ?></a></span></li>
										<?php } ?>
									</ul>
									<?php } ?>
								</li>
								<?php } ?>
							</ul>
						</li>
						<?php
						$top_menus = $navigation->top_menus();
						foreach($top_menus as $top_menu){
						?>
						<li>
							<span><a href="<?php echo page_url($top_menu['slug']); ?>" class="<?php echo $navigation->current_menu($slug,$top_menu['slug']) ?>"><?php echo $top_menu['menu_name']; ?></a></span>
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
									<span><a href="<?php echo page_url($top_submenu['slug']); ?>" class="<?php echo $navigation->current_menu($slug,$top_menu['slug']) ?>"><?php echo $top_submenu['menu_name']; ?></a></span>
									<?php
									if(count($submenus) > 0){
									?>
									<ul>
										<?php
										$sub_submenus = $navigation->sub_submenus($top_submenu['id']);
										foreach($sub_submenus as $sub_submenu){
										?>
										<li><span><a href="<?php echo page_url($sub_submenu['slug']); ?>" class="<?php echo $navigation->current_menu($slug,$top_menu['slug']) ?>"><?php echo $sub_submenu['menu_name']; ?></a></span></li>
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
					<select onchange="redirect()" id="drop">
						<option selected="selected" value="">Go to...</option>
						<option value="#" title="Welcome to Magento Expert">HOME</option>
						<option value="#" title="About Magento Expert">ABOUT US</option>
						<option value="#" title="Services - Magento Expert">SERVICES</option>
						<option value="#" title="Portfolio - Magento Expert">PORTFOLIO</option>
						<option value="#" title="Contact Information - Magento Expert">CONTACT</option>
					</select>
				</div>
			</div>
		</div>
	</div>
