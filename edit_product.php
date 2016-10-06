<!DOCTYPE html>
<html>
	<head>
		<title>Edit Product</title>
		<link rel="stylesheet" type ="text/css" href="css/style.css">
		<link rel="stylesheet" type ="text/css" href="css/header.css">
		<script src="catalog.js"></script>
	</head>
	<body class="body-center helvetica">
		<?php 
			include('header.php');
			$id_active2 = $_GET["id_active"];
		?>

		<div class = "border-bottom ">
			<h2>Please update your product here</h2>
		</div>

		<form method="POST" name="editForm" id="editForm" onsubmit="return validateform()" action= "" enctype="multipart/form-data">	
			<span class="font-small">Name</span><br><input type="text" id="productName" name="productName" class="input-text" /><br>
			<span class="font-small">Description (max 200 chars)</span><br><textarea id="productDescription" name="productDescription" rows="4" cols="50" class="input-textarea"></textarea><br>
			<span class="font-small">Price (IDR)</span><br><input type="text" id="productPrice" name="productPrice" class="input-text" /><br>
			<span class="font-small">Photo</span><br><input type="file" id="fileToUpload" name="fileToUpload" /><br><br>
			<a href="catalog.php?id_active=<?php echo $id_active2; ?>" class="cancel-button float-right">CANCEL</a>

			<input type="submit" value="UPDATE" name="update" class="button float-right" >
		</form>
		<script src="js/editProduct.js"></script>		
	</body>
</html>