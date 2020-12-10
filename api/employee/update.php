<?php
    // File to update an employee in the database

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    // Get  database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode the updated employee json into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Take the updated employee info and update the employee with matching employee id
    $sql = "UPDATE employee SET Name='$data[Name]', Phone='$data[Phone]', Position='$data[Position]' WHERE Employee_id=$data[Employee_id]";

    // Output the result of the update operation
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

    $db->close();

?>
