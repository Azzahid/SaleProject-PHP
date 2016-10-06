<?php
	$add_product = true;
?>

<?php
	include('header.php');
	if(isset($_POST['addsubmit'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["productPicture"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["addsubmit"])) {
		    $check = getimagesize($_FILES["productPicture"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$url = "your_products.php" ;
		$url_query = parse_url($url, PHP_URL_QUERY);
		$url .= '?id_active=' .$id_active;
		header('Location:' .$url);
	}
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
		<div class = "border-bottom ">
			<h2>Please add your product here</h2>
		</div>
		<form method="post" action="add_product.php?id_active=<?php echo $id_active ?>" enctype="multipart/form-data">
			Name<br><input type="text" name="productName" /><br>
			Description (max 200 chars)<br><textarea name="productDescription" rows="4" cols="50"></textarea><br>
			Price (IDR)<br><input type="text" name="productPrice" /><br>
			Photo<br><input type="file" name="productPicture" id="productPicture"/><br><br>
			<input type="submit" value="ADD" name="addsubmit"/>
			<input type="submit" value="CANCEL" name="cancelsubmit"/>
		</form>
	</body>
</html>
