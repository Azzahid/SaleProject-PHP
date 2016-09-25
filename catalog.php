
<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type ="text/css" href=catalog.css>
		<script src="catalog.js"></script>
	</head>
	<body>
		<div id="page">
			<h1 id="head">Sale<span id="blue">Project</span></h1>
			<div id="right">Hi, chirastore!</div>
			<div style="position : relative;">
				<button class="out">logout</button>
			</div>
			<div style="padding-top:20px; padding-bottom:20px;">
				<button class="choose" id="bluebox">Catalog</button>
				<button class="choose">Your Product</button>
				<button class="choose">Add Product</button>
				<button class="choose">Sales</button>
				<button class="choose">Purchases</button>
			</div>
			<div>
				<h3 id="clrh">What are you going to buy today ?</h3>
			</div>
			<div>
				<form action="catalog.php" method="get">
					<input type ="text" class="search" 
					value="Search Catalog ..." onclick="valKosong()" 
					name="search" id="search">
					<button class="go" id="bluebox">GO</button>
					<div style="margin-top:10px;">
						by :
						<input type ="radio" name = "option" value="product" checked>product
						<br>
						<input type ="radio" name = "option" value="store">store
					</div>
				</form>
			</div>
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
	

<?php
$servername = "localhost";
$db_username ="root";
$db_password = "bismillah";
$dbname = "db1";

function connect_db(){
	global $servername, $db_username, $db_password, $dbname;
	// Create connection
	$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

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
		</div>
	</body>
</html>
