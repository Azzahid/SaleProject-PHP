<?php
require_once('db.php');
$catalog = true;

function getProduct($search = "default", $option = 0){
	$conn = connect_db();
	if($search == 'default'){
		$query = "SELECT p_id, username, namaProduk, description, price, photo_url, created_at, image_type  FROM product, user WHERE product.user_id=user.id ORDER BY created_at DESC";
	}else{
		if($option == 0 )
		{
			$query = "SELECT p_id, username, namaProduk, description, price, photo_url, created_at, image_type  FROM product, user WHERE product.user_id=user.id AND product.namaProduk LIKE '%".$search."%' ORDER BY created_at DESC";
		}else{
			$query = "SELECT p_id, username, namaProduk, description, price, photo_url, created_at, image_type  FROM product, user WHERE product.user_id=user.id AND user.username LIKE '%".$search."%' ORDER BY created_at DESC";
		}
	}
	$result = $conn->query($query);
	
	if($result->num_rows >0){
		//output
		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
			#echo "kucing";
		}
		foreach ($array as $row) {
			$date = strtotime($row["created_at"]);
			echo '<div class = "product">
				<div>
					<div class="product-date">'.$row["username"].'</div>
					<div class="product-time">added this on '.date("l, j F Y, ",$date).' at '.
					date("H:i",$date).'</div>
				</div> <hr />';
			echo "<img src='getImage.php?id_active=".$row["p_id"]."' alt='product-image' width='100px' height='100px'>";
			echo '<div class = "product-center-description">
						<span class="product-name">'.$row["namaProduk"].'</span><br />
						<span class="product-price">IDR '.str_replace(',', '.', number_format($row["price"])).'</span><br />
						<span class="product-desc">'.$row["description"].'</span><br />
				</div>';
			$query = "SELECT * FROM user_like WHERE status != 0 AND barang_id = ".$row['p_id']."";
			$result = $conn->query($query);
			$likes = 0;
			if($result->num_rows >0){
				//output
				$likes = $result->num_rows;
			}
			echo '<div class="product-right-description">
					<div class = "margin-top">
						<span class="product-desc" id = "'.$row['p_id'].'-num">'.$likes.'
						</span><span class="product-desc"> Likes</span>';
			$query = "SELECT * FROM purchase WHERE product_id = '".$row['p_id']."'";
			$result = $conn->query($query);
			$purchase = 0;
			if($result->num_rows >0){
				//output
				$purchase = $result->num_rows;
			}
			$query = "SELECT * FROM user_like WHERE status != 0 AND user_id = '".$_GET['id_active']."' AND barang_id = '".$row['p_id']."'";
			$result = $conn->query($query);
			$status = 0;
			if($result->num_rows >0){
				//output
				$status = 1;
			}
			echo		'<div class="product-desc">'.$purchase.' purchases</div>
					</div>
					<div class = "margin-top">
							<button class = "color-blue like font-bold" id ="'.$row['p_id'].'" onclick = "like(this.id,'.$_GET['id_active'].')">';
			if($status == 1){
				echo "LIKED";
			}else{
				echo "LIKE";
			} 
			echo'			</button>
							<a class="link color-green font-bold" href ="confirmation_purchase.php?id_active='.$_GET['id_active'].'&id_product='.$row['p_id'].'"><span >BUY</span></a>
					</div>
				</div>
				<hr class="full" />
				</div>';
		}
	}else{
		echo "Product Not Found";
	}
	mysqli_close($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id_active = $_POST["id_active"];
	$id_product = $_POST["id_product"];
	$quantity = $_POST["quantity"];
	$consignee = $_POST["consignee"];
	$full_address = $_POST["full_address"];
	$postal_code = $_POST["postal_code"];
	$phone_number = $_POST["phone_number"];
	$credit_card = $_POST["credit_card"];
	$card_verification = $_POST["card_verification"];
	$product_name = $_POST["product_name"];
	$product_description = $_POST["product_description"];
	$product_price = $_POST["product_price"];
	$seller_id = $_POST["seller_id"];

	$conn = connect_db();
	$sql = "SELECT photo_url, image_type FROM product WHERE p_id = '$id_product'";
  	$result = mysqli_query($conn,$sql);
  	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$product_photourl = addslashes($row['photo_url']);
	    	$image_type = $row['image_type'];
	    }
	} else {
	    $product_photourl = null;
	    $image_type = NULL;
	}

	$sql = "INSERT INTO purchase (buyer_id, product_id, consignee, fulladdress, quantity, creditcardnumber, postalcode, phonenumber, created_at, card_verification, product_name, product_description, product_price, product_photourl, seller_id, image_type) VALUES ('$id_active', '$id_product', '$consignee', '$full_address', '$quantity', '$credit_card', '$postal_code', '$phone_number', now(), '$card_verification', '$product_name', '$product_description', '$product_price', '{$product_photourl}', '$seller_id', '$image_type')";
  	$result = mysqli_query($conn,$sql);
  	if ($result) {
	    // echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type ="text/css" href="css/catalog.css">
		<link rel="stylesheet" type ="text/css" href="css/style.css">
		<link rel="stylesheet" type ="text/css" href="css/header.css">
		<link rel="stylesheet" type ="text/css" href="css/products.css">
	</head>
	<body class="body-center helvetica">		
		<?php include 'header.php'; ?>
		<!-- bar question -->
		<div class = "border-bottom ">
			<h2>What are you going to buy today ?</h2>
		</div>
		<!-- search form -->
		<form action="catalog.php" method="get">
			<input type="hidden" name="id_active" <?php echo "value='".$_GET['id_active']."'" ?> />
			<div class="overflow margin10">
				<input type ="text" id="searchbar" name="search" 
				placeholder="Search catalog ...">
				<button type = "submit" id="gobutton" class="bluebox">GO</button>
			</div>
			<div class="overflow">
				<div class="floatl">by :</div>
				<div class="floatl">
					<input type ="radio" name = "option" value=0 checked>
					<label for="option"><span><span></span></span>product</label>
					<br>
					<input type ="radio" name = "option" value=1>
					<label for="option"><span><span></span></span>store</label>
				</div>
			</div>
		</form>
		<!--BagianProduk rencananya pake PHP di echo satu-satu-->
		<div id = "search">
			<?php 
				if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"]) && isset($_GET["option"])){
					$search = $_GET["search"];
					$option = $_GET["option"];
					getProduct($search, $option);
				}else{
					getProduct();
				}
			?>
		</div>
		<script type="text/javascript" src="js/catalog.js"></script>
	</body>
</html>
