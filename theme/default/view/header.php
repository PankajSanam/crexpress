<?php echo Html::doc_type(); ?>
<html <?php echo Html::lang(); ?>>
<head>
	<?php echo Html::content_type(); ?>
	<?php echo Html::meta_title($page); ?>
	<?php echo Html::meta_description($page); ?>
	<?php echo Html::meta_keywords($page); ?>
	<?php echo Html::author(); ?>
	<?php echo Html::revisit(); ?>
	<?php echo Html::google_webmaster('XVMhOtez7yO_68PWdI2EnLd3mVMFv7q-42-c71AlbYE'); ?>
	
	<?php
	Html::styles(array(
		'style' => ''
	));
	?>
	
	<?php
	Html::scripts(array(
		'jquery.min',
		'ddsmoothmenu',
		'contentslider',
		'jcarousellite_1.0.1',
		'jquery.easing.1.1',
		'cufon-yui',
		'DIN_500.font',
		'menu',
		'tabs',
		'jquery.mousewheel-3.0.4.pack',
		'jquery.fancybox-1.3.4.pack',
	));
	?>
</head>
<body>
<div id="bg">
	<div id="wrapper_sec">
		<div id="masterhead">
			<div class="logo"><a href="./"><?php echo Html::img( array( 'src' => 'logo.png', 'width' => 300 ) ); ?></a></div>
			<div class="topright_sec">
				<div class="topnavigation">
               		<ul>
                  		<li class="first">&nbsp;</li>
                    	<li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    	<li><a class="nobg" href="#"><?php echo Html::img('rss.gif');?></a></li>
                    	<li class="last">&nbsp;</li>
                    </ul>
				</div>
                <div class="clear"></div>
               	<div class="top_search">
                	<div class="advance_search"><a href="#"></a></div>
                		<form method="GET">
	                    	<ul>
	                        	<li><input name="search" placeholder="Search here..." type="text" /></li>
	                            <li><input type="submit" value="Search" class="search"></li>
	                     	</ul>
	                    </form>
                	</div>
                    <div class="clear"> </div>
              	</div>
                <div class="clear"></div>
                <div class="navigation">
                    <div id="smoothmenu1" class="ddsmoothmenu">
              	  		<ul>
                        	<li class="first"><a class="<?php if($page_slug == 'index' OR $page_slug=='') echo 'selected'; else echo '';?>" href="./">Home</a></li>
		                    <?php
		                    $cond = array( 
		                    	'status=' => 1, 
		                    	'menu_position=' => 'top', 
		                    	'page_category_id=' => 0,
		                    	'menu_name<>' => '',
		                    	'menu_sort_order<>' => 0,
		                    );
							$query = Db::select('pages',$cond);
							foreach($query as $top_nav){
							?>
							<li>
								<a href="<?php echo Page::link($top_nav['slug']); ?>" class="<?php if($page_slug == $top_nav['slug']) echo 'selected'; else echo '';?>"><?php echo $top_nav['menu_name']; ?></a>
								<?php
								$find_query = Db::select('pages', array( 'menu_name<>' => '', 'status=' => 1, 'page_category_id=' => $top_nav['id']));
								$find_res = Db::count('pages', array( 'menu_name<>' => '', 'status=' => 1, 'page_category_id=' => $top_nav['id']));
								if($find_res <= 0){
									echo '</li>';
								} else {
								?>
								<ul>
                                    <?php
									$cond = array( 
										'page_category_id=' => $top_nav['id'],
										'status=' => 1, 
										'menu_name<>' =>'',
									);
									$query = Db::select('pages',$cond);
									foreach($query as $top_submenu){
									?>
									<li>
										<?php
										$f_query = Db::select('pages', array( 'menu_name<>' => '', 'status=' => 1, 'page_category_id=' => $top_submenu['id']));
										$f_res = Db::count('pages', array( 'menu_name<>' => '', 'status=' => 1, 'page_category_id=' => $top_submenu['id']));

										if($f_res <= 0)
											$class = '';
										else
											$class = 'class="dropdown"';
										?>
										<a <?php echo $class; ?> href="<?php echo Page::link($top_submenu['slug']); ?>"><?php echo $top_submenu['menu_name']; ?></a>
										<?php
										if($f_res <= 0){
											echo '</li>';
										} else {
										?>
										<ul>
		                                    <?php
											$cond = array( 
												'page_category_id=' => $top_submenu['id'],
												'status=' => 1, 
												'menu_name<>' =>'' 
											);
											$query = Db::select('pages',$cond);
											foreach($query as $top_submenu2){
											?>
											<li>
												<a href="<?php echo Page::link($top_submenu2['slug']); ?>"><?php echo $top_submenu2['menu_name']; ?></a>
											</li>
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
           	     	<div class="clear"></div>	
               	</div>    
		    </div>
			<div id="content_section"> 
				<div class="news_updates">
					<?php
					$latest_update = Page::latest_page();
					foreach($latest_update as $updates) { 
						$update_date = $updates['last_updated'];
						$update_news = $updates['title'];
						$update_link = Page::link($updates['slug']);
					}
					?>
					<span class="news_update">Latest Updates</span>
					<span class="news_date"><em><?php echo $update_date; ?>: </em></span>
					<span class="news_des"> <a href="<?php echo $update_link; ?>" title="<?php echo $update_news; ?>" class="colr"><?php echo $update_news; ?></a> </span> 
					<a class="next" href="<?php echo $update_link; ?>"><?php echo Html::img('newsarrow.jpg'); ?></a> 
				</div>
				<div class="clear"></div>