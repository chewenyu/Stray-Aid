<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
	<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		h1 { font-family: Candal; font-size: 26px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 29px; }
		h2 { font-family: Candal; font-size: 22px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 24px; } 
		h3 { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
		h4 { font-family: Candal; font-size: 18px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px; } 
		p { font-family: Candal; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; } blockquote { font-family: Candal; font-size: 21px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 30px; } 
		pre { font-family: Candal; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px; }

		body
		{
			overflow-x: hidden;
			background-color:#D5F5E3;
		}
		#centered1
		{
			position: absolute;
			font-size: 10vw;
			top:30%;
			left:30%;
			transform: translate(-50%, -50%);
		}
		#centered2
		{
			position: absolute;
			font-size: 10vw;
			top:50%;
			left:27%;
			transform: translate(-50%, -50%);
		}
		#centered3
		{
			position: absolute;
			font-size: 10vw;
			top:70%;
			left:32.5%;
			transform: translate(-50%, -50%);
		}
		.well
		{
			background-color:#32936F;
		}
		.container
		{
			position: absolute;
			left: 100px;
			width: 200px;
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
			text-align: center;
			min-height: 10vh;
		}
		.btn-1
		{	
			position: absolute;
			left:10px;
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
		.btn-1:hover
		{
			box-shadow:inset 200px 0 0 0 #51C2A8; 
		}
		.container2
		{
			width: 200px;
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
			text-align: center;
			min-height: 10vh;
		}
		.btn-2
		{	
			position: relative;
			top: 30px;
			left: 95px;
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
		.btn-2:hover
		{
			box-shadow:inset 200px 0 0 0 #51C2A8; 
		}

	</style>

	<title>Stray Aid Login/Sign Up</title>
</head>
<body>
	<div class ="row">
		<div class ="col-sm-12">
			<div class ="well">
				<center><h1 style="color:white;">STRAY AID</h1></center>
			</div>
			
		</div>
	</div>
	<div class="row">
		<div class ="col-sm-6" style ="left:0.5%;">
			<img src="webimages/indexpix2.jfif" style="opacity: 0.7;" class="img-rounded" title="Stray Aid" width="650px" height="565px">
		<div id="centered1" class="centered"><h3 style="color:black;"><span class="glyphicon glyphicon-search">
			</span>&nbsp&nbsp<strong>Help Strays Find a Home</strong></h3></div>
		<div id="centered2" class="centered"><h3 style="color:black;"><span class="glyphicon glyphicon-search">
			</span>&nbsp&nbsp<strong>Adopt Loving Strays</strong></h3></div>
		<div id="centered3" class="centered"><h3 style="color:black;"><span class="glyphicon glyphicon-search">
		</span>&nbsp&nbsp<strong>Reduce The Stray Population</strong></h3></div>
		</div>
			<div class="col-sm-6" style="left:8%:">
				<img src="webimages/logo1.jpg" class="img-rounded" title="Stray Aid" width="200px" height="150px">
				<h2 style="color:#black;"><strong>See What's Happening In The Animal Community Today!</strong></h2><br8><br>
				<h3 style="color:#black;"><strong>Join Stray Aid Now!</strong></h3><br><br>
				<form method="post" action="">
					<div class="container">
					<button class="btn-1" name="signup">
						Sign Up
					</button>
					</div>
					<br><br>
					<?php 
						if(isset($_POST['signup']))
						{
							echo "<script>window.open('signup.php','_self')</script>";
						}
					?>
					<div class="container2">
					<button id="login" class="btn-2" name="login">
						Log In
					</button>
					</div>
					<br><br>
					<?php 
						if(isset($_POST['login']))
						{
							echo "<script>window.open('login.php','_self')</script>";
						}
					?>
				</form>
			</div>
	</div>
</body>
</html>