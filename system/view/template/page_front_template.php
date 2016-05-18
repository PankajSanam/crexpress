<div class="container">
	<div class="row-fluid">
		<div class="span12 slider"> 
			<img src="<?php echo SITE_PATH;?>/asset/data/pages/<?php echo $inner_slider; ?>" width="999" height="222" /> 
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
			<div class="span3 mid_part_l"> <?php echo $left_widget; ?> </div>
			<div class="span9 mid_part_r">
				<div class="Energy">
					<h1><?php echo $page_title; ?></h1>
					<p><?php echo $page_content; ?></p>
					<?php echo Html::img('mid_bg.png'); ?> 
				</div>
			</div>
		</div>
	</div>
</div>