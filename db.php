<?php

$servername = "localhost";
$db_username = "root";
$db_password = "heroes2004";
$dbname = "db1";

function connect_db() {
	global $servername, $db_username, $db_password, $dbname;
	// Create connection
	$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

?>