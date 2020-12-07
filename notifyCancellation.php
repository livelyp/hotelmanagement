<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT C.Cancellation_id, CU.Phone
FROM CANCEL AS C, MEMBER AS M, RESERVATION AS R, CUSTOMER AS CU
WHERE C.Customer_id = M.Customer_id
AND C.Reservation_id = R.Reservation_id
AND M.Customer_id= CU.Customer_id");

echo "<table border='1'>
<tr>
<th>Cancellation ID</th>
<th>Member Phone Number</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Cancellation ID'] . "</td>";
    echo "<td>" . $row['Member Phone Number'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>