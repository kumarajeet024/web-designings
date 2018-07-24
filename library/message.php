<?php
include "connect.php";
session_start();

mysqli_query($connect, "CREATE TABLE IF NOT EXISTS message(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
susername VARCHAR(100) NOT NULL,
dusername VARCHAR(900) NOT NULL,
title VARCHAR(900) NOT NULL,
message VARCHAR(900) NOT NULL,
read1 VARCHAR(900) NOT NULL

)");


?>


<form action="" method="post">
<select name="enr">
<?php
$res=mysqli_query($connect,"select * from registration");
	while($row=mysqli_fetch_array($res)){
		
		echo"<option>";
		echo $row['username']."(". $row['stuno']. ")";
		echo "</option>";
	}

?>


</select>
<br>
<input type="text" name="title" placeholder="TITLE HERE">
<br><b>Message:</b><br>
<textarea name="message" > </textarea><br>
<input type="submit" name="submit" value="Send Message">


</form> 


<?php
if(isset($_POST['submit'])){
	
	$res=mysqli_query($connect, "insert into message values('','$_SESSION[username]','$_POST[enr]','$_POST[title]','$_POST[message]','no')");


?>

<script type="text/javascript">
alert("MESSAGE SENT SUCCESSFULLY");

</script>

<?php
}
?>