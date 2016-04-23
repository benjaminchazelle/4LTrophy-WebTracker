<?php

	if (isset($_GET['password']) && $_GET['password'] != 'BORIS'){
		exit;
	}

	// $mysqli = new mysqli("localhost", "root", "root", "iut_4l_distant");
	$mysqli = new mysqli("justwoodbftrophy.mysql.db", "justwoodbftrophy", "23Kje5627A", "justwoodbftrophy");
	
	/* V?rification de la connexion */
	if ($mysqli->connect_errno) {
		printf("?chec de la connexion : %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result = mysqli_query($mysqli, "DELETE FROM 4l_positions");
	
	echo "RAZ";


?>