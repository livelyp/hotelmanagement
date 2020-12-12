<?php
    // Create a new room type

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

    // Insert into database
    $sql = "INSERT INTO room_type(Room_price, Total_rooms, Type) VALUES('$data[Room_price]', '$data[Total_rooms]', '$data[Type]')";

    // Ouput result of insert operation
    if(mysqli_query($db, $sql)) {
        echo "New room type created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
