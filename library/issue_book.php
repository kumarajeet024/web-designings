
<?php
include'connect.php';
include 'header1.html';

mysqli_query($connect,"CREATE TABLE IF NOT EXISTS issue_book(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
student_no VARCHAR(10) NOT NULL,
student_name VARCHAR(10) NOT NULL,
student_sem VARCHAR(9) NOT NULL,
contact VARCHAR(10) NOT NULL,
email VARCHAR(9) NOT NULL,
book_name VARCHAR(9) NOT NULL,
issue_date VARCHAR(9) NOT NULL,
return_date VARCHAR(9) NOT NULL,
username VARCHAR(9) NOT NULL

)");


?>


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

</head>

<body>

<h2 class="navigation">ISSUE BOOKS</h2>
<form action="" method="post">
<input type="text" name="stuno" placeholder="STUDENT NO.">
<input type="submit" name="search" value="SEARCH">

<?php
if(isset($_POST['search'])){
	
	$res=mysqli_query($connect, "SELECT * FROM registration where stuno='$_POST[stuno]'");
	while($row=mysqli_fetch_array($res)){
			$fname=$row['fname'];
	$lname=$row['lname'];
	$username=$row['username'];
	$password=$row['password'];
	$email=$row['email'];
	$contact=$row['contact'];
	$stuno=$row['stuno'];
	$branch=$row['branch'];

		
	}

	
?>
<br>
<input type="text" name="stuno" placeholder="STUDENT NO" class="form1" value="<?php echo $stuno;?>"><br>
<input type="text" name="student_name" placeholder="STUDENT NAME" class="form1" value="<?php echo $fname;?>"><br>
<input type="text" name="branch" placeholder="BRANCH" class="form1"value="<?php echo $branch;?>"><br>
<input type="text" name="contact" placeholder="CONTACT" class="form1" value="<?php echo $contact;?>"><br>
<input type="text" name="email" placeholder="EMAIL" class="form1" value="<?php echo $email;?>"><br>
<select name="bookname" class="form1">
<?php
$res=mysqli_query($connect, "SELECT book_name FROM add_books");
	while($row=mysqli_fetch_array($res)){
		echo "<option>";
		echo $row['book_name'];
		echo"</option>";
		
	}
?>
<br><input type="text" name="issue_date" placeholder="issue date" class="form1" value="<?php echo date("d-m-y");?>"><br>
<input type="text" name="return_date" class="form1" placeholder="RETURN DATE"><br>
<input type="text" name="username" placeholder="USERNAME" class="form1"value="<?php echo $username;?>"><br>
<input type="submit" name="issue" value="ISSUE" class="signup"> <br>

<?php

}
?>

</form>
<?php

if(isset($_POST['issue'])) {
	$qty=0;
	$res=mysqli_query($connect, "select * from add_books where book_name='$_POST[bookname]'");
	while($row=mysqli_fetch_array($res)){
		$qty=$row['available_qty'];
		
	}
	if($qty==0){
		echo "THIS BOOK IS OUT OF STOCK!!!";
		
	}else{
		$stuno=$_POST['stuno'];
	$student_name=$_POST['student_name'];
	$sem=$_POST['branch'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$bookname=$_POST['bookname'];
$issue_date=$_POST['issue_date'];
$return_date=$_POST['return_date'];
$username=$_POST['username'];

$sql = "INSERT INTO issue_book(student_no, student_name, student_sem, contact, email, book_name, issue_date, return_date, username)
VALUES ('$stuno','$student_name','$sem','$contact','$email','$bookname','$issue_date','$return_date','$username')";
	if(mysqli_query($connect,$sql)){
		echo "YOU HAVE REGISTERED SUCCESSFULLY!!";
	}else{
		echo"there is some error";

}
mysqli_query($connect, "update add_books set available_qty=available_qty-1 where book_name='$bookname'");
		
	}
	
	
}
?>



</body>



</html>

