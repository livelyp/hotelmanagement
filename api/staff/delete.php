<?php
    // Delete staff from database

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

    // sql to delete a staff member
    $sql = "DELETE FROM staff WHERE Employee_id=$data[Employee_id]";

    // Output result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Staff deleted successfully";
    } else {
        echo "Error deleting staff: " . $db->error;
    }

    $db->close();
?>
