<div id="main">
	<div id="primary">
		<div class="demo-title"> </div>
		<div class="demo-slider">
			<div id="amazingcarousel-container-1">
				<div id="amazingcarousel-1" style="display:block;position:relative;width:100%;max-width:720px;margin:0px auto 0px;">
					<div class="amazingcarousel-list-container" style="overflow:hidden;">
						<ul class="amazingcarousel-list">
							<?php
							$db = new Db;
							$galleries = $db->select('gallery',array('status=' => 1));
							foreach($galleries as $gallery) { 
							?>
							<li class="amazingcarousel-item">
								<div class="amazingcarousel-item-container">
									<div class="amazingcarousel-image">
										<a href="<?php echo DATA_VIEW; ?>/gallery/<?php echo $gallery['gallery_image'];?>" class="html5lightbox" data-group="amazingcarousel-1">
											<img height="130" width="100" src="<?php echo DATA_VIEW; ?>/gallery/<?php echo $gallery['gallery_image'];?>" />
										</a>
										<div class="amazingcarousel-text">
											<div class="amazingcarousel-text-bg"></div>
											<div class="amazingcarousel-title">Sakura Trees</div>
										</div>
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
		</div>
	</div>
</div>