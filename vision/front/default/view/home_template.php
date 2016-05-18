<div class="col1"> 
	<div id="banner">
		<div id="slider2">
			<?php foreach($sliders as $slider){ ?>
			<div class="contentdiv">
				<?php echo $html->img('slider/'.$slider['image'], 2); ?>
				<div class="banner_des"><h4><?php echo $slider['name'];?></h4><p><?php echo $slider['description'];?></p></div>
			</div>
			<?php } ?>
		</div>
		<div id="paginate-slider2" class="pagination"> </div>
		<?php echo $slider_js; ?>
	</div>
	<!--<div class="content_links">
		<ul>
			<li><a class="our_university" href="#">Our University</a></li>
			<li><a class="admission" href="#">Admissions</a></li>
			<li><a class="accommodaiton" href="#">Accommodations</a></li>
			<li><a class="community" href="#">Community</a></li>
			<li><a class="schorship" href="#">Scholorships</a></li>
			<li class="last"><a class="take_tour" href="#">Take a Tour</a></li>
		</ul>
	</div>-->
	<div class="content_heading">
		<div class="heading"><h2><?php echo $page_title; ?></h2></div>
		<div class="share">
			<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.careerask.com" target="_blank">Share with friends</a>
		</div>
	</div>
	<p><?php echo $page_content; ?><a class="readmore" href="#"></a> </p>
	<div class="clear"></div>
	<?php /*?><div class="contentblock"> 
		<div class="tabwrapper">
			<div class="tabs_links">
				<ul>
					<li><a href="#tab1">News</a></li>
					<li><a href="#tab2">Events</a></li>
					<li><a href="#tab3">Tweets</a></li>
					<li><a class="nobg" href="#tab4">Blog</a></li>
				</ul>
			</div>
			<div class="tab_content" id="tab1" style="display:none">
				<ul>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news1.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news2.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li class="nbbdr">
						<div class="thumb"> <a href="./news.html"><img src="./images/news3.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="tab_content" id="tab2" style="display:none">
				<ul>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news1.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news2.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li class="nbbdr">
						<div class="thumb"> <a href="./news.html"><img src="./images/news3.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="tab_content" id="tab3" style="display:none">
				<ul>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news1.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news2.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li class="nbbdr">
						<div class="thumb"> <a href="./news.html"><img src="./images/news3.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="tab_content" id="tab4" style="display:none">
				<ul>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news1.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li>
						<div class="thumb"> <a href="./news.html"><img src="./images/news2.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
					<li class="nbbdr">
						<div class="thumb"> <a href="./news.html"><img src="./images/news3.jpg" alt=" " /></a> </div>
						<div class="descripton">
							<h6><a href="./news.html">Lorem ipsum dolor sit amet, conse</a></h6>
							<em>(Posted on 17 Jan 11 , 2011)</em>
							<p> Lorem ipsum dolor sit amet, consectetur adipiscing
								placerat dignissim, diam lacus placerat ligula, </p>
						</div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<!-- Search Course -->
		<div class="search_course">
			<h4>Search Our New Courses</h4>
			<p><a href="#">Our courses</a> are applied,innovative and grounded in the real world.</p>
			<div class="box">
				<div class="search_option">
					<ul class="option">
						<li>
							<input name="txt" value="Search you any keyword" onfocus="if(this.value=='Search you any keyword') {this.value='';}" onblur="if(this.value=='') {this.value='Search you any keyword';}" type="text" />
						</li>
						<li><a class="search right" href="#">Search</a></li>
					</ul>
					<ul class="advance_option">
						<li class="selected"><a href="#">Advance Option</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">A to Z Courses </a></li>
						<li class="nobg"><a href="#"> Support</a></li>
					</ul>
				</div>
				<!-- Degree Type -->
				<div class="degree_type">
					<h5>Degree type</h5>
					<ul>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Undergraduate</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Post graduate</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>School</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Others</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Vocational Course</span></li>
					</ul>
				</div>
				<!-- Residnece Type -->
				<div class="resident_type">
					<h5>Resident Type</h5>
					<ul>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>United Kingdom</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Wales</span></li>
						<li>
							<input class="radiobutton" name="txt" type="radio" value="" />
							<span>Ireland</span></li>
						<li>
							<select class="select_country" name="txt">
								<option />
								USA
															
								<option />
								United Kingdom
															
								<option />
								Canada
														
							</select>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
				
				<!-- apply now -->
				<div class="apply_now"> <a class="aply_now" href="#">Apply Now</a> <a class="find_out_how" href="#">find out how</a> </div>
			</div>
		</div>
		<div class="clear"></div>
	</div><?php */?>
	<div class="clear"></div>
	<!-- col1 ends --> 
</div>
<?php right_sidebar(); ?>
<!-- Slder 
<div class="image_scroll"> <a class="leftarrow" href="#"><img src="./images/left_arrow.gif" alt="" /></a>
	<div class="slider1">
		<ul>
			<li><a href="#"><img src="./images/slider1.gif" alt="" /></a></li>
			<li><a href="#"><img src="./images/slider2.gif" alt="" /></a></li>
			<li><a href="#"><img src="./images/slider3.gif" alt="" /></a></li>
			<li><a href="#"><img src="./images/slider4.gif" alt="" /></a></li>
			<li><a href="#"><img src="./images/slider5.gif" alt="" /></a></li>
			<li><a href="#"><img src="./images/slider6.gif" alt="" /></a></li>
		</ul>
	</div>
	<a class="rightarrow" href="#"><img src="./images/right_arrow.gif" alt="" /></a> 
</div>
-->