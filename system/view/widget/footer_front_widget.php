<div class="footer">
	<div class="container">
		<div class="row-fluid">
			<div class="span12 foot">
				<div class="span3 foot1">
					<h5>Support</h5>
					<a href="#"><?php echo Html::img('skype.png'); ?></a>
					<p> Get Skype<br />
						Call our experts for free.<br />
						Timings : 9.30am- 5.00pm
					</p>
				</div>
				<div class="span3 foot1">
					<h5>Our Products</h5>
					<ul>
						<?php
						$Db = new Db;
						$products = $Db->select('product',array('parent_id=' => 0));
						foreach($products as $product) { 
						?>
						<li><a href="<?php echo SITE_PATH; ?>/<?php echo $product['slug'];?>"><?php echo $product['title'];?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="span3 foot1">
					<h5><?php echo menu_name(6); ?></h5>
					<ul>
						<?php
						$db = new Db;
						$downloads = $db->select('pages',array('page_category_id=' => 6));
						foreach($downloads as $download) { 
						?>
						<li><a href="<?php echo page_url(intval($download['id'])); ?>"><?php echo $download['menu_name'];?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="span3 foot1">
					<h5>Quick Links</h5>
					<ul>
						<?php
						$db = new Db;
						$downloads = $db->select('pages',array('page_category_id=' => 0));
						foreach($downloads as $download) { 
						?>
						<li><a href="<?php echo page_url(intval($download['id'])); ?>"><?php echo $download['menu_name'];?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright"> <p><?php echo copyright(); ?> <?php echo designed_by(); ?></p> </div>
</div>
</body>
</html>