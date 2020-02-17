<?php
/*
* set var
*/
$cfHost = "localhost";
$cfUser = "root";
$cfPassword = "";
$cfDatabase = "homeproject";
 
/*
* connection mysql
*/
$meConnect = mysqli_connect($cfHost,$cfUser,$cfPassword) or die("Error conncetion mysql...");
$meDatabase = mysqli_select_db($conn, $cfDatabase);
mysqli_query($conn, "SET NAMES UTF8");
?>