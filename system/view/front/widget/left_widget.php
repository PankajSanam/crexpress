<div class="left-panel">
	<div class="listing-catgery"><h1>Navigation</h1></div>
	<div class="arrow"></div>
	<div class="listing-menu">
		<ul>
			<?php
			$left_menus = $navigation->left_menus();
			foreach($left_menus as $left_menu){
			?>
			<li><a href="<?php echo page_url($left_menu['slug']); ?>"><?php echo $left_menu['menu_name']; ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<div class="clear"></div>
	<div class="guidebook">
		<?php
		$Db = new Db;
		$ads = $Db->select('ads',array('status=' => 1, 'position=' => 'left'));
		foreach($ads as $ad) { 
			$all_p = explode(',',$ad['pages']);
				foreach($all_p as $all){
					if($page_id == $all) {
		?>
		<a title="<?php echo $ad['title'];?>" href="<?php echo 'http://'.$ad['link']; ?>"><?php echo Html::img('/banners/'.$ad['image'],2); ?></a>
		<?php } else {
				//
			 } } 
		}?>
		<!-- <p><a href="#">2014 India's Best Colleges Guidebook</a></p> -->
	</div>
	<?php /*<div class="clear"></div>
	<div class="testimonials"><h1>Testimonials</h1></div>
	<div class="arrow"></div>
	<div class="testimonials-content">
		<h2>Subodh P.G. College, Jaipur</h2>
		<span>Mr. Subodh CEO</span>
		<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor test link incididunt ut 
		labore et dolore magna aliqua.sed do eiusmod tempor test link incididunt ut labore et dolore magna aliqua. 
		Test link incididunt ut labore et dolore magna aliqu amagna aliqua."<a href="#">[...]</a></p>
	</div>
	<div class="clear"></div>
	<div class="programs">
		<h2>Find Gradudate Programs</h2>
		<span><?php echo $html->img('logo-icon.png'); ?><label>Websites name or logo</label></span>
		<p>MA, MS, MBA and Other Master's Degrees; Ph.D. and Other Doctoral Degrees; AACSB-Accredited Business Schools; 
		MEd and Other Master's Programs for Teachers; Learn More at www.ourwebsiteurl.com!<a href="#">[...]</a></p>
	</div> */ ?>
</div>