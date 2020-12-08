<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../config/Database.php';

    $database = New Database();
    $db = $database->connect();

    $data = json_decode(file_get_contents("php://input"), true);

    // sql to delete a record
    $sql = "DELETE FROM amenity WHERE Number=$data[Number]";

    if ($db->query($sql) === TRUE) {
        echo "Amenity deleted successfully";
    } else {
        echo "Error deleting amenity: " . $db->error;
    }

    $db->close();
?>