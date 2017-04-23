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