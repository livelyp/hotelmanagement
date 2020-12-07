<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT R.Arrival_date, R.Checkout_date, P.Amount, PT.Type,
P.Customer_id
FROM Reservation as R, Payment_Amount as P, Payment_Type as PT
WHERE R.Reservation_id = P.Reservation_id AND
P.Reservation_id = PT.Reservation_id AND
P.Customer_id = PT.Customer_id");

echo "<table border='1'>
<tr>
<th>Arrival Date</th>
<th>Checkout Date</th>
<th>Payment Amount</th>
<th>Payment Type</th>
<th>Customer ID</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Arrival Date'] . "</td>";
    echo "<td>" . $row['Checkout Date'] . "</td>";
    echo "<td>" . $row['Payment Amount'] . "</td>";
    echo "<td>" . $row['Payment Type'] . "</td>";
    echo "<td>" . $row['Customer ID'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>