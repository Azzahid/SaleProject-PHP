<?php 
require_once('db.php');
$purchases = true;

function getPurchase(){
	$conn = connect_db();
	$query = "SELECT * FROM purchase WHERE purchase.buyer_id = '".$_GET['id_active']."' ORDER BY created_at DESC";
	$result = $conn->query($query);
	if($result){
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$date = new DateTime($row['created_at']);
				echo '<div class = "product">';
					echo '<span class="product-date">'.date_format($date,'l, d F Y').'</span><br />';
					echo '<span class = "product-time">at '.date_format($date, "G.i")."</span>";
					echo '<hr />';
					echo '<img src="getImagePurchase.php?id_active='.$row["purchase_id"].'"alt="product-image" width="100px" height="100px">';
					echo "<div class='product-center-description'>";
							echo "<span class='product-name'>".$row["product_name"]."</span><br />";
							echo "<span class= 'product-price'>IDR ".str_replace(',', '.', number_format($row["product_price"]*$row["quantity"]))."</span><br />";
							echo "<span class='product-price'>".number_format($row["quantity"])." pcs</span><br />";
							echo "<span class='product-price'>@IDR ".str_replace(',', '.', number_format($row["product_price"]))."</span><br />";

					echo "</div>";
					echo "<div class='product-right-description'>";
						echo "<div class='margin-top'>	";
							echo "<span class='product-desc'>Delivery to <span \>";
							echo "<span class='product-desc'><b>".$row['consignee']."</b></span><br \>";
							echo "<span class='product-desc'>".$row["fulladdress"]."</span><br \>";
							echo "<span class='product-desc'>".$row["postalcode"]."</span><br \>";
							echo "<span class='product-desc'>".$row["phonenumber"]."</span><br \>";
						echo "</div>"; 
					echo "</div>";
					echo "<div class='product-center-description margin-top'>";
						echo "<span class='product-bottom-desc '>bought from ";
							$q = "SELECT * FROM user WHERE user.id = '".$row['seller_id']."'";
							$result2 = $conn->query($q);
							$buyer_username = "none";
							if($result2){
								if($result2->num_rows > 0){
									while($row2 = $result2->fetch_assoc()){
										$buyer_username = $row2["username"];
									}
								}
							}
						echo "<b>".$buyer_username."</b><span>";
					echo "</div>";
				echo "</div>";
			}
		}
	}else{
		echo "cat";
	}
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
		<title>Sales</title>
		<link rel="stylesheet" type ="text/css" href="css/catalog.css">
		<link rel="stylesheet" type ="text/css" href="css/style.css">
		<link rel="stylesheet" type ="text/css" href="css/header.css">
		<link rel="stylesheet" type ="text/css" href="css/products.css">
	</head>
	<body class="body-center helvetica">		
		<?php include 'header.php'; ?>
		<!-- bar question -->
		<div class = "border-bottom ">
			<h2>Here are your purchases</h2>
		</div>
		<!-- search form -->
		<!--BagianProduk rencananya pake PHP di echo satu-satu-->
		<div id = "sales">
			<?php
				getPurchase();
			?>
		</div>
		<script type="text/javascript" src="js/catalog.js"></script>
	</body>
</html>
