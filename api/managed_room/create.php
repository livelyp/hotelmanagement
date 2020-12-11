<?php
    // File to create a manage room relation

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

    // Insert input into the database with sql
    $sql = "INSERT INTO managed_room(Type_id, Room_num, Employee_id) VALUES('$data[Type_id]', '$data[Room_num]', '$data[Employee_id]')";

    // Output the result of the insert operation
    if(mysqli_query($db, $sql)) {
        echo "New managed room created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
