<?php
    // File to update a customer entity
    
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    // Connect to database
    $database = New Database();
    $db = $database->connect();

    // Decode the input for customer as an array data
    $data = json_decode(file_get_contents("php://input"), true);

    // Update the customer with data from input that has a matching customer id
    $sql = "UPDATE customer SET Phone='$data[Phone]', Fname='$data[Fname]', Lname='$data[Lname]' WHERE Customer_id=$data[Customer_id]";

    // Output the reult of update operation
    if ($db->query($sql) === TRUE) {
        echo "Customer updated successfully";
    } else {
        echo "Error customer record: " . $db->error;
    }

    $db->close();

?>
