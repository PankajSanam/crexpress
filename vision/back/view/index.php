<div class="wrapper">
	<h1>
		<a href="http://www.gitinfosys.com">
		<img src="<?php echo BACK_VISION; ?>/img/logo-big.png" class='retina-ready' width="90">
		<span style="font-weight:800;font-size:60px;">GIT BOX</span></a>
	</h1>
	<div class="login-body">
		<h2>LOG IN</h2>
		<form method='POST' class='form-validate' id="login-form">
			<div class="control-group">
				<div class="email controls">
					<input type="text" name='email' placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true">
				</div>
				<span id="login_error" style="color:red;display:none;">Wrong username or password. Please try again!</span>
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
	$Db = new Db;
	$sql = $Db->select('admin', array( 'email=' => $_POST['email'], 'password=' => $_POST['password']));
	$count = count($sql);
	
	if($count!=0) {
		foreach($sql as $row){}
	
		@session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['admin'] = $row['username'];
		
		redirect('dashboard.html');
	} else {
		echo '<script> document.getElementById("login_error").style.display="block"; </script>';
		//echo '<script> alert("Wrong username or password"); </script>';
	}
}
?>