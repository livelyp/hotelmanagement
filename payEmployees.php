<?php 

$con=mysqli_connect("localhost","root","","hotel_mg"); 

if(mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT S.Employee_id, E.name, SA.Amount
FROM MANAGER AS M, STAFF AS S, SALARY AS SA, EMPLOYEE AS E
WHERE M.Employee_id = S.Mgr_id AND S.Employee_id=E.Employee_id AND S.Employee_id = SA.Employee_id
");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Salary Amount</th>
</tr>";

while($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Salary Amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);

?>