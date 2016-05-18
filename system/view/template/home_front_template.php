<div class="container">
	<div class="row-fluid">
		<div class="span12 slider"> 
			<div id="banner-fade" style="margin-bottom:0px;"> 
				<ul class="bjqs">
					<?php foreach($sliders as $slider){ ?>
					<li>
						<?php
						$val = array(
							'src' 	=>	'slider/'.$slider['image'], 
							'width'	=>	360, 
							'title'	=>	$slider['name'],
						);
						echo Html::img( $val, 2 );
						?>
					</li>
					<?php } ?>
				</ul>
			</div>
			<script class="secret-source">
			jQuery(document).ready(function($) {
				$('#banner-fade').bjqs({
					height      : 320,
					width       : 1000,
					responsive  : true
				});
			});
			</script> 
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
					<p><?php echo substr($page_content,0,730); ?></p>
					<a href="<?php echo page_url(1);?>">READ MORE...</a> <?php echo Html::img('mid_bg.png'); ?> 
				</div>
				<div class="feature">
					<div class="our"><h1><?php echo menu_name(7);?></h1></div>
					<div class="row-fluid">
						<div class="span12 box13 feature_pro"> <?php echo $right_widget; ?> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span12 mid_end">
			<div class="mid_head">
				<ul>
					<li id="f">Clients</li>
					<!--<li id="m"><a href="#">Case Studies</a></li>
					<li id="l"><a href="#">Events and News</a></li>-->
				</ul>
			</div>
			<div class="mid_foot feature_pro">
				<ul>
					<?php
					$Db = new Db;
					$client_logos = $Db->select('client', array('status=' => 1) );
					foreach($client_logos as $cl) {  
					?>
					<li><img src="<?php echo SITE_PATH;?>/asset/data/client/<?php echo $cl['image']; ?>" width="140" height="80" /></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>