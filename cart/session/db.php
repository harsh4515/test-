<?php
$host = "localhost";
$user = "root";   // change if needed
$pass = "";       // change if you have a MySQL password
$dbname = "user_system";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
