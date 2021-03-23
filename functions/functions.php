<?php

$con = mysqli_connect("localhost","root","","FYP_App") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;

		$content = htmlentities($_POST['content']);
		$pet_type = htmlentities($_POST['pType']);
		$pet_breed = htmlentities($_POST['pBreed']);
		$pet_name = htmlentities($_POST['pName']);
		$pet_gender = htmlentities($_POST['pGender']);
		$pet_age = htmlentities($_POST['pAge']);
		$pet_location = htmlentities($_POST['pLocation']);

		$upload_image = $_FILES['upload_image']['name'];
		//$upload_image = $_POST['upload_image'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if($upload_image=='' && $content == '' && $pet_type == '' && $pet_name == '' && $pet_age == '' && $pet_gender == '' && $pet_location == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
					return;
				}else{
			move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "INSERT INTO posts (user_id, post_content,pet_type, pet_breed, pet_name, pet_age, pet_gender, pet_location,  upload_image, post_date) values('$user_id', '$content', '$pet_type', '$pet_breed', '$pet_name', '$pet_age', '$pet_gender', '$pet_location', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);}

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}


			/*
			if(strlen($upload_image) >= 1 && strlen($content) >= 1 && strlen($pet_type) >= 1 && strlen($pet_breed) >= 1 && strlen($pet_name) >= 1 && strlen($pet_age) >= 1 && strlen($pet_gender) >= 1 && strlen($pet_location) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_id, post_content,pet_type, pet_breed, pet_name, pet_age, pet_gender, pet_location,  upload_image, post_date) values('$user_id', '$content', '$pet_type', '$pet_breed', '$pet_name', '$pet_age', '$pet_gender', '$pet_location', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == '' && $pet_type == '' && $pet_name == '' && $pet_age == '' && $pet_gender == '' && $pet_location == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_id, post_content,pet_type, pet_breed, pet_name, pet_age, pet_gender, pet_location,  upload_image, post_date) values('$user_id', 'No', '$pet_type', '$pet_breed', '$pet_name', '$pet_age', '$pet_gender', '$pet_location', '$upload_image.$random_number', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_id, post_content,pet_type, pet_breed, pet_name, pet_age, pet_gender, pet_location, upload_image, post_date) values('$user_id', '$content', '$pet_type', '$pet_breed', '$pet_name', '$pet_age', '$pet_gender', '$pet_location', '$upload_image.$random_number', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}*/
		}
	}
}

function get_posts(){
	global $con;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,200);
		$pet_type = substr($row_posts['pet_type'], 0,200);
		$pet_breed = substr($row_posts['pet_breed'], 0,200);
		$pet_name = substr($row_posts['pet_name'], 0,200);
		$pet_gender = substr($row_posts['pet_gender'], 0,200);
		$pet_age = substr($row_posts['pet_age'], 0,200);
		$pet_location = substr($row_posts['pet_location'], 0,200);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];
		

		$user = "select *from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database

		if($content=="No" && $content=="No" && $pet_type=="No" && $pet_breed=="No" && $pet_name=="No" && $pet_age=="No" && $pet_gender=="No" && $pet_location=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($pet_type) >= 1 && strlen($pet_breed) >= 1 && strlen($pet_name) >= 1 && strlen($pet_age) >= 1 && strlen($pet_gender) >= 1 && strlen($pet_location) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p><p>Pet Type: $pet_type</p><p>Pet Breed: $pet_breed</p><p>Pet Name: $pet_name</p><p> Pet Gender: $pet_gender</p><p>Pet Age: $pet_age</p><p>Location of Pet: $pet_location</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
		else if( $content == "No" && strlen($pet_type) >= 1 && strlen($pet_breed) >= 1 && strlen($pet_name) >= 1 && strlen($pet_age) >= 1 && strlen($pet_gender) >= 1 && strlen($pet_location) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>Pet Type: $pet_type</p><p>Pet Breed: $pet_breed</p><p>Pet Name: $pet_name</p><p> Pet Gender: $pet_gender</p><p>Pet Age: $pet_age</p><p>Location of Pet: $pet_location</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if( strlen($content) >= 1 && strlen($pet_type) >= 1 && strlen($pet_breed) >= 1 && strlen($pet_name) >= 1 && strlen($pet_age) >= 1 && strlen($pet_gender) >= 1 && strlen($pet_location) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p><p>Pet Type: $pet_type</p><p>Pet Breed: $pet_breed</p><p>Pet Name: $pet_name</p><p> Pet Gender: $pet_gender</p><p>Pet Age: $pet_age</p><p>Location of Pet: $pet_location</p>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($pet_type) >= 1 && strlen($pet_name) >= 1 && strlen($pet_gender) >= 1 && strlen($pet_age) >= 1 && strlen($pet_location) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p><p>Pet Type: $pet_type</p><p>Pet Name: $pet_name</p><p> Pet Gender: $pet_gender</p><p>Pet Age: $pet_age</p><p>Location of Pet: $pet_location</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Commnet</button></a>
					<a href='adoptform.php?post_id=$post_id' style='position:relative;bottom:20px;'><button class='btn btn-info'>Adopt</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}

function single_post()
{
	if (isset($_GET['post_id'])) 
	{
		global $con;

		$get_id = $_GET['post_id'];

		$get_posts = "select * from posts where post_id = '$get_id'";

		$run_posts = mysqli_query($con, $get_posts);

		$row_posts = mysqli_fetch_array($run_posts);

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id = '$user_id' AND posts='yes'";

		$run_user = mysqli_query($con, $user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];


		$user_com = $_SESSION['user_email'];

		$get_com = "select * from users where user_email='$user_com'";

		$run_com = mysqli_query($con, $get_com);
		$row_com = mysqli_fetch_array($run_com);

		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];

		if (isset($_GET['post_id'])) 
		{
			$post_id = $_GET['post_id'];
		}

			$get_posts = "select post_id from users where post_id = '$post_id'";
			$run_user = mysqli_query($con, $get_posts);

			$post_id = $_GET['post_id'];

			$post = $_GET['post_id'];
			$get_user = "select * from posts where post_id='$post'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$p_id = $row['post_id'];

			if ($p_id != $post_id) 
			{
				echo "<script>alert('ERROR')</script>";
				echo "<script>window.open('home.php', '_self')</script>";
			}else
			{
				if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}	//else condition ending
			
			include("comments.php");

			echo 
			"
				<div class='row'>
					<div class='col-md-6 col-md-offset-3'>
						<div class='panel panel-info'>
							<div class='panel-body'>
								<form action='' method='post' class='form-inline'>
									<textarea placeholder = 'Write Your Comment Here!' class='pb-cmnt-textarea' name='comment'></textarea>
									<button class='btn btn-info pull-right' name='reply'>Comment</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			";

			if (isset($_POST['reply'])) {
				$comment = htmlentities($_POST['comment']);

				if ($comment == "") {
					echo "<script>alert('Enter Your Comment!')</script>";
					echo "<script>window.open('single.php?post_id='$post_id', '_self')</script>";
				}else
					{
						$insert = "insert into comments(post_id, user_id, comment, comment_author, date) values('$post_id', 
						'$user_id', '$comment', '$user_com_name', NOW() )";

						$run = mysqli_query($con, $insert);

						echo "<script>alert('Your Comment Has Been Added')</script>";
						echo "<script>window.open('single.php?post_id='$post_id', '_self')</script>";
					}
				}	

			}
		}
	}
	function user_posts()
	{
		global $con;

		if (isset($_GET['u_id'])) 
		{
			$u_id = $_GET['u_id'];
		}
		$get_posts = "select * from posts where user_id = '$u_id' ORDER by 1 DESC LIMIT 5";

		$run_posts = mysqli_query($con, $get_posts);

		while ($row_posts = mysqli_fetch_array($run_posts)) 
		{
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];

			$user = "select * from users where user_id='$user_id' AND posts='yes'";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			if (isset($_GET['u_id'])) 
			{
				$u_id = $_GET['u_id'];
			}
			$getuser = "select user_email from users where user_id='$u_id'";
			$run_user = mysqli_query($con, $getuser);
			$row = mysqli_fetch_array($run_user);

			$user_email = $row['user_email'];

			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);


			$user_id = $row['user_id'];
			$u_email = $row['user_email'];

			if ($u_email != $user_email) 
			{
				echo "<script>window.open('my_post.php?u_id=$user_id', '_self')</script>";
			}else
			{if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
			}
		}
	}

	function results()
	{
		global $con;

		if (isset($_GET['search'])) {
			$search_query = htmlentities($_GET['user_query']);
		}

		$get_posts = "select * from posts where post_content like '%$search_query%' OR upload_image like '%$search_query%'";

		$run_posts = mysqli_query($con, $get_posts);

		while ($row_posts = mysqli_fetch_array($run_posts)) {
			
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];

			$user = "select * from users where user_id='$user_id' AND posts='yes'";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$first_name = $row_user['f_name'];
			$last_name = $row_user['l_name'];
			$user_image = $row_user['user_image'];

			//displaying posts

			if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		}
	}

	function search_location()
	{
		global $con;
		$locationquery = "SELECT * FROM posts";
		$resultSet = mysqli_query($con, $locationquery);
		echo "<select name='s_location' id='s_location'>
				<option>--Select Location--</option>";
		while($rows = $resultSet->fetch_assoc())
		{
			$pet_location = $rows['pet_location'];
			echo "<option value='$pet_location'>$pet_location</option>";
		}
		echo "</select>";

		if(isset($_GET['location_search_btn']))
		{
			$getlocation = $_GET['s_location'];
			$getinfo = "SELECT * FROM posts WHERE pet_location = '$getlocation' ";
			$run_location = mysqli_query($con, $getinfo);

			while($row_location = mysqli_fetch_array($run_location))
			{
				$post_id = $row_location['post_id'];
				$user_id = $row_location['user_id'];
				$post_content = $row_location['post_content'];
				$pet_type = $row_location['pet_type'];
				$pet_breed = $row_location['pet_breed'];
				$pet_name = $row_location['pet_name'];
				$pet_age = $row_location['pet_age'];
				$pet_gender = $row_location['pet_gender'];
				$pet_location = $row_location['pet_location'];
				$upload_image = $row_location['upload_image'];
				$post_date = $row_location['post_date'];

				$user = "SELECT * FROM users WHERE user_id='$user_id'";
				$run_user = mysqli_query($con,$user);
				$row_user = mysqli_fetch_array($run_user);

				$user_name = $row_user['user_name'];
				$user_image = $row_user['user_image'];

				echo"
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
							<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; font-family: Candal; cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-4'>
						</div><br><br>
						<div class='col-sm-12'>
							<p>$post_content</p><p>Pet Type: $pet_type</p><p>Pet Breed: $pet_breed</p><p>Pet Name: $pet_name</p><p> Pet Gender: $pet_gender</p><p>Pet Age: $pet_age</p><p>Location of Pet: $pet_location</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br><br>
			
				";
			}
		}
		
	}

	function search_user()
	{
		global $con;

		if (isset($_GET['search_user_btn']))
		{	
			$search_query = htmlentities($_GET['search_user']);
			$get_user = "select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name
			like '%$search_query%' ";
		}
		else{

			$get_user = "select * from users";
		}


		$run_user = mysqli_query($con, $get_user);

				
		while ($row_user = mysqli_fetch_array ($run_user)) 
		{
			$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];
 
			echo "
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people'>
						<div class='col-sm-4'>
							<a href='user_profile.php?u_id=$user_id'>
							<img src='users/$user_image' width='150px' height='140px' title='$username'
							style='float:left; , margin:1px;'/></a>
						</div><br><br>
						<div class='col-sm-6'>
							<a style='text-decoration:none;cursor:pointer;color:blue;' href= 'user_profile.php?u_id=$user_id'>
							<strong><h2>$f_name $l_name</h2></strong>
							</a>
						</div>
						<div class='col-sm-3'>
						</div>
					</div>
				</div>
				<div class='col-sm-4'>
				</div>
			</div><br>


			";


		}

	}
?>
