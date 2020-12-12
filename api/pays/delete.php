<?php
    // File to delete a pay relation between manager and employee

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

    // sql to delete a pays relationship
    $sql = "DELETE FROM pays WHERE Employee_id=$data[Employee_id] and Mgr_id=$data[Mgr_id]";

    // Output the result of the delete operation
    if ($db->query($sql) === TRUE) {
        echo "Pays relation deleted successfully";
    } else {
        echo "Error deleting pays relation: " . $db->error;
    }

    $db->close();
?>
