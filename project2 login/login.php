<html>
<head>
<style>
body{
		
		text-align:center;
		margin-top:50px;
		background-color:#89c484;
		
	}
	

h1{
	
	padding-bottom:30px;
		font-size:40px;
		    font-family: 'Handlee', cursive;
color:white;
}

.form{
	width:500px;
	background: transparent;
	border: none;
	outline: none;
	border-bottom: 1px solid blue;
	font-size:22px;
	margin-bottom: 16px;

	
}
#button1{
	
background:#e743c3;
	border-color: transparent;
	color: #fff;
	font-size:22px;
	font-weight: normal;
	letter-spacing:2px;
	margin-top:22px;
	
}

</style>
</head>
<body>

<h1>LOGIN</h1>
<form action="login.php" method="POST">

<input type="text" name="username" class="form" placeholder="USERNAME"><br>
<input type="text" name="password" class="form" placeholder="PASSWORD"><br>
<input type="submit" name="submit" value="Login" id="button1">
</form>
</body>

</html>







<?php

 session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect,"signup");

$logcheck = mysqli_query($connect,"SELECT * FROM users WHERE username='$username' ");

$nrow = mysqli_num_rows($logcheck);

if($nrow!=0){
	while($rows= mysqli_fetch_assoc($logcheck)){
		$dbusername = $rows['username'];
		$dbpassword= $rows['password'];
	}
	if($username==$dbusername && $password==$dbpassword) {
		echo "YOU HAVE SUCCESSFULLY LOGGED IN !!!!!".$username;
		$_SESSION['username']=$username;
		
	}else{
		
		echo "PLEASE ENTER CORRECT USERNAME AND PASSWORD !!!";
	}
}

?>