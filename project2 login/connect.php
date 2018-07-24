<?php

$connect=mysqli_connect('localhost','root','');
   /* if($connect){
        echo "connection with the database has been established !!!!";
    
    }else{
        echo "there is some error in connecting with the database!!!";
    }*/

$sql = "CREATE DATABASE IF NOT EXISTS signup";
 /*if (mysqli_query($connect,$sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $connect->error;
}*/


mysqli_select_db($connect,"signup");


$query="CREATE TABLE IF NOT EXISTS users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(100) NOT NULL,
password VARCHAR(900) NOT NULL,
email VARCHAR(900) NOT NULL

)";

/*if (mysqli_query($connect,$query) === TRUE) {
    echo "Table Chat created successfully";
} else {
    echo "Error creating table: " . $connect->error;
}*/

?>