<?php
	require_once('db.php');

	$id_active = $_GET['id_active'];
	$conn = 	connect_db();
	$query = "SELECT * FROM user WHERE id = '$id_active'";
	$result = mysqli_query($conn,$query);

	$data = mysqli_fetch_array($result);
	$username = $data['username'];
?>