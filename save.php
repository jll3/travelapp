<?php
require_once('port.php');
require_once('loginpage.html');

$conn = mysqli_connect('localhost','root','','traveldb')
 or die('Error connecting to MySQL server.');

$updatesql = "UPDATE " ."traveldb.customer".
			" set email = '".$_POST['eml'].
			"',name='".$_POST['nam'].
			"',address='".$_POST['addr'].
			"',city='".$_POST['city'].
			"',country='".$_POST['ctry']."';";
$conn->query($updatesql);

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