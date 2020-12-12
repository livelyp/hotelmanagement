<?php
    // File to create a member in the database

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

    // sql to insert a member into the database
    $sql = "INSERT INTO member(Customer_id, Username, Pword, Points) VALUES('$data[Customer_id]', '$data[Username]', '$data[Pword]', '$data[Points]')";

    // Output the result of the create operation
    if(mysqli_query($db, $sql)) {
        echo "New member created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
