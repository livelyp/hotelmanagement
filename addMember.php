<?php
$customer_id = $_POST['customer_id'];
$username = $_POST['username'];
$pword = $_POST['pword'];
$points =  5;

// only submit if all values are filled in
if (!empty($customer_id) || !empty($username) || !empty($pword)) {
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "cpsc471hms";
  //create connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
  } else {
    // check if customer_id already exists
    $SELECT = "SELECT customer_id From customer Where customer_id = ? Limit 1";
    $INSERT = "INSERT Into member (customer_id, username, pword, points) values(?, ?, ?, ?)";
    //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $stmt->bind_result($customer_id);
    $stmt->store_result();
    $stmt->store_result();
    $stmt->fetch();
    $rnum = $stmt->num_rows;
    if ($rnum==0) {
      echo "This customer does not yet exist.";
    } else {
      $stmt->close();

      // attempt to add to database and handle errors
      if (false === ($stmt = $conn->prepare($INSERT))) {
        echo 'error preparing statement: ' . $conn->error;
      } elseif (!$stmt->bind_param("issi", $customer_id, $username, $pword, $points)) {
        echo 'error binding params: ' . $stmt->error;
      } elseif (!$stmt->execute()) {
        echo 'error executing statement: ' . $stmt->error;
      } else {
        echo "New member added sucessfully";
      }
    }
    $stmt->close();
    $conn->close();
  }
} else {
    echo "Please fill in all fields";
    die();
}
?>