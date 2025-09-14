<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <form action="auth.php" method="POST">
        <label>Username:</label><input type="text" name="username" required><br><br>
        <label>Password:</label><input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Don’t have an account? <a href="register.php">Register</a></p>
</body>
</html>
