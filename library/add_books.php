<?php

include 'connect.php';
include 'header1.html';
?>
<?php

mysqli_query($connect,"CREATE TABLE IF NOT EXISTS add_books(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
book_name VARCHAR(10) NOT NULL,
book_image VARCHAR(90) NOT NULL,
auhtor_name VARCHAR(9) NOT NULL,
publication VARCHAR(90) NOT NULL,
purchase_date VARCHAR(9) NOT NULL,
price VARCHAR(9) NOT NULL,
quantity VARCHAR(9) NOT NULL,
available_qty VARCHAR(9) NOT NULL

)");
?>

<!DOCTYPE html>
<html>

<head>
<title>ADDING BOOKS</title>
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
<h1 class="navigation">NEW BOOKS ADDITION</h1>
<form action="add_books.php" method="POST">

<input type="text" name="book_name" placeholder="BOOK NAME" class="form1"><br>
<input type="file" name="book_img" placeholder="BOOK IMAGE"class="form1"><br>
<input type="text" name="book_author_name" placeholder="BOOK AUTHOR NAME"class="form1"><br>
<input type="text" name="publication_name" placeholder="PUBLICATION NAME" class="form1"><br>
<input type="text" name="purchase_date" placeholder="PURCHASE DATE" class="form1"><br>
<input type="text" name="price" placeholder="BOOK PRICE" class="form1"><br>
<input type="text" name="quantity" placeholder="QUANTITY"class="form1"><br>
<input type="text" name="availability" placeholder="AVAILABLE QUANTITY"class="form1"><br>
<input type="submit" name="btn" value="INSERT BOOK DETAILS"class="signup"><br>

</form>
</body>
</html>





<?php

if(isset($_POST['btn'])){

$query="CREATE TABLE IF NOT EXISTS add_books(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
book_name VARCHAR(10) NOT NULL,
book_image VARCHAR(90) NOT NULL,
auhtor_name VARCHAR(9) NOT NULL,
publication VARCHAR(90) NOT NULL,
purchase_date VARCHAR(9) NOT NULL,
price VARCHAR(9) NOT NULL,
quantity VARCHAR(9) NOT NULL,
available_qty VARCHAR(9) NOT NULL

)";

	
	$book_name=$_POST['book_name'];
	$book_img=$_POST['book_img'];
	$author_name=$_POST['book_author_name'];
	$pub_name=$_POST['publication_name'];
	$date=$_POST['purchase_date'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$ava=$_POST['availability'];
	
	$sql = "INSERT INTO add_books(book_name, book_image, auhtor_name, publication, purchase_date, price, quantity, available_qty)
VALUES ('$book_name','$book_img','$author_name','$pub_name','$date','$price','$quantity','$ava')";
	if(mysqli_query($connect,$sql)){
		echo "YOU HAVE ADDED NEW BOOK DETAILS SUCCESSFULLY!!";
	}else{
		echo"there is some error";

	}
	
}
?>