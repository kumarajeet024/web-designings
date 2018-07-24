<?php

include'header1.html';
include'connect.php';

?>
<html>
<head>

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
}</style>
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

<h2 class="navigation">SEARCH BOOKS</h2>

<form action="display_book.php" method="POST" class="search">

<input type="text" name="book" placeholder="ENTER BOOK NAME" class="form1"><br>
<input  type="submit" name="search" value="SEARCH"class="signup"><br>
</form>

</body>

</html>
<?php

if(isset($_POST['search'])){
	$query="SELECT * FROM add_books WHERE book_name like('$_POST[book]%')" ;
$res=mysqli_query($connect, $query);
echo"<table>"; 
echo"<tr>"; 
echo"<th>"; echo"Book name"; echo"</th>";
echo"<th>"; echo"Book image"; echo"</th>";
echo"<th>"; echo"Author name"; echo"</th>";
echo"<th>"; echo"Publiaction name"; echo"</th>";
echo"<th>"; echo"Purchase date"; echo"</th>";
echo"<th>"; echo"Price"; echo"</th>";
echo"<th>"; echo"Quantity"; echo"</th>";
echo"<th>"; echo"Available Quantity"; echo"</th>";


while($row=mysqli_fetch_array($res))
{echo"</tr>"	;

echo"<td>"; echo $row['book_name']; echo"</td>";
echo"<td>"; echo $row['book_image']; echo"</td>";
echo"<td>"; echo $row['auhtor_name']; echo"</td>";
echo"<td>"; echo $row['publication']; echo"</td>";
echo"<td>"; echo $row['purchase_date']; echo"</td>";
echo"<td>"; echo $row['price']; echo"</td>";

echo"<td>"; echo $row['quantity']; echo"</td>";
echo"<td>"; echo $row['available_qty']; echo"</td>";

	
}
echo "</table>";

	
}else{
	
	echo "PLEASE ENTER CORRECT BOOK NAME!!!";
}

?>