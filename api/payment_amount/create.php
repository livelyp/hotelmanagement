<?php
    // File to create a payment amount for a customer

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

    // Insert payment amount information into database
    $sql = "INSERT INTO payment_amout(Reservation_id, Customer_id, Amount) VALUES('$data[Reservation_id]', '$data[Customer_id]', '$data[Amount]')";

    // Output the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New payment amount created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
