<?php  

	include'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">

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
	
	#username,#email,#password,#n_password{
	width:500px;
	background: transparent;
	border: none;
	outline: none;
	border-bottom: 1px solid blue;
	font-size:22px;
	margin-bottom: 16px;


	}
	
	#button{
			background:#e743c3;
	border-color: transparent;
	color: #fff;
	font-size:22px;
	font-weight: normal;
	letter-spacing:2px;
	margin-top:22px;

	}
	
	.click{
		font-size:30px;
		font-color:white;
	}
	</style>
</head>
<body>
<h1>SIGN UP </h1><br>
<div class="signup">

<form method="post" action="signup.php">
<input type="text" name="username" placeholder="ENTER USERNAME" id="username"><br>
<input type="text" name="email" placeholder="ENTER EMAIL" id="email"><br>
<input type="password" name="password" placeholder="PASSWORD" id="password"><br>
<input type="password" name="n_password" placeholder="ENTER PASSWORD AGAIN" id="n_password"><br>
<input type="submit" name="submit" value="SIGN UP" id="button"><br>
</form>
</div>
<div class="click">
<a href="login.php?id=login">CLICK HERE TO LOGIN</a>
</div>
</body>

</html>

<?php 

if(isset($_POST["submit"])) {
	
	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$n_password=$_POST["n_password"];
	
	if($password==$n_password){
	
	$sql = "INSERT INTO users(username, password, email)
VALUES ('$username','$password','$email')";
if (mysqli_query($connect, $sql)) {
    echo "1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

	echo "YOU HAVE SIGNED UP SUCCESSFULLY!!!!";
	
	}
	else{
		
		echo "PLEASE ENTER SAME PASSWORD";
	}
}


?>