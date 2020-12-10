<?php
    // File to create an employee entity

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

    // Insert the input data into database as an employee
    $sql = "INSERT INTO employee(Employee_id, Name, Phone, Position) VALUES('$data[Employee_id]', '$data[Name]]', '$data[Phone]', '$data[Position]')";

    // Output result of insert relation
    if(mysqli_query($db, $sql)) {
        echo "New employee created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
