<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Form</title>
</head>
<body>
  <h2>Student Form</h2>
  <form method="POST" action="daynjson.php">
    <label>Student Name</label>
    <input type="text" name="student_name" required><br><br>

    <label>Age</label>
    <input type="number" name="age" required><br><br>

    <label>City</label>
    <input type="text" name="city" required><br><br>

    <button type="submit">Submit</button>
  </form>
</body>
</html>
