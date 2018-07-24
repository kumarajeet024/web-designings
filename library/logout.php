<?php
session_start();
unset($_SESSION['username']);
    header("Location: lib_login.php");

?>

