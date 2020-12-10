<?php

    // File to delete a used amenity relation

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Decode the json input into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a used amenity relation matching the input
    $sql = "DELETE FROM amenity_used WHERE Customer_id=$data[Customer_id] and Number=$data[Number] and Type='$data[Type]'";

    // Output the result of the delete operation
    if ($db->query($sql) === TRUE) {
        echo "Used amenity relation deleted successfully";
    } else {
        echo "Error deleting used amenity relation: " . $db->error;
    }

    $db->close();
?>
