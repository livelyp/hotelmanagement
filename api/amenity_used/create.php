<?php
    // File to create a used amenity relation

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

    // Insert the json values for Customer_id, Number and Type into the database
    $sql = "INSERT INTO amenity_used(Customer_id, Number, Type) VALUES('$data[Customer_id]', '$data[Number]', '$data[Type]')";

    // Ouput the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New amenities used created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
