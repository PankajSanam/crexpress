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
	<div class="content_heading">
       	<div class="heading"><h2>Choose better job for you</h2> </div>
        <!--<div class="share"><a href="#">Share with friends</a></div>-->
    </div>
	<!--<p>Nullam scelerisque cursus leo at volutpat. Etiam non faucibus ante. Ut eget leo placerat velit imperdiet 
	suscipit. aliquam est. Proin eget laoreet lectus. Nullam scelerisque cursus leo at volutpat. Etiam non faucibus 
	ante. placerat velit imperdiet suscipit.  at aliquam est. Proin eget laoreet lectus. Nullam scelerisque cursus 
	leo at volutpat.</p>-->
   	<div class="make_slection">
    	<span>Search job in </span> 
        <form method="POST">
            <select name="city_id">
				<?php 
				$cities = Location::cities();
				foreach($cities as $city) {
				?>
				<option value="<?php echo $city['id'];?>" <?php if(isset($_POST['city_id']) && $_POST['city_id']==$city['id']) { echo ' selected '; } ?>><?php echo $city['name'];?></option>
				<?php } ?>
        	</select>
        	<input type="submit" name="Search" name="search" />
        </form>
    </div>
   	<div class="clear"></div>
    <!-- Content Block -->
    <div class="listingblock">
       	<div class="sheading">
        	<div class="sheadings">
            	<h5>Jobs in <?php if(isset($_POST['city_id'])) echo Location::city_name($_POST['city_id']); else echo 'Jaipur'; ?></h5>
            </div>
            <div class="sheading_action">
            	<!--<div class="share left"><a href="#">Share to your friends</a></div>
            	<div class="print_this"><a href="#">Print This</a></div>-->
            </div>
        </div>
		<div class="clear"></div>
		<?php
		if(isset($_POST['city_id']))
			$city_id = $_POST['city_id'];
		else
			$city_id = 3;
		
		$query = DB::select_query('private_jobs', array('status=' => 1, 'city_id=' => $city_id));
		$res = DB::count_query('private_jobs', array('status=' => 1, 'city_id=' => $city_id));

		if($res <= 0){
			echo 'No records found!';
		} else {
		?>
        <div class="course_listing">
            <ul class="listheading">
            	<li class="code colr">S.N.</li>
                <li class="coursename colr">Job Category</li>
                <li class="time colr">City</li>
                <!--<li class="location colr">Location</li>
                <li class="instructor colr">Instructor</li>-->
            </ul>
            <?php
            $i = 1;
			foreach($query as $row){
			?>
            <ul class="courselisting">
            	<li class="code"><?php echo $i; ?></li>
                <li class="coursename">
                	<a href="<?php echo PrivateJob::link($row['slug']); ?>" class="colr" <?php echo $row['title'];?>>
                	<?php echo $row['title']; ?></a>
                </li>
                <li class="time"><?php if(isset($_POST['city_id'])) echo Location::city_name($_POST['city_id']); else echo 'Jaipur'; ?> </li>
                <!--<li class="location"><a href="#">Abc Campus</a></li>
                <li class="instructor">Pablo Montagnes</li>-->
            </ul>
            <?php
            $i++;
			}
			?>
       		<div class="clear"></div>
        </div>
        <?php } ?>
   	</div>
    <div class="note">
    	<!--<a href="#" class="close">&nbsp;</a>
        <p><strong> NOTE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dui dolor. Fusce auctor dolor 
        a diam tincidunt quis malesuada tellus Integer sit amet lorem ac ligula interdum elementum. </p>-->
    </div>
  	<div class="clear"></div>
	<div id="content2"> 
		<div class="description"><h6></h6></div>
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

		<div class="blog_detail">
			<a href="#"><?php echo PrivateJob::featured_image($page_slug,'225','219','blogimg'); ?></a>
			<div class="bloginfo">
				<h5><?php echo PrivateJob::title($page_slug,'private_job'); ?></h5>
				<div class="info info1">
					<span class="postedby">Posted By: <a href="#">Admin</a></span>
					<!--<span class="lastupdte"> Last Update by:<i><?php echo Page::last_updated($page_slug); ?></i></span>
					<span class="comments"><a href="./blogdetail.html"><strong>852</strong> Comments</a></span>
					<div class="share1"><a href="./blogdetail.html">Share</a></div>-->
				</div>
				<div class="clear"></div>
			</div>
			<p><?php echo PrivateJob::description($page_slug); ?></p>
			<!--<a href="#" class="link colr">88 Comments</a>-->
		 </div>
		 <div class="listingblock">
			<?php
			if(isset($_POST['city_id'])){
				$city_id = $_POST['city_id'];
			} else {
				$city_id = 3;
			}
			
			$query = DB::select_query('private_jobs', array('status=' => 1, 'slug=' => $page_slug));
			$res = DB::count_query('private_jobs', array('status=' => 1, 'slug=' => $page_slug));

			if($res <= 0){
				echo '';
			} else {
			?>
            <div class="course_listing">
	            <!--<ul class="listheading">
	                <li class="coursename colr">Job Category</li>
	                <li class="time colr">City</li>
	                <li class="location colr">Location</li>
	                <li class="instructor colr">Instructor</li>
	            </ul>-->
	            <?php
				foreach($query as $row)
				
				$attributes = array( 'class' => 'courselisting' );
				echo Html::ul( array( 'Category : ', $row['job_category_id'] ), $attributes );
				echo Html::ul( array( 'Job Title : ', $row['title'] ), $attributes );
				echo Html::ul( array( 'Posting Date :', $row['post_date'] ), $attributes );
				echo Html::ul( array( 'Ending Date : ', $row['end_date'] ), $attributes );
				echo Html::ul( array( 'State : ', Location::name($row['state_id']) ), $attributes );
				echo Html::ul( array( 'City : ', Location::name($row['city_id']) ), $attributes );
				echo Html::ul( array( 'Locality : ', $row['locality_id'] ), $attributes );
				echo Html::ul( array( 'Contact Number : ', $row['contact_number'] ), $attributes );
				echo Html::ul( array( 'Contact Address : ', $row['address'] ), $attributes );
				echo Html::ul( array( 'No. of Positions : ', $row['vacancies'] ), $attributes );
				echo Html::ul( array( 'Salary : ', $row['salary_from'].' to '.$row['salary_to'] ), $attributes );
				echo Html::ul( array( 'Timings : ', $row['timings'] ), $attributes );
				echo Html::ul( array( 'Preferred Gender : ', $row['gender'] ), $attributes );
				echo Html::ul( array( 'Required Experience : ', $row['minimum_experience'].' - '. $row['maximum_experience'] ), $attributes );
				echo Html::ul( array( 'Job Description : ', $row['content'] ), $attributes );
				?>
           		<div class="clear"></div>
            </div>
            <?php echo Html::br(2);?>
            <form method="POST">
            	<h1>Apply Now</h1>
            	<?php echo Html::br(2); ?>
            	Name : <input type="text" name="name" />
            	Email : <input type="text" name="email" />
            	Mobile : <input type="text" name="mobile" />
            	Message : <input type="text" name="message" />
            	<?php echo Html::br(2); ?>
            	<input type="submit" name="apply" value="Apply Now" />
            </form>
            <?php } ?>
            <?php
            if(isset($_POST['apply'])){
            	$values = array(
            		'job_id' => $row['id'],
            		'date' => date("Y-m-d"),
            		'name' => $_POST['name'],
            		'email' => $_POST['email'],
            		'mobile' => $_POST['mobile'],
            		'message' => $_POST['message']
            	);
            	DB::insert_query('job_enquiries',$values);
            	Helper::redirect($page_slug.'.html');
            }
            ?>
       	</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<?php right_sidebar();?>