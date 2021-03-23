<?php 
if(isset($_POST['submit_btn']) && $_POST['submit_btn'] == 'Submit'){
$con = mysqli_connect("localhost","root","","FYP_App") or die("Connection was not established"); 

$fname = htmlentities($_POST['fname']);
$lname = htmlentities($_POST['lname']);
$post_id = htmlentities($_POST['postId']);
$description= htmlentities($_POST['extra']);
$contact= htmlentities($_POST['contact']);
$add= htmlentities($_POST['address']);
$insert = "INSERT INTO forms (firstname, lastname, description, post_id, contact, address ) VALUES ('$fname', '$lname', '$description', '$post_id', '$contact', '$add')";
$do = mysqli_query($con, $insert);
//$con->query($insert);

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Submission</title>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Candal" />
	<meta charseta="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
  <style>
    h3 { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
    input  { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
    textarea  { font-family: Candal; font-size: 20px; font-style: normal; font-variant: normal; font-weight: 700; line-height: 15.4px;}
  	
  	.container
  	{
  		text-align: center;
  		position: relative;
  		top: 100px;
  		border: 2px solid black;
  		width:40%;
  		height: 600px;
  	}
  	h3 {
  		text-align: center;
  		position: relative;
  		top: 100px;
  	}

  </style>
</head>
<body>
	<h3>Wish to Adopt?</h3>
	<div class="container">
		<?php if(!isset($_POST['submit_btn'])){ ?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

	<br><input class="form-control input-md" type="text" name="fname" placeholder="First Name" required="required"><br><br>
	<input class="form-control input-md" type="text" name="lname" placeholder="Last Name" required="required"><br><br>
	<input class="form-control input-md" type="text" name="contact" placeholder="Your Contact" required="required"><br><br>
	<input class="form-control input-md" type="text" name="address" placeholder="Your Address" required="required"><br><br>
	<textarea class="form-control input-md" rows="10" cols="80" name="extra" placeholder="Description(optional)"></textarea> 
	<!--<button type="submit" name="submit_btn" value="ok" >Submit</button> -->
	<input type="hidden" name="postId" value="<?php echo $_GET['post_id'] ?>" /><br>
	<input class="form-control input-md" type="submit" name="submit_btn" value="Submit">
<?php }
else{?>
	echo "<script>alert('Thank You For Your Interest. We Will Contact You Soon On The Adoption Status.')</script></script>";
  echo "<script>window.open('home.php', '_self')</script>";
<?php }?>
</form>
</div>
</body>
</html>
