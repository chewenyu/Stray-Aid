<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
	<title>Sign Up</title>
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
		input{font-family: Candal; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px;}
		option {font-family: Candal; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 18.5714px;}

	body
	{
		overflow-x: hidden;
		background-color:#D5F5E3;
	}
	.container3
		{
			position: absolute;
			left: 300px;
			width: 200px;
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
			text-align: center;
			min-height: 10vh;
		}
		#signup
		{	
			position: absolute;
			left:355px;
			bottom: 65px;
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
		#signup:hover
		{
			box-shadow:inset 200px 0 0 0 #51C2A8; 
		}
	.main-content 
	{
		width: 50%;
		height: 40%;
		margin:10px auto;
		color: white;	
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
					<h3 style="text-align: center;"><strong>Join Stray Aid</strong></h3><hr>
				</div>
				<div class="l-part">
					<form action="" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="email" class="form-control" name="u_email" placeholder="Email" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="password" type="password" class="form-control" name="u_pass" placeholder="Password" required="required"></div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class="form-control" name="u_country" required="required">
								<option disabled>Select Your Country</option>
								<option>Malaysia</option>
								<option>Singapore</option>
							</select>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class="form-control input-md" name="u_gender" required="required">
								<option disabled>Select Your Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="date" class="form-control input-md" name="u_birthday" placeholder="Birth Date" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<select class="form-control input-md" name="u_group" required="required">
								<option disabled>Register As?</option>
								<option name="user2" >Normal User</option>
								<option>Shelter</option>
							</select>
						</div><br>

						<a style="text-decoration: none; float: right;color:blacks	;"
						 data-toggle="tooltip" title="Sign In" href="login.php"><h5 style="color: black; position: relative;left: 10px;">Already Have An Account?</h5></a><br><br>
						 <div class="container3">
						 <center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
						</div>
						 <?php include("insert_user.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<div class="input-group">