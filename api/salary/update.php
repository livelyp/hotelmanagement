<?php
    // Update an employees salary

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

    // Update salary amount
    $sql = "UPDATE salary SET Amount='$data[Amount]' WHERE Employee_id=$data[Employee_id]";

    // Output the result of update operation
    if ($db->query($sql) === TRUE) {
        echo "Salary updated successfully";
    } else {
        echo "Error updating salary: " . $db->error;
    }

    $db->close();

?>
