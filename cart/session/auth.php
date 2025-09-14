<?php
session_start();
include("db.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid password! <a href='login.php'>Try again</a>";
    }
} else {
    echo "User not found! <a href='register.php'>Register here</a>";
}
?>
