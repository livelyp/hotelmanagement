<?php
    // Update a room type in the database

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

    // Update room price, total rooms and type name where type id matches
    $sql = "UPDATE room_type SET Room_price='$data[Room_price]', Total_rooms='$data[Total_rooms]', Type='$data[Type]' WHERE Type_id=$data[Type_id]";

    // Output result of update operation
    if ($db->query($sql) === TRUE) {
        echo "Room type updated successfully";
    } else {
        echo "Error updating room type: " . $db->error;
    }

    $db->close();

?>
