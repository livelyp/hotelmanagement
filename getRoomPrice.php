<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT T.Room_price
FROM Room as R, Room_Type as T
WHERE R.Type_id = T.Type_id
");

echo "<table border='1'>
<tr>
<th>Room Price</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Room Price'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>