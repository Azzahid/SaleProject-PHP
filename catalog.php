<?php
require_once('db.php');

function getProduct($search, $option){
	$conn = connect_db();
	$query = "SELECT fullname, prod_id, prod_name, prod_price, prod_like, prod_purc,
	prod_expl, user_id, prod_date, prod_img FROM products, user WHERE products.user_id=user.id";
	$result = $conn->query($query);
	
	if($result->num_rows >0){
		//output
		while($row = $result->fetch_assoc()){
			$date = strtotime($row.["prod_date"]);
			echo '<div>
				<div>
					<div>'.$row["fullname"].'</div>
					<div>added this on '.date("l, j F Y, ",$date).' at '.
					date("H:i",$date).'</div>
				</div>
				<div>
					<img src="'.$row["prod_img"].'" alt="product.jpg" id="pic">
					<div>'.$row["prod_name"].'</div>
					<div>'.$row["prod_price"].'</div>
					<div>'.$row["prod_expl"].'</div>
				</div>
				<div>
					<div>
						<div>'.$row["prod_like"].'</div>
						<div>'.$row["prod_purc"].'</div>
					</div>
					<div>
							<button>Like</button>
							<button>Buy</button>
					</div>
				</div>
				</div>';
		}
	}
	mysqli_close($conn);
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
	$search = $_GET["search"];
	$option = $_GET["option"];
	getProduct($search, $option);
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
		<?php include 'header.php'; ?>
		<!-- bar question -->
		<div>
			<h3 id="buyquestion">What are you going to buy today ?</h3>
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
		<div style="padding-top: 20px; padding-bottom:20px;">
			<div>
				<div style="font-weight: bold;">"$store_name"</div>
				<div name="tanggal">added this on"$tanggal"</div>
			</div>
			<div style ="padding:10px; border-top: 1px black solid; border-bottom: 1px black solid; overflow:hidden;">
				<img src="/home/zahid/Downloads/catalog.jpg" alt="product.jpg" style="width:100px; height:100px;float:left">
				<div style="float:left;">
					<div>$Nama_Produk</div>
					<div>$Harga_Produk</div>
					<div>$details</div>
				</div>
				<div style="float:right;">
					<div>
						<div>$jumlah likes</div>
						<div>$jumlah purchases</div>
					</div>
					<div>
						<button style="float:left;">Like</button>
						<button style="float:right;">Buy</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
