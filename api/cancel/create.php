<?php

    // File to create a cancel relation

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

    // Insert the reservation_id and customer_id into database cancellation_id is auto-incremented 
    $sql = "INSERT INTO cancel(Reservation_id, Customer_id) VALUES('$data[Reservation_id]', '$data[Customer_id]')";

    // Ouput the result of create operation
    if(mysqli_query($db, $sql)) {
        echo "New Cancellation created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
