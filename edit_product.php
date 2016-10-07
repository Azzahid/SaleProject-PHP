<?php
	require_once('db.php');
	$conn = connect_db();
	$id_active2 = $_GET["id_active"];
	$pid = $_GET["id_product"];
	$query = "SELECT * FROM product WHERE user_id = '$id_active2' AND p_id = '$pid' ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);	
?>

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
		?>

		<div class = "border-bottom ">
			<h2>Please update your product here</h2>
		</div>

		<form method="POST" name="editForm" id="editForm" onsubmit="return validateform()" action= "" enctype="multipart/form-data">	
			<span class="font-small">Name</span><br><input type="text" id="productName" name="productName" class="input-text" value="<?php echo $row['namaProduk']?>" /><br>
			<span class="font-small">Description (max 200 chars)</span><br><textarea id="productDescription" name="productDescription"  rows="4" cols="50" class="input-textarea"><?php echo $row['description']?></textarea><br>
			<span class="font-small">Price (IDR)</span><br><input type="text" id="productPrice" name="productPrice" class="input-text" value="<?php echo $row['price']?>"/><br>
			<span class="font-small">Photo</span><br><input type="file" id="fileToUpload" name="fileToUpload" style="color:transparent; width:90px"/><label id="fileLabel"><?php echo $row['image_name'] ?></label><br><br>
			<a href="catalog.php?id_active=<?php echo $id_active2; ?>" class="cancel-button float-right">CANCEL</a>

			<input type="submit" value="UPDATE" name="update" class="button float-right" >
		</form>
		<script src="js/editProduct.js"></script>		
	</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$newName = $_POST['productName'];
		$newDescription = $_POST['productDescription'];
		$newPrice = $_POST['productPrice'];

		$conn = connect_db();
		$update = "UPDATE product SET namaProduk = '$newName', description = '$newDescription', price = '$newPrice' WHERE user_id = '$id_active2' AND p_id = '$pid' ";
		$result = mysqli_query($conn,$update);
		if($result) {
			$url = "your_products.php" ;
			$url_query = parse_url($url, PHP_URL_QUERY);
			$url .= '?id_active=' .$id_active;
			header('Location:' .$url);
		} else {
			echo "Update Failed.";
		}
	}
?>