<?php
include("includes/connection.php");

	if (isset($_POST['sign_up'])) 
	{
		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		$birthday = htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
		$user_type = htmlentities(mysqli_real_escape_string($con,$_POST['u_group']));
		$status = "verified";
		$posts = "no";
		$newgid = sprintf('%05d', rand(0,999999));

		$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
		$check_username_query = "select user_name from users where user_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		if (strlen($pass) <9) 
		{
			echo"<script>alert('Password should contain a minimum of 9 characters')</script>";
			exit();
		}

		$check_email = "select * from users where user_email='$email'";
		$run_email = mysqli_query($check_email);

		$check = mysqli_num_rows($run_email);

		if ($check==1)
		{
			echo"<script>alert('Email already exists. Please try using another emial')</script>";
			echo"<script>window.open('signup.php','_self')</script>";
			exit();
		}

		$rand = rand(1, 3); // Random number between 1 and 3

			if($rand == 1)
			 	$profile_pic = "profpic.png";
			else if ($rand == 2)
			 	$profile_pic = "profpic2.png";
			 else if ($rand == 3)
			 	$profile_pic = "profpic3.png";

		$insert = "insert into users (f_name, l_name, user_name, describe_user, Relationship, user_pass, user_email, user_country,
		user_gender, user_birthday, user_image, user_cover, user_reg_date, status, posts, recovery_account,user_group)
		 values('$first_name','$last_name','$username','Hello! We are Stray Aid!', '...', '$pass', '$email',
		 '$country', '$gender', '$birthday', '$profile_pic', 'dogwp.jpeg',NOW(),'$status', '$posts', 'Iwanttoputading intheuniverse.', '$user_type')";

		$query = mysqli_query($con, $insert);

		if ($query)
		 { 	 
			echo"<script>alert('Well Done $first_name, you are good to go.')</script>";
			echo"<script>window.open('login.php','_self')</script>";
		}
		else
		{
			echo"<script>alert('Registration Failed. Please Try Again!')</script>";
			echo"<script>window.open('signup.php','_self')</script>";
		}

		if($user_type == "user2")
		{
			user_group == "normal user";
		}
		else if($user_type == "user1")
		{
			user_group == "admin";
		}
	}
?>