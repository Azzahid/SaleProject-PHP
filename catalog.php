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
						<span class="product-price">'.$row["price"].'</span><br />
						<span class="product-desc">'.$row["description"].'</span><br />
				</div>';
			$query = "SELECT COUNT(*) AS total FROM user_like, product WHERE status != 0 AND barang_id = ".$row['p_id'];
			$result = $conn->query($query);
			$likes = 0;
			if($result->num_rows >0){
				//output
				while($row1= $result->fetch_assoc()){
					$likes = $row1['total'];
				}
			}
			echo '<div class="product-right-description">
					<div class = "margin-top">
						<div class="product-desc">'.$likes.' likes</div>';
			$query = "SELECT COUNT(*) AS total FROM purchase WHERE product_id = '".$row['p_id']."'";
			$result = $conn->query($query);
			$purchase = 0;
			if($result->num_rows >0){
				//output
				while($row2 = $result->fetch_assoc()){
					$purchase = $row2['total'];
				}
			}
			echo		'<div class="product-desc">'.$purchase.' purchase</div>
					</div>
					<div class = "margin-top">
							<span class = "blue" onclick = "like(this.id) id">Like</span>
							<a href ="confirmation_purchase.php?id_active='.$_GET['id_active'].'&id_product='.$row['p_id'].'"><span class = "red">Buy</span></a>
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

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type ="text/css" href="css/catalog.css">
		<link rel="stylesheet" type ="text/css" href="css/style.css">
		<link rel="stylesheet" type ="text/css" href="css/header.css">
		<link rel="stylesheet" type ="text/css" href="css/products.css">
		<script src="catalog.js"></script>
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
	</body>
</html>
