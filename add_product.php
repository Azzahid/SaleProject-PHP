<?php
	$add_product = true;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type ="text/css" href="css/style.css">
		<link rel="stylesheet" type ="text/css" href="css/header.css">
		<script src="catalog.js"></script>
	</head>
	<body class="body-center helvetica">
		<?php include('header.php') ?>
		<div class = "border-bottom ">
			<h2>Please add your product here</h2>
		</div>
		<form method="post" action="add_product.php">
			Name<br><input type="text" name="productName" /><br>
			Description (max 200 chars)<br><textarea name="productDescription" rows="4" cols="50"></textarea><br>
			Price (IDR)<br><input type="text" name="productPrice" /><br>
			Photo<br><input type="file" name="productPicture"/><br><br>
			<input type="submit" value="ADD" name="addsubmit"/>
			<input type="submit" value="CANCEL" name="cancelsubmit"/>
		</form>
	</body>
</html>
