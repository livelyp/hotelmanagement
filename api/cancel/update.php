<?php
    //File to update a cancel relation

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode the json input into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Update the cancel relation with matching cancellation_id
    $sql = "UPDATE cancel SET Reservation_id='$data[Reservation_id]', Customer_id='$data[Customer_id]' WHERE Cancellation_id=$data[Cancellation_id]";

    // Output the result of the update realtion
    if ($db->query($sql) === TRUE) {
        echo "Cancel relation updated successfully";
    } else {
        echo "Error updating cancel relation: " . $db->error;
    }

    $db->close();

?>
