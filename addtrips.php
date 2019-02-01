<?php
require_once('port.php');
require_once('loginpage.html');

$conn = mysqli_connect('localhost','root','','traveldb')
 or die('Error connecting to MySQL server.');

$insertsql = "INSERT INTO " ."traveldb.trips ".
			 "VALUES ('".$_POST['dep']."','".$_POST['des']."','".$_POST['depd']."','".$_POST['arrd']."','".$_POST['psngs']."')";

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