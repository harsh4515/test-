<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h2>Register</h2>
    <form method="POST">
        <label>Username:</label><input type="text" name="username" required><br><br>
        <label>Password:</label><input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
</body>
</html>
