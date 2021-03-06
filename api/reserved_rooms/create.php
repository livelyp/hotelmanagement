<?php
    // File to reserve a room in the database

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

    // Insert a reservation id wih a room
    $sql = "INSERT INTO reserved_rooms(Reservation_id, Type_id, Room_num) VALUES('$data[Reservation_id]', '$data[Type_id]', '$data[Room_num]')";

    // Output the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New room_reservation created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
