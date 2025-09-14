    <?php 
    // Get form values
    $first_name = $_POST["first_name"];
    $last_name  = $_POST["last_name"];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");

    // Insert query (make sure your table name is correct: students OR test)
    $sql = "INSERT INTO test (first_name, last_name) VALUES ('{$first_name}', '{$last_name}')";

    if(mysqli_query($conn, $sql)){
        echo 1;   // success
    }else{
        echo 0;   // failed
    }

    mysqli_close($conn);
    ?>
