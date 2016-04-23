<?php

	require("config.php");

if(isset($_POST["data"]) && isset($_GET["password"]) && $_GET["password"] == $_KEY) {
	
	$mysqli = new mysqli($_DB["host"], $_DB["user"], $_DB["pass"], $_DB["base"]);

	if ($mysqli->connect_errno) {
		printf("Échec de la connexion : %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result = mysqli_query($mysqli, "SELECT * FROM 4l_positions ORDER BY time DESC LIMIT 1");
	$dataSize = $result->num_rows;
	
	$lastData = $result->fetch_array(MYSQLI_ASSOC);	
		
	$data = json_decode($_POST["data"], true);
	
	foreach($data as $datum) {
		file_put_contents("test.htm", JSON_encode($datum));
		if(isset($datum["GPSlat"]) && isset($datum["GPSlng"]) && isset($datum["time"])) {
			//var_dump($dataSize > 1);
			
			if($datum["GPSlat"] == 0 || $datum["GPSlng"] == 0)
				exit;
			
			if(($datum["GPSlat"] != 0 || $datum["GPSlng"] != 0) && $dataSize == 0 || ($dataSize >= 1 && isset($lastData["time"]) && $datum["time"] > $lastData["time"])) {
				
				// echo "INSERT INTO dataHistory (`id`, `time`, `GPSlat`, `GPSlng`, `temperature_interne`, `temperature_externe`) VALUES (NULL, '".$datum["time"]."', '".$datum["GPSlat"]."', '".$datum["GPSlng"]."', '".$datum["temperature_interne"]."', '".$datum["temperature_interne"]."')\n";
				mysqli_query($mysqli, "INSERT INTO 4l_positions (`id`, `time`, `GPSlat`, `GPSlng`) VALUES (NULL, '".$datum["time"]."', '".$datum["GPSlat"]."', '".$datum["GPSlng"]."')");

				$dataSize++;
			}
			
		}
		
	}
	
	echo "OK";
	
}
else {
	echo "KO";
	
}

exit;

?>
