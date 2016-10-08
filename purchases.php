<?php 
require_once('db.php');
$purchases = true;

function getPurchase(){
	$conn = connect_db();
	$query = "SELECT * FROM purchase WHERE purchase.buyer_id = '".$_GET['id_active']."'";
	$result = $conn->query($query);
	if($result){
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$date = new DateTime($row['created_at']);
				echo '<div class = "product">';
					echo '<span class="product-date">'.date_format($date,'l, d F Y').'</span><br />';
					echo '<span class = "product-time">at '.date_format($date, "G:i")."</span>";
					echo '<hr />';
					echo '<img src="getImagePurchase.php?id_active='.$row["purchase_id"].'"alt="product-image" width="100px" height="100px">';
					echo "<div class='product-center-description'>";
							echo "<span class='product-name'>".$row["product_name"]."</span><br />";
							echo "<span class= 'product-price'>IDR".number_format($row["product_price"]*$row["quantity"])."</span><br />";
							echo "<span class='product-price'>".number_format($row["quantity"])."</span><br />";
							echo "<span class='product-price'>@IDR ".number_format($row["product_price"])."</span><br />";

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
						echo "<span class='product-desc '>bought from ";
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
