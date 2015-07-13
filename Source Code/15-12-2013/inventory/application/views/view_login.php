<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets base,skeleton,layout-->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/base.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/skeleton.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/layout.css" type="text/css" />
	
</head>
<body>



	<!-- Primary Page Layout -->

	<div class="container">
		
		<div class="form-bg">
			<?php echo validation_errors(); ?>
			<?php echo form_open('verifylogin');?>
				<h2>Login To Inventory System</h2>
				<p><input type="text" placeholder="Username" name="username"></p>
				<p><input type="password" placeholder="Password" name="password"></p>
				<label for="remember">
				  <a href="#">Check store</a>
				</label>
				<button type="submit"></button>
			</form>
		</div>

	<!--
		<p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p>
		<p class="forgot">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	-->
	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>