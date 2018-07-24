<?php
include "connect.php";
session_start();
?>


<?php
$res=mysqli_query($connect, "update message set read1='y' where dusername='$_SESSION[username]'");




?>
<table>
<tr>
<th>Full name</th>
<th>title</th>
<th>message</th>

</tr>
<?php
$res=mysqli_query($connect, "select * from message where dusername='$_SESSION[username]' order by id desc");
while($row=mysqli_fetch_array($res)){
	$res1=mysqli_query($connect, "select * from lib_regis where username='$row[susername]' ");
	while($row1=mysqli_fetch_array($res)){
		$fullname=$row1["fname"]." ".$row1["lname"];
	}
	echo "<tr>";
	echo "<td>"; echo $fullname; echo "</td>";
	echo "<td>"; echo $row['title']; echo "</td>";
	echo "<td>"; echo $row['message']; echo "</td>";
	echo "</tr>";
}
?>

</table>