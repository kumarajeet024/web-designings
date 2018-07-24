<?php
include "connect.php";
include 'header1.php';
?>
<style>

body {
  background: #EEE;
  margin: 0;
  padding: 0;
}

/* Navigation */

.navigation {
  box-sizing: border-box;
  background-color: #3587A4;
  overflow: auto;
  padding: 18px 50px;
  position: relative;
  top: 0;
  width: 100%;
  z-index: 999;
}

ul {
  padding: 0;
  margin: 0;
}

li {
  color: #FFF;
  display: inline-block;
  font-family: 'Oxygen', sans-serif;
  font-size: 16px;
  font-weight: 300;
  letter-spacing: 2px;
  margin: 0;
  padding: 20px 18px 10px 18px;
  text-transform: uppercase;
}

.active {
  color: #88CCF1;
}

/* Table */

table {
  height: 40%;
  left: 10%;
  margin: 20px auto;
  overflow-y: scroll;
  position: static;
  width: 80%;
}

th {
  background: #88CCF1;
  color: #FFF;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
  font-weight: 100;
  letter-spacing: 2px;
  text-transform: uppercase;
}

tr {
  background: #f4f7f8;
  border-bottom: 1px solid #FFF;
  margin-bottom: 5px;
}

th, td {
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  font-size:18px;
  padding: 20px;
  text-align: left;
  width: 33.3333%;
}

.search {
  background-color: #FFF;
  border: 1px solid #DDD;
  border-radius: 3px;
  color: #AAA;
  padding: 20px;
  margin: 50px auto 0px auto;
  width: 77%;
}
</style>
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


<form action="" method="post">
<select name="enr" class="form1">
<?php
$res=mysqli_query($connect,"select student_no from issue_book where return_date=''");
	while($row=mysqli_fetch_array($res)){
		
		echo"<option>";
		echo $row['student_no'];
		echo "</option>";
	}

?>


</select>
<input type="submit" name="submit" value="RETURN BOOK"class="signup">


</form>

<?php

if(isset($_POST['submit'])) {
	$res=mysqli_query($connect, "select * from issue_book where student_no='$_POST[enr]'");
	echo"<table>"; 
echo"<tr>"; 
echo"<th>"; echo"Student NO"; echo"</th>";
echo"<th>"; echo"Name"; echo"</th>";
echo"<th>"; echo"Branch"; echo"</th>";
echo"<th>"; echo"contact"; echo"</th>";
echo"<th>"; echo"Email"; echo"</th>";
echo"<th>"; echo"issue date"; echo"</th>";
echo"<th>"; echo"return date"; echo"</th>";


while($row=mysqli_fetch_array($res)){
	
	echo"</tr>"	;
echo"<td>"; echo $row['student_no']; echo"</td>";
echo"<td>"; echo $row['student_name']; echo"</td>";
echo"<td>"; echo $row['student_sem']; echo"</td>";
echo"<td>"; echo $row['contact']; echo"</td>";
echo"<td>"; echo $row['email']; echo"</td>";
echo"<td>"; echo $row['issue_date']; echo"</td>";
echo"<td>"; ?> <a href="return.php?id=<?php echo $row['id']; ?>">Return book</a><?php echo"</td>"; 


	
}
echo "</table>";

	
}

?>