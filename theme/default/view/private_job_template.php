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
        	<input type="submit" value="Search" name="search" class="btn-primary"/>
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
        <div class="job-listing">
            <table cellspacing="1" class="private-job-table">
            	<tr>
	            	<td class="pj-row">S.N.</td>
	            	<td class="pj-row">Job Category</td>
	            	<td class="pj-row">Vacancies</td>
	            	<td class="pj-row">City</td>
	            </tr>
	            <?php
	            $i = 1;
				foreach($query as $row){
				?>
	            <tr>
		        	<td class="pj-row2"><?php echo $i; ?></td>
		            <td class="pj-row2">
		            	<a href="<?php echo PrivateJob::link($row['slug']); ?>" class="colr" title="<?php echo $row['title'];?>">
	                	<?php echo $row['title']; ?></a>
	                </td>
	                <td class="pj-row2"><?php echo $row['vacancies']; ?></td>
	                <td class="pj-row2"><?php if(isset($_POST['city_id'])) echo Location::city_name($_POST['city_id']); else echo 'Jaipur'; ?></td>
		        </tr>
		        <?php
            	$i++;
				}
				?>
	        </table>
       		<div class="clear"></div>
        </div>
        <?php } ?>
   	</div>
    <!--<div class="note">
    	<a href="#" class="close">&nbsp;</a>
        <p><strong> NOTE:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dui dolor. Fusce auctor dolor 
        a diam tincidunt quis malesuada tellus Integer sit amet lorem ac ligula interdum elementum. </p>
    </div>-->
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
			<?php // echo PrivateJob::featured_image($page_slug,'225','219','blogimg'); ?>
			<div class="bloginfo">
				<h1><?php echo PrivateJob::title($page_slug,'private_job'); ?></h1>
				<!--<div class="info info1">
					<span class="postedby">Posted By: <a href="#">Admin</a></span>
					<span class="lastupdte"> Last Update by:<i><?php echo Page::last_updated($page_slug); ?></i></span>
					<span class="comments"><a href="./blogdetail.html"><strong>852</strong> Comments</a></span>
					<div class="share1"><a href="./blogdetail.html">Share</a></div>
				</div>
				<div class="clear"></div>-->
			</div>
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
            <div class="job-listing">
	            <!--<ul class="listheading">
	                <li class="coursename colr">Job Category</li>
	                <li class="time colr">City</li>
	                <li class="location colr">Location</li>
	                <li class="instructor colr">Instructor</li>
	            </ul>-->
	            <?php foreach($query as $row); ?>
	            <table cellspacing="1" class="private-job-table">
	            	<tr>
	            		<td class="pj-row">Category : </td>
	            		<td class="pj-row2"><?php echo $row['job_category_id']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Job Title : </td>
	            		<td class="pj-row2"><?php echo $row['title']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Posting Date : </td>
	            		<td class="pj-row2"><?php echo $row['post_date']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Ending Date : </td>
	            		<td class="pj-row2"><?php echo $row['end_date']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">State : </td>
	            		<td class="pj-row2"><?php echo Location::name($row['state_id']); ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">City : </td>
	            		<td class="pj-row2"><?php echo Location::name($row['city_id']); ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Locality : </td>
	            		<td class="pj-row2"><?php echo Location::name($row['locality_id']); ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Contact Number : </td>
	            		<td class="pj-row2"><?php echo $row['contact_number']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Contact Address : </td>
	            		<td class="pj-row2"><?php echo $row['address']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">No. of Positions : </td>
	            		<td class="pj-row2"><?php echo $row['vacancies']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Salary : </td>
	            		<td class="pj-row2"><?php echo Helper::from_to($row['salary_from'],$row['salary_to']); ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Timings : </td>
	            		<td class="pj-row2"><?php echo $row['timings']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Preferred Gender : </td>
	            		<td class="pj-row2"><?php echo $row['gender']; ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Required Experience : </td>
	            		<td class="pj-row2"><?php echo Helper::from_to($row['minimum_experience'],$row['maximum_experience']); ?></td>
	            	</tr>
	            	<tr>
	            		<td class="pj-row">Job Description : </td>
	            		<td class="pj-row2"><?php echo $row['content']; ?></td>
	            	</tr>
	            </table>
           		<div class="clear"></div>
            </div>
            <?php echo Html::br(2);?>
            <form method="POST">
            	<h1>Apply Now</h1>
            	<?php echo Html::br(2); ?>
            	<p><label class="label-box">Name : </label><input type="text" name="name" class="text-box" /></p>
            	<p><label class="label-box">Email : </label><input type="text" name="email" class="text-box" /></p>
            	<p><label class="label-box">Mobile : </label><input type="text" name="mobile" class="text-box" /></p>
            	<p><label class="label-box">Message : </label><textarea name="message" class="text-area"></textarea></p>
            	<input type="submit" name="apply" value="Apply Now" class="btn-primary" />
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