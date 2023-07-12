<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Record SMILEYCARE</title>
</head>

<body>
<?php
$date = date("d-m-Y");
//get input values from form
extract($_POST);
?>
<h2 align="center">SMILEYCARE Inventory</h2><br>
<h3 align="center">"To Keep Track on the Inventory of Medicine"</h3>
&nbsp;
&nbsp;
&nbsp;
<table cellpadding=10 cellspacing=0 border=1 align="center">
 <tr>
    <th>Name</th>
    <th>Quantity</th>
    <th>Expiry Date</th>
    <th>Batch Number</th>
    <th>Supplier</th>
  </tr>
  <tr>
    <td><?php print($mname1)?></td>
    <td><?php print($mquantity1) ?></td>
    <td><?php print($mexpdate1)  ?></td>
    <td><?php print($mbatchno1) ?></td>
    <td><?php print($msupplier1)?></td>
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

$sql = "INSERT INTO inventory (Name,Quantity,ExpiryDate,BatchNumber,Supplier) VALUES ('$mname1','$mquantity1', '$mexpdate1', '$mbatchno1', '$msupplier1')";

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
