<div class="container">
	<div class="row-fluid">
		<div class="span12 slider"> 
			<img src="<?php echo SITE_PATH;?>/asset/data/slider/<?php echo $inner_slider; ?>" /> 
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
			<div class="span9 inner-page">
				<div>
					<h1><?php echo $page_title; ?></h1>
					<p><?php echo $page_content; ?></p>
					<div class="software">
						<?php
						$Db = new Db;
						$software_list = $Db->select('download',array('status=' => 1));
						foreach($software_list as $soft) { 
						?>
						<h1><?php echo $soft['name']; ?></h1>
						<p><?php echo $soft['description']; ?></p>
						<div class="software"><span><a href="asset/data/download/<?php echo $soft['file'];?>" download="<?php echo $soft['file'];?>">Download</a></span></div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>