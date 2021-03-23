<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
<?php 
session_start();
include("includes/header.php");

if (!isset($_SESSION['user_email']))
{
	header("location: index.php");
}
?>
<html>
<head>

	<?php
		$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email = '$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);
				$user_name = $row['user_name'];
				$user_group = $row['user_group'];
				$_SESSION['user_id'] = $row['user_id'];
	?>
	<title><?php echo "$user_name"; ?></title>
<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  <style>
  	h3 { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
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
  </style>
</head>


<body>
<?php
 	if ($user_group == "Shelter") { ?>
	<div class="row">
		<div id="insert_post" class="col-sm-12">
			<center>
			<form action="home.php?id=<?php echo $user_id; ?>" method = "post" id="f" enctype="multipart/form-data">
				<table class="table1" border="1">
				<tr>
				<td>
				Type Of Pet: </td><td><select class="form-control input-md" name="pType" required="required">
					<option class="form-control input-md" disabled>Choose Pet Type</option>
					<option>Dog</option>
					<option>Cat</option>
					<option>Reptile</option>
					</select></td></tr><br>
					<tr><td>
					Pet Breed: </td><td><input class="form-control input-md" type="text" name="pBreed" placeholder="Pet Breed">
					</td></tr><br>
					<tr><td>Name Of Your Pet: </td><td><input class="form-control input-md" type="text" name="pName" placeholder="Pet Name" required="required"></td></tr><br>
					<tr><td>Pet Gender : </td><td><select class="form-control input-md" name="pGender" required="required">
						<option disabled>Select the Gender</option>
						<option>Male</option>
						<option>Female</option></td>
					</select></tr><br>
					<tr><td>Age Of Pet: </td><td><input class="form-control input-md" type="text" name="pAge" placeholder="Pet Age" required="required"></td></tr><br>
					<tr><td>Location Of Pet: </td><td><input class="form-control input-md" type="text" name="pLocation" placeholder="Location of Pet" required="required"></td></tr><br>
				</table><br>
				<textarea class="form-control input-md" id="content" rows="5" name="content" placeholder="Description" required="required"></textarea><br>
				<label class="btn btn-warning" id="upload_image_button">
				Select Image<input type="file" name="upload_image" size="30">
				</label>
				<button id="btn-post" class="btn btn-success" name="sub">
					Post
				</button>
			</form>
			<?php insertPost();?>
		</center>
		</div>
	</div>
<?php }	?>
	<div class="row">
		<div class="col-sm-12">
			<center><h3><strong>News Feed</strong></h3><br></center>
			<?php echo get_posts(); ?>
		</div>
	</div>
</body>
</html>