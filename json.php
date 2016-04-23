<?php

require("config.php");

if(!isset($_GET["time"]))
	$_GET["time"] = 0;

if(!is_numeric($_GET["time"]))
	exit;

header('Content-Type: application/json');

$mysqli = new mysqli($_DB["host"], $_DB["user"], $_DB["pass"], $_DB["base"]);

/* Vérification de la connexion */
if ($mysqli->connect_errno) {
	printf("Échec de la connexion : %s\n", $mysqli->connect_error);
	exit();
}

$result = mysqli_query($mysqli, "SELECT * FROM 4l_positions WHERE time > '".$_GET["time"]."'");

$i = 0;
	
$lastLng = 0;
$lastLat = 0;

echo "[";
	while($row = $result->fetch_array()) {
		
		if($row['GPSlat'] == $lastLat && $row['GPSlng'] == $lastLng)
			continue;
		
		$lastLng = $row['GPSlng'];
		$lastLat = $row['GPSlat'];
	
		if($i > 0)
			echo ",";
		
		echo '{';
			echo '"GPSlat":"' . $row['GPSlat'] . '",';
			echo '"GPSlng":"' . $row['GPSlng'] . '",';
			echo '"time":"' . $row['time'].'"';
		echo '}';
		
		$i++;
		}
echo "]";

?>