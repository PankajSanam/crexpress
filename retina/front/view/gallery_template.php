<div class="slider">
	<div class="inner-slider-right">
		<h1><?php echo $page_title; ?></h1><p><?php echo $page_alt ?></p>
	</div>
	<!-- <div class="inner-slider-left"></div> -->
</div>
</div>
</div>
<div class="maindiv">
	<div class="portfolio-content">
		<p><?php //echo $page_content; ?></p>
		<h2>HTML</h2>
		<?php foreach($html_portfolio as $html_result){ ?>
		<div class="port">
			<img src="<?php echo DATA_VISION; ?>/gallery/thumbnail/<?php echo $html_result['gallery_image'];?>" height="140" width="140" />
			<div class="btn-view">
				<a href='<?php echo DATA_VISION; ?>/gallery/<?php echo $html_result['gallery_image'];?>' class='lightview' 
					data-lightview-group='<?php echo $html_result['gallery_category_id'];?>' 
					data-lightview-title="<?php echo $html_result['gallery_name'];?>" 
					data-lightview-caption="<?php echo $html_result['gallery_description'];?>">
					<?php echo $html->img('btn-view.png'); ?>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="portfolio-content">
		<h2>PHP</h2>
		<?php foreach($php_portfolio as $php_result){ ?>
		<div class="port">
			<img src="<?php echo DATA_VISION; ?>/gallery/thumbnail/<?php echo $php_result['gallery_image'];?>" height="140" width="140" />
			<div class="btn-view">
				<a href='<?php echo DATA_VISION; ?>/gallery/<?php echo $php_result['gallery_image'];?>' class='lightview' 
					data-lightview-group='<?php echo $php_result['gallery_category_id'];?>' 
					data-lightview-title="<?php echo $php_result['gallery_name'];?>" 
					data-lightview-caption="<?php echo $php_result['gallery_description'];?>">
					<?php echo $html->img('btn-view.png'); ?>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="portfolio-content">
		<h2>Wordpress</h2>
		<?php foreach($wordpress_portfolio as $wordpress_result){ ?>
		<div class="port">
			<img src="<?php echo DATA_VISION; ?>/gallery/thumbnail/<?php echo $wordpress_result['gallery_image'];?>" height="140" width="140" />
			<div class="btn-view">
				<a href='<?php echo DATA_VISION; ?>/gallery/<?php echo $wordpress_result['gallery_image'];?>' class='lightview' 
					data-lightview-group='<?php echo $wordpress_result['gallery_category_id'];?>' 
					data-lightview-title="<?php echo $wordpress_result['gallery_name'];?>" 
					data-lightview-caption="<?php echo $wordpress_result['gallery_description'];?>">
					<?php echo $html->img('btn-view.png'); ?>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="portfolio-content">
		<h2>Opencart</h2>
		<?php foreach($opencart_portfolio as $opencart_result){ ?>
		<div class="port">
			<img src="<?php echo DATA_VISION; ?>/gallery/thumbnail/<?php echo $opencart_result['gallery_image'];?>" height="140" width="140" />
			<div class="btn-view">
				<a href='<?php echo DATA_VISION; ?>/gallery/<?php echo $opencart_result['gallery_image'];?>' class='lightview' 
					data-lightview-group='<?php echo $opencart_result['gallery_category_id'];?>' 
					data-lightview-title="<?php echo $opencart_result['gallery_name'];?>" 
					data-lightview-caption="<?php echo $opencart_result['gallery_description'];?>">
					<?php echo $html->img('btn-view.png'); ?>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>