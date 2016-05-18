<div class="slider-bg" style="height:100px;"></div>
<div class="maindiv">
	<div class="shop-cat">
		<h1><?php echo $page_title; ?></h1>
		<?php foreach($categories as $category) { ?>
		<div class="cat-box">
			<div class="cat-image">
				<img src="<?php echo DATA_VISION; ?>/shop/<?php echo $category['image'];?>" width="140" height="120" />
				<div class="cat-inquiry"><a href="<?php echo page_url('contact-us'); ?>">Inquiry Now</a></div>
			</div>

			<div class="cat-desc">
				<div class="cat-title"><a href="#"><?php echo $category['title'];?></a></div>
				<div class="cat-price">Rs. <?php echo $category['price'];?></div>
				<div class="cat-content"><?php echo $category['content'];?></div>
			</div>
		</div>
		<div class="center-img"><?php echo $html->img('menu-img.png'); ?></div>
		<?php } ?>
	</div>
</div>