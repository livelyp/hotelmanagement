<?php

$ID= $_POST["Reservation ID"];
$newRTID= $_POST["New Room Type ID"];
$newRN = $_POST["New Room Num"];

// Create connection
$con=mysqli_connect("localhost","root","","hotel_mg");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "UPDATE Reserved_Rooms as R SET R.Room_num = '".$newRN."', R.Type_id = '".$newRTID."' Where  R.Reservation_id =" .$ID;
$result = mysqli_query($con,$sql);
mysqli_close($con);

?>