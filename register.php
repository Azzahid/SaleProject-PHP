<?php

/* 
	Source: http://www.w3schools.com/
*/

$servername = "localhost";
$username = "root";
$password = "heroes2004";
$dbname = "db1";

function connect_db() {
	global $servername, $username, $password, $dbname;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	return $conn;
}

function register($full_name, $username, $email, $pass, $confirm_pass, $full_address, $postal_code, $phone_number) {
	$conn = connect_db();
	$sql = "INSERT INTO users (full_name, username, email, pass, confirm_pass, full_address, postal_code, phone_number
		VALUES ('$full_name', '$username', '$email', '$pass', '$confirm_pass', '$full_address', '$postal_code', '$phone_number')";
	$result = $conn->query($sql);
	if ($conn->query($sql) === TRUE) {
	    echo "New user created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$full_name = $_POST["full_name"];
  	$username = $_POST["username"];
  	$email = $_POST["email"];
  	$pass = $_POST["pass"];
  	$confirm_pass = $_POST["confirm_pass"];
  	$full_address = $_POST["full_address"];
  	$postal_code = $_POST["postal_code"];
  	$phone_number = $_POST["phone_number"];
  	register($full_name, $username, $email, $pass, $confirm_pass, $full_address, $postal_code, $phone_number);
}

?>