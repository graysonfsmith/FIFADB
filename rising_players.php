<?php
include('fifadbconnect.php');
$mysqli = fifadbconnect();

$sql = "SELECT r.Full_Name, r.Real_Rating, p.Price, n.Difficulty FROM Real_Player r INNER JOIN Player_Item p on r.Full_Name = p.Real_Player_Full_Name INNER JOIN Next_Game n on r.Full_Name = n.Real_Player_Full_Name";

$result = $mysqli->query($sql) or die($mysqli->error);


while ($row = mysqli_fetch_array($result)) {

	$possible = ((1 - ((7 - $row['Real_Rating']) - $row['Difficulty']))/10) - 0.2;
	
if($possible > 0.2){
	echo "<br>";
	echo $row['Full_Name'];
	echo "<br>";
	echo "possible rise up to: ";
	echo ($possible * $row['Price']);
	echo "<br>";
}
}

?>