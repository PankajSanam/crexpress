<div class="clear"></div>
<div class="footer-bg">
	<div class="maindiv">
		<div class="footer-nav">
			<ul>
				<?php
				$bottom_menus = $navigation->bottom_menus();
				foreach($bottom_menus as $bottom_menu){
				?>
				<li><a href="<?php echo page_url($bottom_menu['slug']); ?>"><?php echo $bottom_menu['menu_name']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="call"><span>Call for Free Assistance! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $landline; ?></span></div>
		<div class="copyright"><span><?php echo copyright(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo powered_by(); ?></span></div>
	</div>
</div>

<script src="<?php echo FRONT_VISION; ?>/js/libs/jquery.secret-source.min.js"></script>
<script>
jQuery(function($) {
	$('.secret-source').secretSource({
		includeTag: false
	});
});
</script>
<script type="text/javascript">
$('.tabs_holder').skinableTabs({
	effect: 'basic_display',
	skin: 'skin1',
	position: 'top'
});
</script>
</body>
</html>
<?php /* <?php echo $address; ?>, <?php echo $mobile; ?>E-mail: <?php echo $email; ?>*/ ?>