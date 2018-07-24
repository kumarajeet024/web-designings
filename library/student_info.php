<?php
include "connect.php";


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


<?php

$res=mysqli_query($connect, "select * from issue_book where book_name='$_GET[book_name]' && return_date=''");
echo"<table>"; 
echo"<tr>"; 
echo"<th>"; echo"Student name"; echo"</th>";
echo"<th>"; echo"student no."; echo"</th>";
echo"<th>"; echo"Book name"; echo"</th>";
echo"<th>"; echo"email"; echo"</th>";
echo"<th>"; echo"contact"; echo"</th>";
echo"<th>"; echo"Issue date"; echo"</th>";


while($row=mysqli_fetch_array($res))
{echo"</tr>"	;

echo"<td>"; echo $row['student_name']; echo"</td>";
echo"<td>"; echo $row['student_no']; echo"</td>";
echo"<td>"; echo $row['book_name']; echo"</td>";
echo"<td>"; echo $row['email']; echo"</td>";
echo"<td>"; echo $row['contact']; echo"</td>";
echo"<td>"; echo $row['issue_date']; echo"</td>";

	
}
echo "</table>";


?>