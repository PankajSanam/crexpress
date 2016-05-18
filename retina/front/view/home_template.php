<div class="maindiv">
	<div class="slider">
		<div id="container">
			<div id="banner-fade">
				<ul class="bjqs">
					<?php foreach($sliders as $slider){ ?>
					<li>
						<?php
						$val = array(
							'src' 	=>	'slider/'.$slider['image'], 
							'width'	=>	360, 
							'title'	=>	$slider['name'],
						);
						echo $html->img( $val, 2 );
						?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="search-box">
		<input type="text" placeholder="search"/>
		<input type="button" value="Submit"/>
	</div>
	<div class="twitter"><a href="http://www.twitter.com/twitter"><?php echo $html->img( array( 'src' => 'twitter-follow.jpg', 'width' => 230, 'height' => 76) ); ?></a></div>
	<div class="facebook"><?php echo $fb_like_box; ?></div>
	<div class="clear"></div>
	<?php echo $left_sidebar; ?>
	<div class="middle-panel">
		<div class="mid-listing"><h1>School, College, Institute Infomation Listing</h1></div>
		<div class="arrow"></div>
		<div class="listing">
			<?php foreach($colleges as $college) { ?>
			<div class="listing-1">
				<div class="listing-image">
					<div class="listing-logo">
						<a href="<?php echo page_url($college['slug']); ?>"><img src="<?php echo DATA_VISION; ?>/colleges/<?php echo $college['featured_image']; ?>" width="91" height="66" /></a>
					</div>
					<div class="listing-no">
						<span><?php echo $html->img( array( 'width' => 14, 'height' => 14, 'src' => 'contact.png' ) ); ?> <?php echo $college['contact_number'];?></span>
					</div>
					<div class="request-info"><input type="button" value="View Detail" onClick="window.location='<?php echo page_url($college['slug']); ?>'"/></div>
				</div>
				<div class="listing-detail">
					<a href="<?php echo page_url($college['slug']); ?>"><?php echo $college['title']; ?></a>
					<p><?php echo $college['address']; ?></p>
					<span><?php echo $sanitize->strip_html($college['content'],200,'...'); ?></span> 
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="paging">
			<div class="pagination">
				<ul>
					<li><a href="?from=0&to=5">Prev</a></li>
					<li style="background:none;"><!-- <span class="current">&nbsp;</span> -->&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li style="background:none;">&nbsp;</li>
					<li><a href="?from=6&to=10">Next</a></li>
				</ul>
			</div>
		</div>
		<div class="who-we-are"><h1>Who We Are</h1></div>
		<div class="arrow"></div>
		<div class="welcome-content">
			<h2><?php echo $page_title; ?></h2>
			<?php echo $page_content; ?>
		</div>
		<div class="clear"></div>
		<?php /*<div class="gallery">
			<div id="amazingcarousel-container-1">
				<div id="amazingcarousel-1" style="display:block;position:relative;width:100%;max-width:720px;margin:0px auto 0px;">
					<div class="amazingcarousel-list-container" style="overflow:hidden;">
						<ul class="amazingcarousel-list">
							<?php foreach($galleries as $gallery) { ?>
							<li class="amazingcarousel-item">
								<div class="amazingcarousel-item-container">
									<div class="amazingcarousel-image">
										<a href="<?php echo DATA_VISION; ?>/gallery/<?php echo $gallery['gallery_image'];?>" class="html5lightbox" data-group="amazingcarousel-1">
										<img height="130" width="100" src="<?php echo DATA_VISION; ?>/gallery/<?php echo $gallery['gallery_image'];?>" /></a>
										<div class="amazingcarousel-text"><div class="amazingcarousel-text-bg"></div></div>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="amazingcarousel-prev"></div>
					<div class="amazingcarousel-next"></div>
					<!--<div class="amazingcarousel-nav"></div>--> 
				</div>
			</div>
		</div> */ ?>
	</div>
	<?php echo $right_sidebar; ?>
</div>