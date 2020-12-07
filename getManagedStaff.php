<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT S.Employee_id, E.name, E.position
FROM Manager as M, Staff as S, Employee as E
WHERE M.Employee_id = S.Mgr_id AND S.Employee_id = E.Employee_id");

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