<div class="col1"> 
	<div id="banner1"> 
		<a href="#"><img src="uploads/slider/page-slider1.jpg" width="704" /></a>
		<div class="heading"><h1>Career Ask</h1></div>
	</div>
	<!-- Content Links 
	<div class="content_links">
		<ul>
			<li><a class="our_university" href="#">Our University</a></li>
			<li><a class="admission" href="#">Admissions</a></li>
			<li><a class="accommodaiton" href="#">Accommodations</a></li>
			<li><a class="community" href="#">Community</a></li>
			<li><a class="schorship" href="#">Scholorships</a></li>
			<li class="last"><a class="take_tour" href="#">Take a Tour</a></li>
		</ul>
	</div>-->
	<!-- Content Heading -->
	<div id="content2"> 
		<div class="blog_detail">
			<div class="bloginfo">
				<h2><?php echo Page::name($page_slug); ?></h2>
				<a href="#"><?php echo Page::featured_image($page_slug,'225','219','blogimg'); ?></a>
				<!--<div class="info info1">
					<span class="postedby">Posted By: <a href="#">Admin</a></span>
					<span class="lastupdte"> Last Update by:<i><?php echo Page::last_updated($page_slug); ?></i></span>
					<span class="comments"><a href="./blogdetail.html"><strong>852</strong> Comments</a></span>
					<div class="share1"><a href="./blogdetail.html">Share</a></div>
				</div>-->
				<div class="clear"></div>
			</div>
			<p><?php echo Page::content($page_slug); ?></p>
			<!--<a href="#" class="link colr">88 Comments</a>-->
		 	</div>
		<div class="clear"></div>
		<?php
		$page_id = Page::id($page_slug);
		$query = Db::select('pages',array('status=' => 1, 'page_category_id=' => $page_id));
		$res = Db::count('pages',array('status=' => 1, 'page_category_id=' => $page_id));

		if($res <= 0){
			echo '';
		} else {
		?>
		<h2 class="pad8"><?php echo Page::name($page_slug); ?></h2>
		<ul class="listing">
			<?php
			foreach($query as $row) {
			?>
			<li>
				<div class="thumb"><a href="<?php echo Page::link($row['slug']); ?>" title="<?php echo $row['title'];?>"><?php echo Page::thumb($row['slug'],'126','106'); ?></a></div>
				<div class="description">
					<h6><a href="<?php echo Page::link($row['slug']); ?>" class="colr" title="<?php echo $row['title'];?>"><?php echo $row['title']; ?></a></h6>
					<p><?php echo Validation::strip_html($row['content'],400,'...'); ?></p>
					<div class="clear"></div>
					<!--<div class="info"> <span class="lastupdte"> Last Update by:<i>Tue, 26/01/11</i></span> <span class="tag">Tag: <a href="#">Business</a></span> <span class="comments"><a href="#"><strong>852</strong> Comments</a></span> <a class="moreinfo" href="#">:: Moreinfo</a> </div>-->
				</div>
				<div class="clear"></div>
			</li>
			<?php
			}
			?>
		</ul>
		<!--<div class="clear"></div>
		<div class="pginaiton pad9">
			<ul>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li class="dots"> . . . . . . .</li>
				<li><a href="#"> 22</a></li>
				<li class="nextpage"><a href="#">Next Page</a></li>
			</ul>
		</div>-->
		<div class="clear"></div>
		<?php } ?>
		<?php /*?><div class="blog_comments">
			<div class="blog_comment1">
				<div class="thumb"> <a href="#"><img src="./images/comment1.jpg" alt="" /></a> </div>
				<div class="description">
					<div class="comment_top">
						<div class="comment_topleft">
							<h5>Peter Morgen</h5>
							<div class="postdate"> <i class="poston">Post On  Tue, 26/01/11</i> <span class="blog_rating blg_rtng1"> <a href="#"><img src="./images/ratings.jpg" alt="" /> 55</a></span> </div>
						</div>
						<div class="comment_topright"> <a class="btn" href="#">Reply</a> </div>
					</div>
					<div class="clear"></div>
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
				</div>
			</div>
			<div class="blog_comment1">
				<div class="thumb"> <a href="#"><img src="./images/comment2.jpg" alt="" /></a> </div>
				<div class="description">
					<div class="comment_top">
						<div class="comment_topleft">
							<h5>Simon Cole</h5>
							<div class="postdate"> <i class="poston">Post On  Tue, 26/01/11</i> <span class="blog_rating blg_rtng1"> <a href="#"><img src="./images/ratings.jpg" alt="" /> 55</a></span> </div>
						</div>
						<div class="comment_topright"> <a class="btn" href="#">Reply</a> </div>
					</div>
					<div class="clear"></div>
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
				</div>
			</div>
			<div class="blog_comment2">
				<div class="leftimg">&nbsp;</div>
				<div class="blogcomment2">
					<div class="thumb"> <a href="#"><img src="./images/comment1.jpg" alt="" /></a> </div>
					<div class="description">
						<div class="comment_top">
							<div class="comment_topleft">
								<h5>Peter Morgen</h5>
								<div class="postdate"> <i class="poston">Post On  Tue, 26/01/11</i> <span class="blog_rating blg_rtng1"> <a href="#"><img src="./images/ratings.jpg" alt="" /> 55</a></span> </div>
							</div>
							<div class="comment_topright"> <a class="btn" href="#">Reply</a> </div>
						</div>
						<div class="clear"></div>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
					</div>
				</div>
			</div>
			<div class="blog_comment3">
				<div class="leftimg">&nbsp;</div>
				<div class="blogcomment3">
					<div class="thumb"> <a href="#"><img src="./images/comment1.jpg" alt="" /></a> </div>
					<div class="description">
						<div class="comment_top">
							<div class="comment_topleft">
								<h5>Peter Morgen</h5>
								<div class="postdate"> <i class="poston">Post On  Tue, 26/01/11</i> <span class="blog_rating blg_rtng1"> <a href="#"><img src="./images/ratings.jpg" alt="" /> 55</a></span> </div>
							</div>
						</div>
						<div class="clear"></div>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
					</div>
				</div>
			</div>
			<div class="blog_comment1">
				<div class="thumb"> <a href="#"><img src="./images/comment1.jpg" alt="" /></a> </div>
				<div class="description">
					<div class="comment_top">
						<div class="comment_topleft">
							<h5>Peter Morgen</h5>
							<div class="postdate"> <i class="poston">Post On  Tue, 26/01/11</i> <span class="blog_rating blg_rtng1"> <a href="#"><img src="./images/ratings.jpg" alt="" /> 55</a></span> </div>
						</div>
						<div class="comment_topright"> <a class="btn" href="#">Reply</a> </div>
					</div>
					<div class="clear"></div>
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque bibendum rutrum     		                                                consectetur. Vivamus et nulla ipsum. Nunc accumsan mauris eget nunc imperdiet commodo. Morbi                                                cursus viverra arcu nec dictum. Pellentesque venenatis, dui vel vestibulum suscipit, elit eros                                                egestas dolor, nec suscipit ligula risus ut tellus. Phasellus ante sem. </p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<!-- Pagination -->
		<div class="pginaiton pad9">
			<ul>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li class="dots"> . . . . . . .</li>
				<li><a href="#"> 22</a></li>
				<li class="nextpage"><a href="#">Next Page</a></li>
			</ul>
		</div>
		<!-- Leave Reply -->
		<div class="leave_reply">
			<div class="leave_reply_heading colr"> Leave a Reply </div>
			<div class="leave_reply_form">
				<ul>
					<li><span>Name:</span>
						<input name="txtName" type="text" />
					</li>
					<li><span>Email:</span>
						<input name="txtEmail" type="text" />
					</li>
					<li><span>Messege:</span>
						<textarea class="txtarea" name="txtMessege" cols="0" rows="0"></textarea>
					</li>
					<li>
						<div class="replydiv">
							<p>500 Character remaining </p>
							<div class="action"> <a class="btn left" href="#">submit</a> <a class="right" href="#">Cancel</a> </div>
						</div>
					</li>
				</ul>
			</div>
		</div><?php */?>
	</div>
	<div class="clear"></div>
</div>
<?php right_sidebar();?>