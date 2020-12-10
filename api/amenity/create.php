<?php
    // File to create an ammenity in the database
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    //Connect to the database
    $database = New Database();
    $db = $database->connect();

    // Decode the json file from the api input into array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Insert amenity number and type into database
    $sql = "INSERT INTO amenity(Number, Type) VALUES('$data[Number]', '$data[Type]')";

    // Output the result of the insertion
    if(mysqli_query($db, $sql)) {
        echo "New amenities created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
