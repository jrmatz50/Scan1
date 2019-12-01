<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "Inventory";


$mcon=mysqli_connect($hostname,$username,$password,$db);

if ($mcon->connect_error) {
    die("Database connection failed: " . $mcon->connect_error);
}  