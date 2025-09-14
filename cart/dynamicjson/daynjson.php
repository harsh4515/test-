<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "school") or die("Connection Failed");

// Query
$sql = "INSERT INTO student student_name, age, city FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

// Fetch data
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Convert to JSON
$json_data = json_encode($output, JSON_PRETTY_PRINT);

// Filename
$filename = "students-" . date("d-m-y") . ".json";

// Create "json" folder if it doesn't exist
if (!file_exists("json")) {
    mkdir("json", 0777, true);
}

// Save JSON file
if (file_put_contents("json/{$filename}", $json_data)) {
    echo "<h3 style='color:green'>" . $filename . " File Created ✅</h3>";
} else {
    echo "<h3 style='color:red'>❌ Can't insert data into JSON file.</h3>";
}
?>
