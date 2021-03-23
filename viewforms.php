<!DOCTYPE html>
<html>
<head>
	<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<title>View Applications</title>
	  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
	<style>
		h3 { font-family: Candal; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
		h4 { font-family: Candal; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
		h5 { font-family: Candal; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 500; }
		
	</style>
</head>
<body>
	
	<a href="home.php"><button class="form-control input-md" style="width: 125px; height: 50px; position: absolute; top: 20px; left:100px; background-color: #D5D8DC;"><h5>Back</h5></button></a>

</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","FYP_App") or die("Connection was not established");


$search = "SELECT p.*, f.* FROM posts AS p INNER JOIN forms AS f ON p.post_id = f.post_id ORDER BY post_date DESC";
$applicaton = mysqli_query($con, $search);	

while($rows = mysqli_fetch_array($applicaton))
{
	$fname = $rows['firstname'];
	$lname = $rows['lastname'];
	$desc = $rows['description'];
	$contact = $rows['contact'];
	$address = $rows['address'];
	$petType = $rows['pet_type'];
	$petBreed = $rows['pet_breed'];
	$petName = $rows['pet_name'];
	$petAge = $rows['pet_age'];
	$petGender = $rows['pet_gender'];
	$petLocation = $rows['pet_location'];

	echo 
		"
		<style>

			.form
			{
				text-align:center;
				border:2px solid black;
				background-color:#D6EAF8;
				width:400px;
				position:relative;
				left:36.5%;
			}
			.frm-particulars
			{

				color:#566573;
				border:1px solid black;
				width: 250px;
				position: relative;
				left: 18%;
			}
		</style>
				<div><br></div>
					<div class='form'>
					<h4>Pet Type: $petType</h4>
					<h4>Pet Breed: $petBreed</h4>
					<h4>Pet Name: $petName</h4>
					<h4>Pet Age: $petAge</h4>
					<h4Pet Gender: $petGender</h4>
					<h4>Pet Location: $petLocation</h4>
						<div class='frm-particulars'>
							<h3>First Name: $fname</h3>
							<h3>Last Name: $lname</h3>
							<h3>Contact Info: $contact</h3>
							<h3>Address: $address</h3>
							<br>
						</div>
					</div>
					<div class='space'>
					<br>
					</div>


		";
}



?>
<!--
$post_id = $_GET[''];
$form_id = $_GET[''];
$fname = $_GET[''];
$lname = $_GET[''];
$desc = $_GET[''];
$ptype = $_GET[''];
$pbreed = $_GET[''];
$pname = $_GET[''];
$pgender = $_GET[''];
$page = $_GET[''];
$plocation = $_GET[''];-->
