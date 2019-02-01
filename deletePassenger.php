<?php
require_once('port.php');
require_once('loginpage.html');

$conn = mysqli_connect('localhost','root','','traveldb')
 or die('Error connecting to MySQL server.');
$id = $_GET["id"];
$deletesql = "DELETE FROM " ."traveldb.passenger ".
			 "WHERE passenger.passportid = '" . $id . "';";
$conn->query($deletesql);

$custsql = "SELECT * FROM "."traveldb.customer";
$custresult = $conn->query($custsql);

$row = $custresult->fetch_assoc();
$em = $row["email"];
$nm = $row["name"];
$addr = $row["address"];
$cit = $row["city"];
$cnty = $row["country"];

ob_clean();include ("portal.html");
loadTables();
?>


