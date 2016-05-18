</div>
<div class="clear"></div>
</div>
</div>
<div id="bottom_seciton">
	<div id="footer"> 
		<div class="find_your_way">
			<h5>Find your Way</h5>
			<ul>
				<li><a href="./">Home</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="courses.html">Courses</a></li>
				<li><a href="privay-policy.html">Privacy Policy</a></li>
				<li><a href="contact.html">Contact Us</a></li>
				
			</ul>
		</div>
		<!-- Help and Support -->
		<div class="help_support">
			<h5>Courses</h5>
			<ul>
				<li><a href="what-is-mca-master-of-computer-application.html">MCA</a></li>
				<li><a href="what-is-mba-master-of-business-administration.html">MBA</a></li>
			</ul>
		</div>
		<!-- Quick Links -->
		<div class="quick_links">
			<h5>Quick Links</h5>
			<ul>
				<li><a href="sitemap.xml">XML Sitemap</a></li>
				<li><a href="sitemap.html">HTML Sitemap</a></li>
				<li><a href="ror.xml">ROR Sitemap</a></li>
			</ul>
		</div>
		<!-- Addmission -->
		<div class="Addmissoin">
			<h5>Jobs</h5>
			<ul>
				<li><a href="government-jobs.html">Government Jobs</a></li>
				<li><a href="police-recruitment.html">Police Recruitment</a></li>
				<li><a href="railway-jobs.html">Railway Jobs</a></li>
			</ul>
		</div>
		<!-- Contact Us -->
		<div class="contact_us">
			<h5>Contact Us</h5>
			<ul>
				<li class="telephone_no">+91 9024551674</li>
				<li class="mailing_address"> 42-A, Bhrigu Nagar, DCM, Ajmer Road, Jaipur</li>
				<li class="email_address"><a href="#">info@careerask.com</a></li>
				<li class="googlemaps"><a href="#">Google Maps</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="bottom_Section"> 
	<div id="pagebottom"> 
		<div class="copyright">&copy; 2013, All Rights Reserved. Powered By <a href="http://www.gitinfosys.com">GIT Infosys</a></div>
		<a href="#" class="top">Top</a> 
		<div class="socail_networks">
			<ul>
				<?php
				$social_icons = DB::select_query('social_icons');
				foreach($social_icons as $social_icon){
				?>
				<li><a title="<?php echo $social_icon['name'];?>" href="<?php echo $social_icon['url'].$social_icon['link']; ?>"><img src="uploads/social/<?php echo $social_icon['image'];?>" width="28" /></a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
</body>
</html>