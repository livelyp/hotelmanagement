<?php
    // File to create a customer enitity

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode json input to an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Insert Phone, Fname, Lname into database Customer_id auto-increments
    $sql = "INSERT INTO customer(Phone, Fname, Lname) VALUES('$data[Phone]', '$data[Fname]', '$data[Lname]')";

    // Ouput reult of create operation
    if(mysqli_query($db, $sql)) {
        echo "New customer created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
?>
