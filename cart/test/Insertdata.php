<?php 
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];

$con = mysqli_connect("localhost", "root", "", "test");

if(!$con){
    die("Connection Failed: " . mysqli_connect_error());
}

// ✅ query fixed (you had correct syntax here)
$sql = "INSERT INTO test(first_name,last_name) VALUES ('{$fname}','{$lname}')";

if(mysqli_query($con, $sql)){
    echo 1; // success
} else {
    echo 0; // failed
}

mysqli_close($con);
?>
