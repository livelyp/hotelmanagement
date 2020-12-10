<?php

    // File to delete a cancel relation

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Decode the cancellation id from the json
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a record matching the cancellation id
    $sql = "DELETE FROM cancel WHERE Cancellation_id=$data[Cancellation_id]";

    // Ouput result of the delete operation
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    $db->close();
?>
