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