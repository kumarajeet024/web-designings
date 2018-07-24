<?php

$connect=mysqli_connect('localhost','root','');
   /* if($connect){
        echo "connection with the database has been established !!!!";
    
    }else{
        echo "there is some error in connecting with the database!!!";
    }*/

$sql = "CREATE DATABASE IF NOT EXISTS library";
 if (mysqli_query($connect,$sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $connect->error;
}


mysqli_select_db($connect,"library");


mysqli_query($connect,"CREATE TABLE IF NOT EXISTS registration(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
fname VARCHAR(100) NOT NULL,
lname VARCHAR(900) NOT NULL,
username VARCHAR(900) NOT NULL,
password VARCHAR(900) NOT NULL,
email VARCHAR(900) NOT NULL,
contact VARCHAR(900) NOT NULL,
stuno VARCHAR(900) NOT NULL,
branch VARCHAR(900) NOT NULL,
status	VARCHAR (5)

)");

mysqli_query($connect, "CREATE TABLE IF NOT EXISTS lib_regis(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
fname VARCHAR(100) NOT NULL,
lname VARCHAR(900) NOT NULL,
username VARCHAR(900) NOT NULL,
password VARCHAR(900) NOT NULL,
email VARCHAR(900) NOT NULL,
contact VARCHAR(900) NOT NULL


)");



?>