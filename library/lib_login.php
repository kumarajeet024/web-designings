


<!DOCTYPE html>
<html>
<head>
<style>

form {
	margin:60px;
	transition:all 4s ease-in-out;
	text-align:center;
}
.form1{
	width:500px;
	background: transparent;
	border: none;
	outline: none;
	border-bottom: 1px solid gray;
	font-size:22px;
	margin-bottom: 16px;
}
input{
	height: 50px;
}
form .signup{
	background:#55efc4;
	border-color: transparent;
	color: #fff;
	font-size:22px;
	font-weight: normal;
	letter-spacing:2px;
	margin-top:22px;
	
}

</style>


<title> LIBRARIAN LOGIN </title>
</head>
<body>
<h2 class="navigation">LIBRARIAN LOGIN</h2><br>

<form action="" method="POST">

<input type="text" name="username" placeholder="USERNAME" class="form1"><br>
<input type="password" name="password" placeholder="PASSWORD" class="form1"><br>
<input type="submit" name="submit" value="LOG IN" class="signup">

</form>

</body>


</html>


<?php

 session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect,"library");

$logcheck = mysqli_query($connect,"SELECT * FROM lib_regis WHERE username='$username' ");

$nrow = mysqli_num_rows($logcheck);

if($nrow!=0){
	while($rows= mysqli_fetch_assoc($logcheck)){
		$dbusername = $rows['username'];
		$dbpassword= $rows['password'];
	}
	if($username==$dbusername && $password==$dbpassword) {
		echo "YOU HAVE SUCCESSFULLY LOGGED IN !!!!!".$username;
		$_SESSION['username']=$username;
		
        header("Location: admin_panel.html");


		
	}else{
		
		echo "PLEASE ENTER CORRECT USERNAME AND PASSWORD !!!";
	}
}
