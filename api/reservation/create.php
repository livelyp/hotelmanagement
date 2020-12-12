<?php
    // Create a reservation in database

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

    // Insert arrival and checkout dates reservation id is auto incremented
    $sql = "INSERT INTO reservation(Arrival_date, Checkout_date) VALUES('$data[Arrival_date]', '$data[Checkout_date]')";

    // Output result of insert operation
    if(mysqli_query($db, $sql)) {
        echo "New Reservation created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
