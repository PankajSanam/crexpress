<div class="container">
	<div class="row-fluid">
		<div class="span12 slider">
			<?php echo Html::img('inner-about-banner.jpg'); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span12 start">
			<div class="span2"> <?php echo Html::img('mai.png'); ?></div>
			<div class="span8 mid_mg">
				<p><?php echo $latest_news; ?></p>
			</div>
			<div class="span2 info"> <a href="<?php echo page_url(17); ?>">View More...</a> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span12 mid_part">
			<div class="span3 mid_part_l">
				<?php echo $left_widget; ?>
			</div>
			<div class="span9 inner-page">
				<div>
					<h1><?php echo $page_title; ?></h1>
					<p>
						<img src="<?php echo SITE_PATH;?>/asset/data/product/<?php echo $product_image; ?>" style="float:left;margin-right:10px;"  width="250" height="250"/>
						<?php if(!empty($pdf)) {?>
						<a href="<?php echo SITE_PATH.'/asset/data/product/'.$pdf; ?>">Download</a>
						<?php } ?>
						<?php echo $page_content; ?>
					</p>
					<div class="clear"></div>
					<div class="tabs">
						<div class="demo_wrapper" id="getfresh_demo_wrapper" style="display: block;">
							<div class="tabs_holder tabs_wrapper skin1 top" style="display: block; overflow: visible; position: relative;">
								<ul class="tabs_header">
									<?php
									$i = 1;
									$count = count($features);

									foreach($features as $feature) { 
										if ( $i == 1 ) $tab = 'first_tab tab_selected'; else $tab = '';
										if ( $i == $count ) $end = 'last_tab'; else $end = '';
									?>
									<li class="tab_header_item <?php echo $tab; ?> <?php echo $end; ?>">
										<span class="header_item_before"></span>
										<a href="#tabs-<?php echo $i; ?>" class="tabs-<?php echo $i; ?>-tab_header"><?php echo $feature['title'];?></a>
										<span class="header_item_after"></span>
									</li>
									<?php $i++; } ?>
								</ul>
								<div class="content_holder">
									<div style="overflow: hidden; position: relative; z-index: 1;" class="content_holder_inner">
										<?php
										$i = 1;
										foreach($features as $feature) { 
											if ( $i == 1 ) $display = 'block'; else $display = 'none';
										?>
										<div id="tabs-<?php echo $i; ?>" class="tab_content" style="display: <?php echo $display; ?>">
											<div class="inner_content">
												<img src="<?php echo SITE_PATH;?>/asset/data/product/<?php echo $feature['image']; ?>" />
												<p><?php echo $feature['content']; ?></p>
											</div>
										</div>
										<?php $i++; } ?>
									</div>
								</div>
								<div style="height: 0px; font-size: 1px; line-height: 1px; clear: both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $footer_scripts; ?>
<script type="text/javascript">
  $('.tabs_holder').skinableTabs({
    effect: 'basic_display',
    skin: 'skin1',
    position: 'top'
  });
</script>