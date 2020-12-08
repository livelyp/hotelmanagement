<?php
$Reservation_id = $_POST['Reservation_id'];
$type_id = $_POST['type_id'];
$room_num = $_POST['room_num'];

$reserveFlag = false;
$typeFlag = false;
$roomFlag = false;

// only attempt to insert if all values are filled in
if (!empty($Reservation_id) || !empty($type_id) || !empty($room_num)) {
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "cpsc471hms";
  //create connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else {

    $SELECTRES = "SELECT Reservation_id From reservation Where Reservation_id = ? Limit 1";
    $SELECTTYPE = "SELECT type_id From room_type Where type_id = ? Limit 1";
    $SELECTROOM = "SELECT room_num From room Where room_num = ? Limit 1";

    // check if reservation ID exists
    if (false === ($stmt = $conn->prepare($SELECTRES))) {
      echo 'error preparing statement: ' . $conn->error;
    } elseif (!$stmt->bind_param("i", $Reservation_id)) {
      echo 'error binding params: ' . $stmt->error;
    } elseif (!$stmt->execute()) {
      echo 'error executing statement: ' . $stmt->error;
    } else {
      $stmt->bind_result($Reservation_id);
      $stmt->store_result();
      $stmt->store_result();
      $stmt->fetch();
      $rnum = $stmt->num_rows;
      if ($rnum==0) {
        echo "Invalid Reservation ID.";
        echo "<br>";
        $stmt->close();
      } else {
        $stmt->close();
        echo "Valid Reservation ID";
        echo "<br>";
        $reserveFlag = true;
      }
    }

    // check if Room Type ID exists
    if (false === ($stmt = $conn->prepare($SELECTTYPE))) {
      echo 'error preparing statement: ' . $conn->error;
    } elseif (!$stmt->bind_param("i", $type_id)) {
      echo 'error binding params: ' . $stmt->error;
    } elseif (!$stmt->execute()) {
      echo 'error executing statement: ' . $stmt->error;
    } else {
      $stmt->bind_result($type_id);
      $stmt->store_result();
      $stmt->store_result();
      $stmt->fetch();
      $rnum = $stmt->num_rows;
      if ($rnum==0) {
        echo "Invalid Type ID.";
        echo "<br>";
        $stmt->close();
      } else {
        $stmt->close();
        echo "Valid Type ID";
        echo "<br>";
        $typeFlag = true;
      }
    }

    // check if Room num exists
    if (false === ($stmt = $conn->prepare($SELECTROOM))) {
      echo 'error preparing statement: ' . $conn->error;
    } elseif (!$stmt->bind_param("i", $room_num)) {
      echo 'error binding params: ' . $stmt->error;
    } elseif (!$stmt->execute()) {
      echo 'error executing statement: ' . $stmt->error;
    } else {
      $stmt->bind_result($room_num);
      $stmt->store_result();
      $stmt->store_result();
      $stmt->fetch();
      $rnum = $stmt->num_rows;
      if ($rnum==0) {
        echo "Invalid Room Number.";
        echo "<br>";
        $stmt->close();
      } else {
        $stmt->close();
        echo "Valid Room Number";
        echo "<br>";
        $roomFlag = true;
      }
    }
    
    // if all three values exist in the database, go ahead and insert into reserved rooms
    if ($reserveFlag && $typeFlag && $roomFlag) {

      $INSERT = "INSERT Into reserved_Rooms (Reservation_id, type_id, room_num) values(?, ?, ?)";
      //Prepare statement
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("iii", $Reservation_id, $type_id, $room_num);
      $stmt->execute();
      echo "New room reserved sucessfully";
      $stmt->close();
      $conn->close();
    }
  }
} else {
 echo "Please fill in all fields.";
 die();
}
?>