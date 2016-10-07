<?php
	$add_product = true;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Product</title>
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
			<h2>Please add your product here</h2>
		</div>
		<form method="POST" name="addForm" id="addForm" onsubmit="return validateform()" action= "" enctype="multipart/form-data">	
			<span class="font-small">Name</span><br><input type="text" id="productName" name="productName" class="input-text" /><br>
			<span class="font-small">Description (max 200 chars)</span><br><textarea id="productDescription" name="productDescription" rows="4" cols="50" class="input-textarea"></textarea><br>
			<span class="font-small">Price (IDR)</span><br><input type="text" id="productPrice" name="productPrice" class="input-text" /><br>
			<span class="font-small">Photo</span><br><input type="file" id="fileToUpload" name="fileToUpload" /><br><br>
			<a href="catalog.php?id_active=<?php echo $id_active2; ?>" class="cancel-button float-right">CANCEL</a>

			<input type="submit" value="ADD" name="addsubmit" class="button float-right" >
		</form>
		<script src = "js/addProduct.js"></script>
	</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$con = connect_db();
		$name = $_POST['productName'];
		$desc = $_POST['productDescription'];
		$price = $_POST['productPrice'];
		$id_active = $_GET["id_active"];
		$image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
		$imageProperties = getimageSize($_FILES['fileToUpload']['tmp_name']);
		$image_name = addslashes($_FILES['fileToUpload']['name']);
		$query = "INSERT INTO product (namaProduk, description, price, photo_url, created_at, user_id, image_type, image_name) VALUES('$name', '$desc', '$price', '{$image}', now(), '$id_active', '{$imageProperties['mime']}', '$image_name')";
		$result = mysqli_query($con,$query);
		if($result){
			$url = "your_products.php" ;
			$url_query = parse_url($url, PHP_URL_QUERY);
			$url .= '?id_active=' .$id_active;
			header('Location:' .$url);
		}
	}
?>
