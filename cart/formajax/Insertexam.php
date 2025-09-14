<?php 
if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];

    // connect to database
    $con = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

    $sql = "INSERT INTO test(first_name, last_name) VALUES ('{$fname}', '{$lname}')";

    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }

    mysqli_close($con);
}
?>
