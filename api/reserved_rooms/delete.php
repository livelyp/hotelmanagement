<?php
    // Unreserve a room in the database

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

    // sql to remove a reservation from a room
    $sql = "DELETE FROM reserved_rooms WHERE Reservation_id=$data[Reservation_id] and Type_id=$data[Type_id] and Room_num=$data[Room_num]";

    // Ouput the result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Room reservation deleted successfully";
    } else {
        echo "Error deleting room reservation: " . $db->error;
    }

    $db->close();
?>
