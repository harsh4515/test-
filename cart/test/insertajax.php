<?php
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];

$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

$sql = "INSERT INTO test(first_name, last_name) VALUES('{$fname}','{$lname}')";

if(mysqli_query($conn, $sql)){
  echo 1;
} else {
  echo 0;
}

mysqli_connect($sql);

?>
