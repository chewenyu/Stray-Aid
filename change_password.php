<!DOCTYPE html>
<?php 
session_start();
include("includes/connection.php");

if (!isset($_SESSION['user_email']))
{
	header("location: index.php");
}
?>
<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>

h3 { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
strong { font-family: Candal; font-size: 26px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
button { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
input { font-family: Candal; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}

	body{
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
		border:0px solid black;
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
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color:white;"><strong>Stray Aid</strong></h1></center>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align:center;">Change Your Password</h3>
				</div>
				<br>
				<div class="l_pass">
					<form action="" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" class="form-control" name="pass" placeholder="New Password (9 or More Characters)" required>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" class="form-control" placeholder="Re-enter New Password" name="pass1" required>
						</div><br><br>
						<center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
	if(isset($_POST['change']))
	{

		$user = $_SESSION['user_email'];
		$get_user = "select *from users where user_email='$user'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);

		$user_id = $row['user_id'];

		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
		$pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

		if($pass == $pass1)
		{
			if(strlen($pass) >= 9 && strlen($pass) <= 60)
			{
				$update = "update users set user_pass='$pass' where user_id='$user_id'";

				$run = mysqli_query($con, $update);
				echo"<script>alert('Your Password was changed a moment ago')</script>";
				echo"<script>window.open('home.php', '_self')</script>";
			}else
			{
				echo"<script>alert('Your Password should be greater than 9 characters')</script>";
			}
		}
			else
			{
				echo"<script>alert('Your Password did not match')</script>";
				echo"<script>window.open('change_password.php', '_self')</script>";
			}
		}
?>
