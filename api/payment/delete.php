<?php
    // File to delete payment

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

    // sql to delete a payment from database
    $sql = "DELETE FROM payment WHERE Reservation_id=$data[Reservation_id] and Customer_id=$data[Customer_id]";

    // Output the result of delete operation
    if ($db->query($sql) === TRUE) {
        echo "Payment deleted successfully";
    } else {
        echo "Error deleting payment: " . $db->error;
    }

    $db->close();
?>
