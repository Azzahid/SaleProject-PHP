<?php
require_once('db.php');
$catalog = true;

function getProduct(){
	$conn = connect_db();
	$query = "SELECT p_id, username, namaProduk, description, price, photo_url, created_at, image_type  FROM product, user WHERE product.user_id=user.id";
	$result = $conn->query($query);
	echo "kucing";
	if($result->num_rows >0){
		//output
		echo "kucing";
		while($row = $result->fetch_assoc()){
			$date = strtotime($row["created_at"]);
			echo '<div class = "product">
				<div>
					<div class="product-date">'.$row["username"].'</div>
					<div class="product-time">added this on '.date("l, j F Y, ",$date).' at '.
					date("H:i",$date).'</div>
				</div>
				<img src="'.$row["prod_img"].'" alt="product.jpg" id="pic">
				<div class = "product-center-description">
						<span class="product-name">'.$row["namaProduk"].'</span><br />
						<span class="product-price">'.$row["price"].'</span><br />
						<span class="product-desc">'.$row["description"].'</span><br />
				</div>
				<div class="product-right-description">
					<div class = "margin-top">
						<div class="product-desc">NaN</div>
						<div class="product-desc">NaN</div>
					</div>
					<div class = "margin-top">
							<div class = "blue">Like</div>
							<div class = "red">Buy</div>
					</div>
				</div>
				</div>';
		}
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
			<div class="overflow margin10">
				<input type ="text" id="searchbar" name="search" 
				placeholder="Search catalog ...">
				<button id="gobutton" class="bluebox">GO</button>
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
		<?php 
			getProduct();
			if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"]) && $_GET["option"]){
				$search = $_GET["search"];
				$option = $_GET["option"];
				#getProduct($search, $option);
			}
		?>
	</body>
</html>
