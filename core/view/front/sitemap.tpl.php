<div class="maindiv">
	<?php //echo $left_widget; ?>
	<div class="middle-panel">
		<?php /* <div class="inner-banner"><?php echo $html->img('about-img.jpg'); ?></div> */ ?>
		<div class="inner-head"><h1><?php echo $page_title; ?></h1></div>
		<div class="arrow"></div>
		<div class="inner-page">
			<div class="inner-page-1">
				<div class="college-details-page">
					<?php echo $page_content; ?>
					<ul class="sitemap">
						<?php foreach($pages as $page) { ?>
						<li>
							<a href="<?php echo page_url($page['slug']); ?>" title="<?php echo $page['meta_title'];?>">
							<?php echo $page['title'];?> - <?php echo $page['meta_title']; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php echo $right_widget; ?>
</div>