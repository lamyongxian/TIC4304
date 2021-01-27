<?php
	define('DB_SERVER', 'yourdbserver');
	define('DB_USERNAME', 'yourusername');
	define('DB_PASSWORD', 'yourpasswd');
	define('DB_NAME', 'yourdbname');

	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if($link === false){
	    die("ERROR: Could not connect.". mysqli_connect_error());
	}
	else {
		echo('welcome to TIC4304 ');
	}
?>
