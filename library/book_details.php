<?php

include "connect.php";
include "header1.html";
?>

<?php

$i=0;
$res=mysqli_query($connect, "select * from add_books");
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
	echo "<b>"."Total:".$row['quantity']."</b>";
	echo "<br>";
	
	echo "<b>"."available:".$row['available_qty']."</b>";
	echo "<br>";
	?> <a href="student_info.php?book_name=<?php echo $row['book_name'];?>">Student Information</a> <?php
	
	echo "</td>";
	
	if($i==4){
		echo "</tr>";
		echo "<tr>";		
	}
}
echo "</tr>";
echo "</table>";


?>