<?php 
$student_id = $_POST["id"];
$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];

$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

$sql = "UPDATE test SET first_name='{$firstname}', last_name='{$lastname}' WHERE id={$student_id}";


if(mysqli_query($conn, $sql)){
    echo 1; // success
} else {
    echo 0; // failure
}
?>
