<?php
    // File to update a customer reservation payment type

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

    // SQL the payment type made by customer for their reservation
    $sql = "UPDATE payment_type SET Type='$data[Type]' WHERE Reservation_id=$data[Reservation_id] and Customer_id=$data[Customer_id]";

    // Ouput the result of the update operation
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->error;
    }

    $db->close();

?>
