
<?php
include 'connect.php';
include 'header1.html';
?>

<!DOCTYPE html>
<html>
<head>
<title>User registration</title>
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

</head>

<body>


<h2 class="navigation">NEW LIBRARIAN REGISTRATION</h2>
<form action="stu_regis.php" method="POST">

<input type="text" name="fname" placeholder="FIRST NAME" required="" class="form1"><br>
<input type="text" name="lname" placeholder="LAST NAME" required="" class="form1"><br>
<input type="text" name="username" placeholder="USERNAME" required="" class="form1"><br>
<input type="password" name="password" placeholder="PASSWORD" required="" class="form1"><br>
<input type="text" name="email" placeholder="EMAIL" required="" class="form1"><br>
<input type="text" name="contact" placeholder="CONTACT" required="" class="form1"><br>
</form>

</body>


</html>

<?php 

if(isset($_POST['submit'])) {
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	
$sql = "INSERT INTO lib_regis(fname, lname, username, password, email, contact)
VALUES ('$fname','$lname','$username','$password','$email','$contact')";
	if(mysqli_query($connect,$sql)){
		header("Location: lib_login.php");
	}else{
		echo"there is some error";
	}

}


?>