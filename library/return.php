<?php
include "connect.php";
$id=$_GET['id'];
$a=date("d-m-y");
$res=mysqli_query($connect, "update issue_book set return_date='$a' where id='$id'");

$book_name='';

$sql=mysqli_query($connect, "select * from issue_book where id='$id'");
	while($row=mysqli_fetch_array($sql))
	{
		$book_name=$row['book_name'];
		
	}
	mysqli_query($connect, "update add_books set available_qty=available_qty+1 where book_name='$book_name'");

?>