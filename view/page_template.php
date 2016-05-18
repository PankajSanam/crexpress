	<div class="col1"> 
		<!-- Banner -->
		<div id="banner1"> <a href="#"><img src="uploads/slider/page-slider1.jpg" width="704" /></a>
			<div class="heading">
				<h1>Career Ask</h1>
			</div>
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
			<!-- Blog Detail -->
			<div class="blog_detail">
				<a href="#"><?php echo get_page_featured_image($page_slug,'225','219','blogimg'); ?></a>
				<div class="bloginfo">
					<h5><?php echo get_page_name($page_slug); ?></h5>
					<div class="info info1">
						<span class="postedby">Posted By: <a href="#">Admin</a></span>
						<span class="lastupdte"> Last Update by:<i><?php echo get_page_last_updated($page_slug); ?></i></span>
						<!--<span class="comments"><a href="./blogdetail.html"><strong>852</strong> Comments</a></span>-->
						<!--<div class="share1"><a href="./blogdetail.html">Share</a></div>-->
					</div>
					<div class="clear"></div>
				</div>
				<p><?php echo get_page_content($page_slug); ?></p>
				<!--<a href="#" class="link colr">88 Comments</a>-->
			 	</div>
			<div class="clear"></div>
			<?php
			$page_id = get_page_id($page_slug);
			$query = mysql_query("select *from pages where status='1' AND page_category_id = '".$page_id."'") or die(db_error());
			$res = mysql_num_rows($query);

			if($res <= 0){
				echo '';
			} else {
			?>
			<h2 class="pad8"><?php echo get_page_name($page_slug); ?></h2>
			<ul class="listing">
				<?php
				while($row = mysql_fetch_array($query)){
				?>
				<li>
					<div class="thumb"><a href="<?php echo get_page_link($row['page_slug']); ?>" title="<?php echo $row['page_name'];?>"><?php echo get_page_featured_image($row['page_slug'],'126','106'); ?></a></div>
					<div class="description">
						<h6><a href="<?php echo get_page_link($row['page_slug']); ?>" class="colr" title="<?php echo $row['page_name'];?>"><?php echo $row['page_name']; ?></a></h6>
						<p><?php echo truncate($row['page_content'], $length = 150, $ending = '...'); ?></p>
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
			<!-- Blog Comments -->
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