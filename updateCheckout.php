<?php

$ID= $_POST["Reservation ID"];
$date = $_POST["date"];
$email = $_POST["email"];

// Create connection
$con=mysqli_connect("localhost","root","","hotel_mg");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "UPDATE Reservation as R SET R.Checkout_date = '".$date."' Where  R.Reservation_id =" .$ID;
$result = mysqli_query($con,$sql);
mysqli_close($con);

?>