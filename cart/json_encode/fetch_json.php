<?php 
$con = mysqli_connect("localhost", "root", "", "school") or die("Connection Failed");

$sql = "SELECT * FROM students";
$result = mysqli_query($con, $sql) or die("SQL Query Failed");

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($output, JSON_PRETTY_PRINT);

mysqli_close($con);
?>
