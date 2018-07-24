<?php

include "connect.php";
include 'header1.html';
?>
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

<h2 class="navigation">SEARCH BOOKS</h2>
<form action="" method="post">
<input type="text" name="search_book" placeholder="ENTER BOOK NAME" class="form1">
<input type="submit" name="submit" value="SEARCH"class="signup"><br>

</form>

<?php

if(isset($_POST['submit'])){
	$i=0;
$res=mysqli_query($connect, "select * from add_books where book_name like('$_POST[search_book]%')");
echo "<table>";
echo "<tr>";
while($row=mysqli_fetch_array($res)) 
{	$i=$i+1;
	echo "<td>";
	?> <img src="<?php echo $row['book_img'];?>" height="100" width="100">
	<?php
	
	echo "<br>";
	echo "<b>".$row['book_name']."</b>";
	echo "<br>";
	echo "<b>"."available:".$row['available_qty']."</b>";
	echo "</td>";
	
	if($i==4){
		echo "</tr>";
		echo "<tr>";		
	}
}
echo "</tr>";
echo "</table>";

	
}else{
	
	$i=0;
$res=mysqli_query($connect, "select * from add_books where available_qty>0");
echo "<table>";
echo "<tr>";
while($row=mysqli_fetch_array($res)) 
{	$i=$i+1;
	echo "<td>";
	?> <img src="<?php echo $row['book_img'];?>" height="100" width="100">
	<?php
	
	echo "<br>";
	echo "<b>".$row['book_name']."</b>";
	echo "<br>";
	echo "<b>"."available:".$row['available_qty']."</b>";
	echo "</td>";
	
	if($i==4){
		echo "</tr>";
		echo "<tr>";		
	}
}
echo "</tr>";
echo "</table>";

}

?>