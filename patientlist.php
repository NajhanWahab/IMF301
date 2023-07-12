<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Record List</title>
</head>

<body>
<h3 align="center">List of Patient Record</h3>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smileycare";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//create and execute query
$sql = "SELECT * FROM patientrecod";
$result = $conn->query($sql);
//check if records were returned
if ($result->num_rows > 0) {
//create a table to display the record
echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
echo '<tr>
<td align="center"><b>Name</b></td>
<td align="center"><b>Date of Birth</b></td>
<td align="center"><b>Gender</b></td>
<td align="center"><b>Address</b></td>
<td align="center"><b>Contact Number</b></td>
<td align="center"><b>Email</b></td>
<td align="center"><b>Occupation</b></td>
</tr>';
// output data of each row
while($row = $result->fetch_assoc()) {
echo '<tr>';
echo '<td align="center">'.$row["Name"].'</td>';
echo '<td align="center">'.$row["DateofBirth"].'</td>';
echo '<td align="center">'.$row["Gender"].'</td>';
echo '<td align="center">'.$row["Address"].'</td>';
echo '<td align="center">'.$row["ContactNumber"].'</td>';
echo '<td align="center">'.$row["Email"].'</td>';
echo '<td align="center">'.$row["Occupation"].'</td>';
'</td>';
echo '</tr>';
}
}
else {
echo "0 results"; //if no record found in the database
}
//close connection
$conn->close();
echo '<p><a href="data.html">Back to Main Menu</a></p>';
?>
</body>
</html>