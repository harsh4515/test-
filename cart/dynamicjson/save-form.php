<?php
// Path to JSON file
$jsonFile = "json/daynjson.json";

// Ensure folder exists
if (!file_exists("json")) {
    mkdir("json", 0777, true);
}

// Check form submission
if (!empty($_POST['student_name']) && !empty($_POST['age']) && !empty($_POST['city'])) {

    // Get current JSON data
    if (file_exists($jsonFile)) {
        $current_data = file_get_contents($jsonFile);
        $array_data = json_decode($current_data, true);
    } else {
        $array_data = [];
    }

    // Auto-generate ID
    $last_id = 0;
    if (!empty($array_data)) {
        $ids = array_column($array_data, "id");
        $last_id = max($ids);
    }
    $new_id = $last_id + 1;

    // New entry
    $new_data = [
        'id'           => (string)$new_id,
        'student_name' => $_POST['student_name'],
        'age'          => $_POST['age'],
        'city'         => $_POST['city']
    ];

    // Append new data
    $array_data[] = $new_data;

    // Encode back to JSON
    $json_data = json_encode($array_data, JSON_PRETTY_PRINT);

    // Save JSON
    if (file_put_contents($jsonFile, $json_data)) {
        echo "<h3>✅ Successfully saved record (ID: {$new_id})</h3>";
    } else {
        echo "<h3>❌ Failed to save data</h3>";
    }
}
?>
