<?php
if(isset($_POST['submit']))
{
	$fname=$_POST['first-name'];
	$lname=$_POST['last-name'];
	$email=$_POST['email'];
	
	$to=$_POST['email']; 
	$from='kumarajeet024@gmail.com';
	$sub= "Confirmation mail";
	$message="CONGRATULATIONS!" .$fname." ".$lname." ". "You have successfully signed up with your email".$email. "Welcome to our group, we are ready to serve you";
	$fr="from:".$email;
	
	if(mail($to, $sub, $message, $fr))
	{
		echo'<h2>Thank you"." ".$fname.","."check your mail for confirmation."</h2>';
	}
	else{
		echo"Something went wrong!";
	}
}
?>