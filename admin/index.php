<?php include 'view/header.php';?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>GIT Box - Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />
</head>
<body class='login'>
	<div class="wrapper">
		<h1><a href="http://www.gitinfosys.com"><img src="img/logo-big.png" class='retina-ready' width="90"><span style="font-weight:800;font-size:60px;">GIT BOX</span></a></h1>
		<div class="login-body">
			<h2>LOG IN</h2>
			<form method='POST' class='form-validate' id="login-form">
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='email' placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="password" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<!--<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> 
						<label for="remember">Remember me</label>
					</div>-->
					<input type="submit" name="login" value="Let me in" class='btn btn-primary'>
				</div>
			</form>
			<!--<div class="forget"><a href="#"><span>Forgot password?</span></a></div>-->
			<div style="height:10px;"></div>
		</div>
	</div>
	<?php
	if(isset($_POST['login'])){
		$email = mysql_real_escape_string(stripslashes(trim($_POST['email'])));
		$password = mysql_real_escape_string(stripslashes(trim($_POST['password'])));

		$sql = mysql_query("select * from admin where email='$email' AND password='$password' ") or die('Error');
		
		if(mysql_num_rows($sql)!=0) {
			$row=mysql_fetch_array($sql);
		
			@session_start();
			$_SESSION['id']=$row['id'];
		
			$_SESSION['admin']=$row['username'];
			
			header("location:dashboard.php");
		} else {
			/*echo '<script> document.getElementById("login_error").style.display="block"; </script>'; */
			echo '<script> alert("Wrong username or password"); </script>';
		}
	}
	?>
<?php include 'view/footer.php'; ?>