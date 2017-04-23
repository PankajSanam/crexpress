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
			<div class="span3 mid_part_l"> <?php echo $left_widget; ?> </div>
			<div class="span9 mid_part_r">
				<div class="Energy">
					<h1><?php echo $page_title; ?></h1>
					<p><?php echo $page_content; ?></p>
                    <style>
                    .image-set div iframe { width:200px; height:180px;}
                    </style>
					<div class="image-set">
						<?php
						$db = new Db;
						$galleries = $db->select('gallery',array('status=' => 1));
                        
						foreach($galleries as $gallery) {
                        ?>
                            <?php if( $gallery['gallery_category_id'] == 1 && $slug != 'videos.html') { ?>
    						<div style="width:180px; float:left;">
    							<a class="example-image-link" href="<?php echo DATA_VIEW; ?>/gallery/<?php echo $gallery['gallery_image'];?>" data-lightbox="example-set" title="">
    								<img class="example-image" src="<?php echo DATA_VIEW; ?>/gallery/<?php echo $gallery['gallery_image'];?>" alt="" width="150" height="150"/>
    								<span style="margin-left:35px;"><?php echo $gallery['gallery_name']; ?></span>
    							</a>
    						</div>
                            <?php } ?>
                            <?php if( $gallery['gallery_category_id'] == 2 && $slug == 'videos.html') { ?>
        					<div style="width:220px; float:left;">
								<?php echo $gallery['gallery_video']; ?>
								<span style="margin-left:35px;"><?php echo $gallery['gallery_name']; ?></span>
    						</div>
                            <?php } ?>
                            
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>