<div class="maindiv">
	<?php //echo $left_widget; ?>
	<div class="middle-panel">
		<?php /* <div class="inner-banner"><?php echo $html->img('about-img.jpg'); ?></div> */ ?>
		<div class="college-listing"><h1><?php echo $page_title; ?></h1></div>
		<div class="arrow"></div>
		<div class="inner-page">
			<div class="inner-page-1"><div class="college-details-page"><?php echo $page_content; ?></div></div>
		</div>
		<div class="clear"></div>
	</div>
	<?php echo $right_widget; ?>
</div>
<?php /*
	<div class="contact-form">
		<h2>Enquiry Form</h2>
		<form method="POST">
			<input type="text" name="name" placeholder="your name...">
			<input type="text" name="email" placeholder="your email...">
			<textarea name="message" placeholder="your message..."> your message...</textarea>							
			<input name="contact_inquiry" type="submit" value="Submit"><input type="reset" value="Reset">
		</form>
	</div>
	<?php
	if(isset($_POST['contact_inquiry'])){
		if(isset($_POST['name']) AND isset($_POST['email'])) {
			$to = 'info@shribalajievents.com';
		    $subject = "Shri Balaji Events Enquiry";
		    $message="<b>Name:</b> ".$_POST['name']. 
		              "<br /><b>Email:</b> ".$_POST['email'].
		              "<br /><b>Message:</b> ".$_POST['message'] ;
		    $headers = 'MIME-Version: 1.0' . "\r\n";
		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		    $headers .= 'From: <'.$_POST['email'].'>' . "\r\n";

		    @mail($to,$subject,$message,$headers);
		    redirect($home_url);
		}
	} */
	?>