<?php
    // File to update a managers information referencing it's employee id

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

    // Decode json input (employee_id) into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Update the matching managers information with sql
    $sql = "UPDATE manager SET Username='$data[Username]', Pword='$data[Pword]' WHERE Employee_id=$data[Employee_id]";

    // Output the result of the update operation
    if ($db->query($sql) === TRUE) {
        echo "Manager updated successfully";
    } else {
        echo "Error updating manager: " . $db->error;
    }

    $db->close();

?>
