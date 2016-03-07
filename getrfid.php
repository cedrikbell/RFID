<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$inSerial = $_GET['inSerial'];
$inrfid = $_GET['inrfid'];
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id where rfid like '%$inrfid%' and serialNum like '%$inSerial%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>RFID</th>
<th>Serial Number</th>
<th>Room Number</th>
<th>Make Name</th>
<th>Model Name</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['rfid'] . "</td>";
    echo "<td>" . $row['serialNum'] . "</td>";
    echo "<td>" . $row['roomNumber'] . "</td>";
    echo "<td>" . $row['makeName'] . "</td>";
    echo "<td>" . $row['model_name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>