<!DOCTYPE html>
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
	<title>Edit Your Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
	<div class="row">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			<?php 
				if (isset($_GET['post_id'])) 
				{
					$post_info = $_GET['post_id'];

					$get_post = "SELECT * FROM posts WHERE post_id ='$post_info'";

					$check_post = mysqli_query($con, $get_post);

					$sql = mysqli_fetch_array($check_post);

					$posts = $sql['post_content'];

				}	

			?>

			<form action="" method="POST" id ="f">
				<center><h2>Edit Your Post:</h2><br>
				<textarea class="from-control" cols="83" rows="4" name="content"><?php echo "$posts";?></textarea><br>
				<input type="submit" name="update" value="Update Post" class="btn btn-info"></center>
			</form>
			<?php 

			if (isset($_POST['update'])) 
			{
				$content = $_POST['content'];

				$edit = "UPDATE posts SET post_content='$content' WHERE post_id = '$post_info'";
				$perf_edit = mysqli_query($con, $edit);

				if ($edit) {
					echo "<script>alert('Your Post Has Been Successfully Updated')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}
				
			}


			?>

		</div>

		<div class="col-sm-3"></div>
	</div>
</body>
</html>