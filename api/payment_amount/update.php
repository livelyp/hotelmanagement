<?php
    // File to update payment amount information in the database

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

    // SQL to udate the payment amount matching the customer and reservation id
    $sql = "UPDATE payment_amount SET Amount='$data[Amount]' WHERE Reservation_id=$data[Reservation_id] and Customer_id=$data[Customer_id]";

    // Output the result of the update operation
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

    $db->close();

?>
