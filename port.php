<?php
	$conn = mysqli_connect('localhost','root','','traveldb')
	 or die('Error connecting to MySQL server.');

	$custsql = "SELECT * FROM traveldb.customer";
	$custresult = $conn->query($custsql);
	$row = $custresult->fetch_assoc();
	if($row["email"] == $_POST["usr"] && 
    	$row["password"] == $_POST["pwd"]){
		$em = $row["email"];
        $nm = $row["name"];
        $addr = $row["address"];
        $cit = $row["city"];
        $cnty = $row["country"];
    	ob_clean();include ("portal.html");
    	loadTables();
    }else{
		include ("loginpage.html");
    }

function loadTables(){

	$conn = mysqli_connect('localhost','root','','traveldb')
	 or die('Error connecting to MySQL server.');

	$passql = "SELECT * FROM traveldb.passenger";
	$pasresult = $conn->query($passql);

	$tripsql = "SELECT * FROM traveldb.trips";
	$tripresult = $conn->query($tripsql);

//passengers
       echo "<table>
			  <th>Passengers</th>
			  <tr>
			    <th>Title</th>
			    <th>First Name</th>
			    <th>Surname</th>
			    <th>Passport ID</th>
			    <th>Options</th>
			  </tr>";	
		while($rows = $pasresult->fetch_array()){
		echo "<tr>
				<td>".$rows["title"]."</td>
				<td>".$rows["firstname"]."</td>
				<td>".$rows["surname"]."</td>
				<td>".$rows["passportid"]."</td>
				<td><a href='deletePassenger.php?id=".$rows["passportid"]."'>Delete</a></td></tr>";
		
		}
		echo "<tr><td>
			<form action='addpass.html'>
			<input type='submit' value='Add'>
			</form>
			</td></tr>
			</table> <br><br>";

//trips
		echo "<table>
			  <th>Trips</th>
			  <tr>
			    <th>From</th>
			    <th>To</th>
			    <th>Departure</th>
			    <th>Arrival</th>
			    <th>Passengers</th>
			    <th>Options</th>
			  </tr>";
		while($rov = $tripresult->fetch_array()){
		echo "<tr><td>".$rov["fro"]."</td>
				<td>".$rov["to"]."</td>
				<td>".$rov["departure"]."</td>
				<td>".$rov["arrival"]."</td>
				<td>".$rov["passengers"]."</td>
				<td><a href='deletetrip.php?id=".$rov["passengers"]."'>Delete</a></td></tr>";
		
		}
		echo "<tr><td>
			<form action='addtrip.html'>
			<input type='submit' value='Add'>
			</form>
			</td></tr>
			</table>";
}
?>