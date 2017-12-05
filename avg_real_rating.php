<?php
include('fifadbconnect.php');
$mysqli = fifadbconnect();


$sql = "SELECT AVG(Real_Rating) FROM Real_Player";

$result = $mysqli->query($sql) or die($mysqli->error);

while ($row = mysqli_fetch_array($result)) {

	echo "Average = ";
	echo $row['AVG(Real_Rating)'];

}

?>