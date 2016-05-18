<?php echo $doctype; ?>
<html <?php echo $html;?>>
<head>
	<?php echo $content_type; ?>
	<?php echo $meta_title; ?>
	<?php echo $meta_description; ?>
	<?php echo $meta_keywords; ?>
	<?php echo $author; ?>
	<?php echo $revisit_after; ?>
	
	<?php
	stylesheets(array(
		'style' => '',
		'ddsmoothmenu' => '',
		'jquery.fancybox-1.3.4' => 'screen'
	));
	?>
	
	<?php
	javascripts(array(
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
			<div class="logo"><a href="./"><img src="./images/logo.png" width="300" /></a></div>
			<div class="topright_sec">
				<div class="topnavigation">
               		<ul>
                  		<li class="first">&nbsp;</li>
                    	<li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    	<li><a class="nobg" href="#"><img src="./images/rss.gif" alt="" /></a></li>
                    	<li class="last">&nbsp;</li>
                    </ul>
				</div>
                <div class="clear"></div>
               	<div class="top_search">
                	<div class="advance_search"><a href="#"></a></div>
                    	<ul>
                        	<li><input name="txt" value="Search here" onfocus="if(this.value=='Search here') {this.value='';}" onblur="if(this.value=='') {this.value='Search here';}" type="text" /></li>
                            <li><a class="search" href="#">Search</a></li>
                     	</ul>
                	</div>
                    <div class="clear"> </div>       	
              	</div>
                <div class="clear"></div>
                <div class="navigation">
                    <div id="smoothmenu1" class="ddsmoothmenu">
              	  		<ul>
                        	<li class="first"><a class="selected" href="./">Home</a></li>
		                    <?php
							$top_navigation = get_top_navigation();
							foreach($top_navigation as $top_nav){
							?>
							<li>
								<a href="<?php echo $top_nav['page_slug']; ?>.html"><?php echo $top_nav['menu_name']; ?></a>
								<?php
								$find_query = mysql_query("select *from pages where menu_name<>'' AND status='1' AND page_category_id = '".$top_nav['id']."'") or die(db_error());
								$find_res = mysql_num_rows($find_query);
								if($find_res <= 0){
									echo '</li>';
								} else {
								?>
								<ul>
                                    <?php
									$top_submenus = get_top_submenus($top_nav['id']);
									foreach($top_submenus as $top_submenu){
									?>
									<li>
										<?php
										$f_query = mysql_query("select *from pages where menu_name<>'' AND status='1' AND page_category_id = '".$top_submenu['id']."'") or die(db_error());
										$f_res = mysql_num_rows($f_query);

										if($f_res <= 0){
											$class = '';
										} else {
											$class = 'class="dropdown"';
										}
										?>
										<a <?php echo $class; ?> href="<?php echo $top_submenu['page_slug']; ?>.html"><?php echo $top_submenu['menu_name']; ?></a>
										<?php
										if($f_res <= 0){
											echo '</li>';
										} else {
										?>
										<ul>
		                                    <?php
											$top_submenus2 = get_top_submenus($top_submenu['id']);
											foreach($top_submenus2 as $top_submenu2){
											?>
											<li>
												<a href="<?php echo $top_submenu2['page_slug']; ?>.html"><?php echo $top_submenu2['menu_name']; ?></a>
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
					$latest_update = get_latest_update();
					foreach($latest_update as $updates) { 
						$update_date = $updates['last_updated'];
						$update_news = $updates['page_name'];
						$update_link = get_page_link($updates['page_slug']);
					}
					?>
					<span class="news_update">Latest Updates</span>
					<span class="news_date"><em><?php echo $update_date; ?>: </em></span>
					<span class="news_des"> <a href="<?php echo $update_link; ?>" title="<?php echo $update_news; ?>" class="colr"><?php echo $update_news; ?></a> </span> 
					<a class="next" href="<?php echo $update_link; ?>"><img src="./images/newsarrow.jpg" alt="" /></a> 
				</div>
				<div class="clear"></div>