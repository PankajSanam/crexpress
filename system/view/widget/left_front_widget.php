<div class="mid_count">
	<div class="our"><h1>Our Products</h1></div>
	<ul>
		<?php
		$Db = new Db;
		$products = $Db->select('product',array('parent_id=' => 0, 'status=' => 1),'sort_order','asc');
		foreach($products as $product) { 
		?>
		<li><a href="<?php echo page_url($product['slug']); ?>"><?php echo $product['title'];?></a></li>
		<?php } ?>
	</ul>
</div>
<div class="mid_count">
	<div class="our"><h2><?php echo menu_name(6); ?></h2></div>
	<ul>
		<?php
		$db = new Db;
		$downloads = $db->select('download',array('status=' => 1));
		foreach($downloads as $download) { 
		?>
		<li><a href="<?php echo SITE_PATH; ?>/asset/data/download/<?php echo $download['file'];?>"><?php echo $download['name'];?></a></li>
		<?php } ?>
	</ul>
</div>