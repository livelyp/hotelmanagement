<?php
    // File to delete a guest from the database

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    //Get database
    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // decode the json to get customer id
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a guest with corresponding customer id
    $sql = "DELETE FROM guest WHERE Customer_id=$data[Customer_id]";

    // Output result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $db->error;
    }

    $db->close();
?>
