<?php
include('fifadbconnect.php');
$mysqli = fifadbconnect();

$sql = "SELECT r.Full_Name, r.Club, n.Opponent FROM Real_Player r INNER JOIN Next_Game n on r.Full_Name = n.Real_Player_Full_Name";

$result = $mysqli->query($sql) or die($mysqli->error);


while ($row = mysqli_fetch_array($result)) {

	$result2 = $mysqli->query($sql) or die($mysqli->error);

	while($matchrow = mysqli_fetch_array($result2)) {
		if($row['Club'] == $matchrow['Opponent'] && $row['Full_Name'] != $matchrow['Full_Name']){
			echo $row['Full_Name'];
			echo "<br>";
			echo "vs";
			echo "<br>";
			echo $matchrow['Full_Name'];
			echo "<br>";
			echo "<br>";
		}

	}	
}

?>