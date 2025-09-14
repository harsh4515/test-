<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("DB Connection Failed");

$start = $_POST['start_date'];
$end   = $_POST['end_date'];
$search = $_POST['search'];

$sql = "SELECT * FROM datedata WHERE 1=1";

// Date filter
if(!empty($start) && !empty($end)){
    $sql .= " AND created_at BETWEEN '$start' AND '$end'";
}

// Search filter
if(!empty($search)){
    $sql .= " AND (student_name LIKE '%$search%' OR city LIKE '%$search%')";
}

$result = mysqli_query($conn, $sql);

$output = "<table border='1' cellpadding='5'>
<tr><th>ID</th><th>Name</th><th>Age</th><th>City</th><th>Date</th></tr>";

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
            <td>".$row['id']."</td>
            <td>".$row['student_name']."</td>
            <td>".$row['age']."</td>
            <td>".$row['city']."</td>
            <td>".$row['created_at']."</td>
        </tr>";
    }
} else {
    $output .= "<tr><td colspan='5'>No Records Found</td></tr>";
}
$output .= "</table>";

echo $output;
?>
