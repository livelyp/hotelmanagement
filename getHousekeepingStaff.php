<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT S.Employee_id, E.Name, E.position
FROM Staff as S, Room as R, Managed_Room as M, Employee as E
WHERE M.Type_id = R.Type_id AND
M.Room_num = R.Room_num AND
M.Employee_id = S.Employee_id AND
S.Employee_id = E.Employee_id");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Position'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>