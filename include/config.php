<?php
//Database connection
$host = "localhost";
$username = "root";
$pass = "";
$database = "yag";

$sql = mysqli_connect($host, $username, $pass, $database);

if (!$sql) {
    die("Connection failed: " . mysqli_connect_error());
}