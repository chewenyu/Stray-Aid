<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
<title>Forgot Password</title>
<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

  	strong { font-family: Candal; font-size: 26px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 29px; }
  	h3 { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
  	pre { font-family: Candal; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 600; line-height: 15.4px;}
  	a { font-family: Candal; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 15.4px;}
  	input { font-family: Candal; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 500; line-height: 15.4px;}
  	button { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
  	table, td, tr { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
  	#content { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
  	#btn-post
  	{
  		{ font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}bt
  	}
  	.table1
  	{
  		border-radius: 20px;
  	}
  	.row{
  		background-color:;
  	}

  body
  	{
  		overflow-x: hidden;
  		background-color:#D5F5E3;
  	}
  	.main-content
  	{
  		width: 50%;
  		height: 40%;
  		margin: 10px auto;
  		background-color:#B0DACB;
  		border:2px solid black;
  		padding: 40px 50px;
  	}
  	.header
  	{
  		border:0px solid #000;
  		margin-bottom: 5px;
  	}
  	.well
  	{
  		background-color:#32936F;
  	}
  	#signup
		{	
			position: absolute;
			left: 770px;
			bottom: 20px;
			width:200px;
			height: 45px;
			border:none;
			color: white;
			background-color:#70DAAD;
			border-radius: 4px;
			box-shadow: inset 0 0 0 0 #6CD2BA;
			transition: ease-out 0.3s;
			font-size: 16px;
			outline: none;
		}
		#signup:hover
		{
			box-shadow:inset 200px 0 0 0 #51C2A8; 
		}

  </style>
</head> 
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color: white"><strong>Stray Aid</strong></h1></center>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align: center;"><strong>Forgot Password?</strong></h3><hr>
				</div>
				<div class="l_pass">
					<form action="" method="POST">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="email" class="form-control" name="email" placeholder="Enter Your Email" required="required"></input>
						</div><hr>
						<pre class="text">Enter Your Best Friends Name Down Below!</pre>
						<div class="input-group">
							<span class="input-group-addon"> <i class="glyphicon glyphicon-pencil"></i></span>
							<input id="msg" type="text" class="form-control" placeholder="Best Friend's Name" name="recovery_account" required="required"></input>
						</div><br>
						<a style="text-decoration: none; float: right;color: black;"
						 data-toogle="tooltip" title="Login" href="login.php">Back To Login?</a>
						 <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
session_start();

include("includes/connection.php");

	if(isset($_POST['submit']))
	{
		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['recovery_account']));

		$select_user = "select * from users where user_email='$email' AND recovery_account='$recovery_account'";

		$query = mysqli_query($con, $select_user);

		$check_user = mysqli_num_rows($query);

		if ($check_user == 1)
		{
			$_SESSION['user_email'] = $email;

			echo"<script>window.open('change_password.php', '_self')</script>";
		}else
		{
			echo"<script>alert('Your Email or Password is Incorrect')</script>";
		}
	}
?>