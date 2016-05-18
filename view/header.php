<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $meta_title; ?></title>
	<meta name="description" content="<?php echo $meta_description; ?>" />
	<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
	<meta name="revisit-after" content="2 days" />
	<meta name="author" content="Pankaj Sanam" />
	
	<!-- Stylesheet -->
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.4.css" media="screen" />
	
	<!-- Javascript -->
	<script src="./js/jquery.min.js" type="text/javascript"></script>
	<script src="./js/ddsmoothmenu.js" type="text/javascript"></script>
	<script src="./js/contentslider.js" type="text/javascript"></script>
	<script type="text/javascript" src="./js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="./js/jquery.easing.1.1.js"></script>
	<script type="text/javascript" src="./js/cufon-yui.js"></script>
	<script type="text/javascript" src="./js/DIN_500.font.js"></script>
	<script type="text/javascript" src="./js/menu.js"></script>
	<script type="text/javascript" src="./js/tabs.js"></script>
	<script type="text/javascript" src="./js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./js/jquery.fancybox-1.3.4.pack.js"></script>
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
                        	<li><input name="txt" value="Search you any keyword" onfocus="if(this.value=='Search you any keyword') {this.value='';}" onblur="if(this.value=='') {this.value='Search you any keyword';}" type="text" /></li>
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