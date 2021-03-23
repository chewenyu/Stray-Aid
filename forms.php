<?php
$con = mysqli_connect("localhost","root","","FYP_App") or die("Connection was not established"); 

$post = "INSERT INTO forms (firstname, lastname, description) VALUES ('john', 'wick', 'hi there');";
$check = mysqli_query($con, $post);

header("Location:home.php");
?>

