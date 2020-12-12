<?php
    // File to delete a managed room relation

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

    // sql to delete a managed room relation
    $sql = "DELETE FROM managed_room WHERE Employee_id=$data[Employee_id] and Type_id=$data[Type_id] and Room_num=$data[Room_num]";

    // Output result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Managed room relation deleted successfully";
    } else {
        echo "Error deleting managed room relation: " . $db->error;
    }

    $db->close();
?>
