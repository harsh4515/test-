<?php
$conn  = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

$search_value = mysqli_real_escape_string($conn, $_POST["search"]);

$sql = "SELECT * FROM test 
        WHERE first_name LIKE '%{$search_value}%' 
        OR last_name LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
    echo '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <tr style="background:#007bff; color:white;">
              <th width="100px">ID</th>
              <th width="200px">Name</th>
              <th id="headdel" width="100px">Delete</th>
              <th id="headedit" width="100px">Edit</th>
            </tr>';

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td align='center'>{$row['id']}</td>
                <td>{$row['first_name']} {$row['last_name']}</td>
                <td><button class='delete-btn' data-id='{$row['id']}'>Delete</button></td>
                <td><button class='edit-btn' data-id='{$row['id']}'>Edit</button></td>
              </tr>";
    }

    echo "</table>";
}else{
    echo "<h3 style='text-align:center; color:red;'>No Record Found</h3>";
}

mysqli_close($conn);
?>
