<?php
	require_once('db.php');
	$conn = connect_db();
	$id_active = $_GET['id_active'];
	$sql = "SELECT * FROM purchase WHERE purchase_id = '$id_active' ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	header("Content-type: " . $row["image_type"]);
	echo $row["product_photourl"];
?>