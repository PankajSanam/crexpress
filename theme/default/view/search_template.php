<div class="col1"> 
	<!-- 
	<div id="banner1"> <a href="#"><img src="./images/newsbanner.gif" alt="" /></a>
		<div class="heading">
			<h1>College News and Events</h1>
		</div>
	</div>
	<div class="content_links">
		<ul>
			<li><a class="our_university" href="#">Our University</a></li>
			<li><a class="admission" href="#">Admissions</a></li>
			<li><a class="accommodaiton" href="#">Accommodations</a></li>
			<li><a class="community" href="#">Community</a></li>
			<li><a class="schorship" href="#">Scholorships</a></li>
			<li class="last"><a class="take_tour" href="#">Take a Tour</a></li>
		</ul>
	</div>
	-->
	<div id="content2">
		<h2 class="pad8">Search Result for "<?php echo $_GET['search'];?>"</h2>
		<!-- News Listing -->
		<ul class="listing">
			<?php
			if(isset($_GET['search'])){
				$errors = array();
				if(empty($_GET['search'])){
					$errors[] = 'Please enter a search term.';
				} elseif(strlen($_GET['search']) < 3){
					$errors[] = 'Your search term must be 3 or more characters.';
				} elseif(DB::search_query($_GET['search']) === false){
					$errors[] = 'Your search for <strong>'.$_GET['search'].'</strong> returned no results';
				}

				if(empty($errors)){
					$results = DB::search_query($_GET['search']);
					$results_num = count($results);
					$suffix = ($results_num != 1) ? 's' : '';
					echo 'Your search for <strong>'.$_GET['search'].'</strong> returned '.$results_num.' result'.$suffix;
					
					foreach($results as $result){
			?>
				<li>
					<div class="thumb"><a href="<?php echo Page::link($result['slug']);?>"><?php echo Page::featured_image($result['featured_image'],120,120); ?></a></div>
					<div class="description">
						<h6><a href="<?php echo Page::link($result['slug']);?>" class="colr"><?php echo $result['title'];?></a></h6>
						<p><?php echo Validation::strip_html($result['content'],220);?>...</p>
						<div class="clear"></div>
						<!--<div class="info"> 
							<span class="lastupdte"> Last Updated On :<i><?php echo $result['last_updated'];?></i></span>
							<span class="tag">Tag: <a href="#">Business</a></span> 
							<span class="comments"><a href="#"><strong>852</strong> Comments</a></span> 
							<a class="moreinfo" href="#">:: Moreinfo</a> 
						</div>-->
					</div>
					<div class="clear"></div>
				</li>
			<?php
					}
				} else {
					foreach($errors as $error){
						echo $error . '<br/>';
					}
				}
			}
			
			?>
			<!--<li class="last">
				<div class="thumb"><a href="#"><img src="./images/news6.gif" alt="" /></a></div>
				<div class="description">
					<h6><a href="#" class="colr">Lorem ipsum dolor sit amet, Lorem ipsum dolor sit </a></h6>
					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta, leo a posuere luctus, justo                                               leomi leoegestas libero, nec volutpat purus mi leosed dui. Suspendisse sem dui, semper in semper                                               lacinia, elementum ornare lorem. Lorem ipsum dolor sit amet. </p>
					<div class="clear"></div>
					<div class="info"> <span class="lastupdte"> Last Update by:<i>Tue, 26/01/11</i></span> <span class="tag">Tag: <a href="#">Business</a></span> <span class="comments"><a href="#"><strong>852</strong> Comments</a></span> <a class="moreinfo" href="#">:: Moreinfo</a> </div>
				</div>
				<div class="clear"></div>
			</li>-->
		</ul>
		<div class="clear"></div>
		<!-- 
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
		<div class="clear"></div>
		-->
	</div>
	<div class="clear"></div>
</div>
<?php right_sidebar(); ?>