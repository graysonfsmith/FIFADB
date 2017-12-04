<?php
include('fifadbconnect.php');
$mysqli = fifadbconnect();

$name = $_POST["player"];

$sql = "SELECT Real_Player_Full_Name, Price FROM Player_Item WHERE Real_Player_Full_Name = '$name'";

$result = $mysqli->query($sql) or die($mysqli->error);


while ($row = mysqli_fetch_array($result)) {

	echo "price = ";
	echo $row['Price'];

}



?>