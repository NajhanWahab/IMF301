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
//escape special characters in a string
$name = mysqli_real_escape_string($conn, $_POST['patient_name']);
//create and execute query
$sql = "SELECT * FROM patientrecod WHERE name= '$name'";
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
echo '</table></p>';
}
else {
echo '<font color=red>No record found';
}
//close connection
$conn->close();
?>