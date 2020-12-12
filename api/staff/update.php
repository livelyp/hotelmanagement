<?php
    // Update information for a staff member

    // Header
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

    // update manager id for staff member
    $sql = "UPDATE staff SET Mgr_id='$data[Mgr_id]' WHERE Employee_id=$data[Employee_id]";

    // Output result of update operation
    if ($db->query($sql) === TRUE) {
        echo "Staff updated successfully";
    } else {
        echo "Error updating staff: " . $db->error;
    }

    $db->close();

?>
