<?php
$Reservation_id = $_POST["Reservation_id"];

// Create connection
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "cpsc471hms";
$con=mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

// Check connection
if (mysqli_connect_error()) {
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}

// delete from all databases that may be depending on the reservation_id
// delete from cancel
$cancel = "DELETE FROM cancel WHERE Reservation_id = $Reservation_id";
   
if (mysqli_query($con, $cancel)) {
  echo "Deleted successfully from cancel" . PHP_EOL;
} else {
  echo "Error deleting from cancel: " . mysqli_error($con);
}

// delete from payment_type
$paymentType = "DELETE FROM payment_type WHERE Reservation_id = $Reservation_id";

if (mysqli_query($con, $paymentType)) {
  echo "Deleted successfully from payment_type" . PHP_EOL;
} else {
  echo "Error deleting from payment_type: " . mysqli_error($con);
}

// delete from payment_amount
$payment_amount = "DELETE FROM payment_amount WHERE Reservation_id = $Reservation_id";

if (mysqli_query($con, $payment_amount)) {
  echo "Deleted successfully from payment_amount" . PHP_EOL;
} else {
  echo "Error deleting from payment_amount: " . mysqli_error($con);
}

// delete from payment
$payment = "DELETE FROM payment WHERE Reservation_id = $Reservation_id";

if (mysqli_query($con, $payment)) {
  echo "Deleted successfully from payment" . PHP_EOL;
} else {
  echo "Error deleting from payment: " . mysqli_error($con);
}

// delete from reserved_rooms
$reserved_rooms = "DELETE FROM reserved_rooms WHERE Reservation_id = $Reservation_id";

if (mysqli_query($con, $reserved_rooms)) {
  echo "Deleted successfully from reserved_rooms" . PHP_EOL;
} else {
  echo "Error deleting from reserved_rooms: " . mysqli_error($con);
}

$reservation = "DELETE FROM reservation WHERE Reservation_id = $Reservation_id";

if (mysqli_query($con, $reservation)) {
  echo "Deleted successfully from reservation" . PHP_EOL;
} else {
  echo "Error deleting from reservation: " . mysqli_error($con);
}

mysqli_close($con);
?>
