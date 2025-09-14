<?php
$student_id = $_POST["id"];
$conn  = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

$sql = "SELECT * FROM test WHERE id={$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>First Name</td>
                <td><input type='text' id='edit-fname' value='{$row["first_name"]}'></td>
              </tr> 
              <tr>
                <td>Last Name</td>
                <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type='hidden' id='edit-id' value='{$row["id"]}'>
                  <input type='submit' id='edit-submit' value='Save'>
                </td>
              </tr>";
    }
} else {
    echo "<h3 style='text-align:center; color:red;'>No Record Found</h3>";
}
mysqli_close($conn);
?>
a