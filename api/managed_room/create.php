<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"), true);

    $sql = "INSERT INTO managed_room(Type_id, Room_num, Employee_id) VALUES('$data[Type_id]', '$data[Room_num]', '$data[Employee_id]')";

    if(mysqli_query($db, $sql)) {
        echo "New managed room created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>