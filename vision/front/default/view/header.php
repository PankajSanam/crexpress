<?php echo $doc_type; ?>
<html <?php echo $lang; ?>>
<head>
	<?php echo $content_type; ?>
	
	<?php echo $meta_title; ?>
	<?php echo $meta_description; ?>
	<?php echo $meta_keywords; ?>
	
	<?php echo $author; ?>
	<?php echo $revisit; ?>
	<?php echo $google_webmaster; ?>
	
	<?php echo $styles; ?>

	<?php echo $scripts; ?>
</head>
<body>
<div id="bg">
	<div id="wrapper_sec">
		<div id="masterhead">
			<div class="logo">
				<a href="<?php echo SITE_ROOT; ?>">
					<?php echo $html->img( array( 'src' => 'logo.png', 'width' => 300 ) ); ?>
				</a>
			</div>
			<div class="topright_sec">
				<div class="topnavigation">
               		<ul>
                  		<li class="first">&nbsp;</li>
                    	<li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    	<li><a class="nobg" href="#"><?php echo $html->img('rss.gif');?></a></li>
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
                    	<li class="first"><a class="<?php echo $navigation->current_menu($page_slug); ?>" href="<?php echo SITE_ROOT; ?>">Home</a></li>
	                    <?php
	                    $top_menus = $navigation->top_menus();
						foreach($top_menus as $top_menu){
						?>
						<li>
							<a href="<?php echo $page->link($top_menu['slug']); ?>" class="<?php echo $navigation->current_menu($page_slug,$top_menu['slug']) ?>"><?php echo $top_menu['menu_name']; ?></a>
							<?php
							$top_submenus = $navigation->top_submenus($top_menu['id']);

							if(count($top_submenus) <= 0){
								echo '</li>';
							} else {
							?>
							<ul>
								<?php foreach($top_submenus as $top_submenu){ ?>
								<li>
									<?php
									$submenus = $navigation->submenus($top_submenu['id']);

									if(count($submenus) <= 0)
										$class = '';
									else
										$class = 'class="dropdown"';
									?>
									<a <?php echo $class; ?> href="<?php echo $page->link($top_submenu['slug']); ?>"><?php echo $top_submenu['menu_name']; ?></a>
									<?php
									if(count($submenus) <= 0){
										echo '</li>';
									} else {
									?>
									<ul>
	                                    <?php
										$sub_submenus = $navigation->sub_submenus($top_submenu['id']);
										foreach($sub_submenus as $sub_submenu){
										?>
										<li><a href="<?php echo $page->link($sub_submenu['slug']); ?>"><?php echo $sub_submenu['menu_name']; ?></a></li>
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
				<?php foreach($latest_page as $updates) ?>
				<span class="news_update">Latest Updates</span>
				<span class="news_date"><em><?php echo $updates['last_updated']; ?>: </em></span>
				<span class="news_des">
					<a href="<?php echo $page->link($updates['slug']); ?>" title="<?php echo $updates['title']; ?>" class="colr"><?php echo $updates['title']; ?></a>
				</span> 
				<a class="next" href="<?php echo $page->link($updates['slug']); ?>"><?php echo $html->img('newsarrow.jpg'); ?></a>
			</div>
			<div class="clear"></div>