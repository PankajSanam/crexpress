<!-- begin page title -->
<section id="page-title">
	<div class="container clearfix">
		<h1>Contact</h1>
		<nav id="breadcrumbs">
			<ul>
				<li><a href="index-2.html">Home</a> &rsaquo;</li>
				<li>Contact</li>
			</ul>
		</nav>
	</div>
</section>
<!-- begin page title -->

<!-- begin content -->
<section id="content" class="container clearfix">
	<!-- begin google map -->
	<section>
		<div id="map"
		     data-address="40 Broadway, London"
		     data-zoom="17"
		     style="width: 100%; height: 400px;">
		</div>
	</section>
	<!-- end google map -->

	<!-- begin main -->
	<section id="main" class="three-fourths">
		<!-- begin contact form -->
		<h2>Contact Us</h2>
		<p>We would be glad to have feedback from you. Drop us a line, whether it is a comment, a question, a work proposition or just a hello. You can use either the form below or the contact details on the right.</p>
		<div id="contact-notification-box-success" class="notification-box notification-box-success" style="display: none;">
			<p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
			<a href="#" class="notification-close notification-close-success">x</a>
		</div>

		<div id="contact-notification-box-error" class="notification-box notification-box-error " style="display: none;">
			<p id="contact-notification-box-error-msg" data-default-msg="Your message couldn't be sent because a server error occurred. Please try again."></p>
			<a href="#" class="notification-close notification-close-error">x</a>
		</div>
		<form id="contact-form" class="content-form" method="post" action="#">
			<p>
				<label for="name">Name:<span class="note">*</span></label>
				<input id="name" type="text" name="name" class="required">
			</p>
			<p>
				<label for="email">Email:<span class="note">*</span></label>
				<input id="email" type="email" name="email" class="required">
			</p>
			<p>
				<label for="url">Website:</label>
				<input id="url" type="url" name="url">
			</p>
			<p>
				<label for="subject">Subject:<span class="note">*</span></label>
				<input id="subject" type="text" name="subject" class="required">
			</p>
			<p>
				<label for="message">Message:<span class="note">*</span></label>
				<textarea id="message" cols="68" rows="8" name="message" class="required"></textarea>
			</p>
			<p><script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LejVN0SAAAAAEotSDPpppZ2ew_p25iDILvueqv9"></script>

			<noscript>
				<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LejVN0SAAAAAEotSDPpppZ2ew_p25iDILvueqv9" height="300" width="500" frameborder="0"></iframe><br/>
				<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
				<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
			</noscript></p>            <p>
				<input id="submit" class="button" type="submit" name="submit" value="Send Message">
			</p>
		</form>
		<p><span class="note">*</span> Required fields</p>
		<!-- end contact form -->
	</section>
	<!-- end main -->

	<!-- begin sidebar -->
	<aside id="sidebar" class="one-fourth column-last">
		<div class="widget contact-info">
			<h3>Contact Info</h3>
			<p>You can also reach us here:</p>
			<div>
				<p class="address"><strong>Address:</strong> 123 Street, City, Country</p>
				<p class="phone"><strong>Phone:</strong> (123) 456-7890</p>
				<p class="fax"><strong>Fax:</strong> (123) 456-7890</p>
				<p class="email"><strong>Email:</strong> <a href="mailto:office@company.com">office@company.com</a></p>
				<p class="business-hours"><strong>Business Hours:</strong><br>
					Monday-Friday: 9:00-18:00<br>
					Saturday: 10:00-17:00<br>
					Sunday: Closed
				</p>
			</div>
		</div>
	</aside>
	<!-- end sidebar -->
</section>
<!-- end content -->

{*
if(isset($_POST['enquiry'])){
	if(isset($_POST['name']) AND isset($_POST['email'])) {
		$to = 'pankaj@crexo.com';
		$subject = "Enquiry";
		$message="<b>Name:</b> ".$_POST['name']. 
				  "<br /><b>Email:</b> ".$_POST['email'].
				  "<br /><b>Mobile:</b> ".$_POST['mobile'].
				  "<br /><b>Message:</b> ".$_POST['message'] ;
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

		@mail($to,$subject,$message,$headers);
		redirect($home_url);
	} else {
		alert('Please fill name and email first!');
	}
}*}