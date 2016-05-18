<div class="container">
	<div class="row-fluid">
		<div class="span12 slider"> 
			<?php echo Html::img('inner-about-banner.jpg'); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span12 start">
			<div class="span2"> <?php echo Html::img('mai.png'); ?></div>
			<div class="span8 mid_mg">
				<p><?php echo $latest_news; ?></p>
			</div>
			<div class="span2 info"> <a href="<?php echo page_url(17); ?>">View More...</a> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row-fluid">
		<div class="span12 mid_part">
			<div class="span3 mid_part_l"> <?php echo $left_widget; ?> </div>
			<div class="span9 inner-page">
				<h1><?php echo $page_title; ?></h1>
				<div class="row-fluid">
					<div class="span12">
						<div class="span6 contact">
							<p><?php echo $page_content; ?></p>
						</div>
						<div class="span6 form">
							<form method="POST">
								<legend> Send Enquiry</legend>
								<div class="form-label">
									<label>Name*</label><input type="text" name="name" />
								</div>
								<div class="form-label">
									<label>Email*</label><input type="text" name="email" />
								</div>
								<div class="form-label">
									<label>Mobile</label><input type="text" name="mobile" />
								</div>
								<div class="form-label">
									<label>Enquiry</label><textarea name="message"></textarea>
								</div>
								<div class="submit">
									<input type="submit" value="Submit" name="enquiry" /> <input type="reset" value="Reset" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
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
}