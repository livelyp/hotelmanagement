<?php
    // File to create a manage amenity relation

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    // Get database
    include_once '../config/Database.php';

    // Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Decode the json input into an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Insert the json into into database using sql
    $sql = "INSERT INTO managed_amenity(Number, Type, Employee_id) VALUES('$data[Number]', '$data[Type]', '$data[Employee_id]')";

    // Output the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New managed amenities created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
