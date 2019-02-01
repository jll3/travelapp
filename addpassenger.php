<?php
require_once('port.php');
require_once('loginpage.html');

$conn = mysqli_connect('localhost','root','','traveldb')
 or die('Error connecting to MySQL server.');

$insertsql = "INSERT INTO " ."traveldb.passenger".
			" (title,firstname,surname,passportid) VALUES ('".
			$_POST['eml']."','".$_POST['nme']."','".$_POST['add']."','".$_POST['passid']."')";

$conn->query($insertsql);

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


