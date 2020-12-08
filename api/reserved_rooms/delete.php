<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a record
    $sql = "DELETE FROM reserved_rooms WHERE Reservation_id=$data[Reservation_id] and Type_id=$data[Type_id] and Room_num=$data[Room_num]";

    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    $db->close();
?>