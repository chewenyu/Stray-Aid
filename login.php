<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
	<title>Log In</title>
	<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	h1 { font-family: Candal; font-size: 26px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 29px; }
		h2 { font-family: Candal; font-size: 22px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 24px; } 
		h3 { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
		h4 { font-family: Candal; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; }
		h5 { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; } 
		p { font-family: Candal; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; } blockquote { font-family: Candal; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; } 
		pre { font-family: Candal; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }

	body
	{
			overflow-x: hidden;
			background-color:#D5F5E3;
	}
	.main-content 
	{
		width: 50%;
		height: 40%;
		margin:10px auto;	
		color:white;
		background-color:#B0DACB;
		border: 2px solid black;
		padding:40px 50px;
	}
	.header
	{
		border: 0px solid black;
		margin-bottom: 5px;
	}
	.well
	{
			background-color:#32936F;
	}
	#login
		{	
			position: absolute;
			left: 750px;
			bottom: 50px;
			width:200px;
			height: 50px;
			border:none;
			color: white;
			background-color:#70DAAD;
			border-radius: 4px;
			box-shadow: inset 0 0 0 0 #6CD2BA;
			transition: ease-out 0.3s;
			font-size: 16px;
			outline: none;
		}
		#login:hover
		{
			box-shadow:inset 200px 0 0 0 #51C2A8; 
		}
	.overlap-text
	{
		position: relative;
	}
	.overlap-text a
	{
		position: absolute;
		top: 5px;
		right:10px;
		font-size: 12pt;
		text-decoration: none;
		font-family:'Overpass Mono', monospace;
		letter-spacing: -1px;
	}
	.DHA
	{
		position: relative;
		top:-5px;
	}

</style>
<body>
<div class ="row">
		<div class ="col-sm-12">
			<div class ="well">
				<center><h1 style="color:white;">Stray Aid</h1></center>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align: center;"><strong>Log In to Stray Aid</strong></h3>
				</div>
				<div class="l-part">
					<form action="" method="post">
						<input type="email" name="email" placeholder="Email" required="required" class="form-control input-md"><br>
						<div class="overlap-text">
							<input type="password" name="pass" placeholder="Password" required="required" class="form-control input-md"><br>
							<a style="text-decoration: none; float:right; color:#1D3557;" data-toggle="tooltip" title="Reset Password" href="forgot_password.php"><h5>Forgot Password?</h5></a>
						</div>
						<div class="DHA">
						<a style="text-decoration: none; float: right;color:#1D3557;"
						 data-toggle="tooltip" title="Create an Account" href="signup.php"><h5>Don't have an Account?</h5></a><br><br>
						 </div>
						 <center><button id="login" class="btn btn-info btn-lg" style="color:#34495E;" name="login">Log In</button></center>
							<?php include("signin.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>