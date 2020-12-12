<?php
    // File to create a manager in the database

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    // Get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode json input into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // SQL to insert manager data into database
    $sql = "INSERT INTO manager(Employee_id, Username, Pword) VALUES('$data[Employee_id]', '$data[Username]', '$data[Pword]')";

    // Output the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New manager created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
