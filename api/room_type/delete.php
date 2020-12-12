<?php
    // Delete a room type from database

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

    // sql to delete a room type
    $sql = "DELETE FROM room_type WHERE Type_id=$data[Type_id]";

    // Output the result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Room type deleted successfully";
    } else {
        echo "Error deleting room type: " . $db->error;
    }

    $db->close();
?>
