<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Patient Record</title>
</head>

<body>
<?php
$date = date("d-m-Y");
//get input values from form
extract($_POST);
?>
<h3 align="center">Patient Record</h3>
<table cellpadding=10 cellspacing=0 border=1 align="center">
<tr><td>Name</td>
<td>:</td>
<td><b><?php print($pname) ?></b></td>
</tr>
<tr><td>IC-Number</td>
<td>:</td>
<td><b><?php print($picno) ?></b></td>
</tr>
<tr><td>Date of Birth</td>
<td>:</td>
<td><b><?php print($pdob) ?></b></td>
</tr>
<tr><td>Gender</td>
<td>:</td>
<td><b><?php print($pgender) ?></b></td>
</tr>
<tr><td>Address</td>
<td>:</td>
<td><b><?php print($paddress)?></b></td>
</tr>
<tr><td>Contact Number</td>
<td>:</td>
<td><b><?php print($pcontact)?></b></td>
</tr>
<tr><td>Email</td>
<td>:</td>
<td><b><?php print($pemail)?></b></td>
</tr>
<tr><td>Occupation</td>
<td>:</td>
<td><b><?php print($poccupation)?></b></td>
</tr>
<tr><td>Name of guardian</td>
<td>:</td>
<td><b><?php print($pguardianname)?></b></td>
</tr>
<tr><td>Relationship with Patient</td>
<td>:</td>
<td><b><?php print($prelationship)?></b></td>
</tr>
</table>

<?php
$servername="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$dbName="smileycare"; // Database name


$conn = new mysqli($servername,$username,$password,$dbName);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO patientrecod (Name,IcNumber, DateofBirth, Gender,Address,ContactNumber,Email,Occupation, GuardianName,GuardianRelationship) VALUES ('$pname','$picno', '$pdob', '$pgender', '$paddress', '$pcontact', '$pemail', '$poccupation' ,'$pguardianname','$prelationship')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
}
else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
//close connection
$conn->close();
?>
<br>

<form>
<input type="button" name="printButton" onClick="window.print()"value="Print">
</form>
</body>
</html>