<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  	$id_active = $_GET["id_active"];
  	$conn = connect_db();
  	$sql = "SELECT * FROM user WHERE id = '$id_active'";
  	$result = mysqli_query($conn,$sql);
  	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$consignee = $row['fullname'];
	    	$full_address = $row['address'];
	    	$phone_number = $row['phonenumber'];
	    	$postal_code = $row['postalcode'];
	    }
	} else {
	    $consignee = 'error';
    	$address = 'error';
    	$phone_number = 'error';
    	$postal_code = 'error';
	}
	$id_product = $_GET["id_product"];
	$sql = "SELECT * FROM product WHERE p_id = '$id_product'";
  	$result = mysqli_query($conn,$sql);
  	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$product_name = $row['namaProduk'];
	    	$product_price = $row['price'];
	    	$product_description = $row['description'];
	    	$seller_id = $row['user_id'];
	    }
	} else {
	    $product_name = 'error';
    	$product_price = 'error';
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation Purchase</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
	</head>
	<body class="body-center helvetica">
		<div>
			<?php include 'header.php'; ?>
			<div class = "border-bottom ">
				<h2>Please confirm your purchase</h2>
			</div>

			<form method="post" <?php echo "action='purchases.php?id_active=".$_GET['id_active']."'" ?> id="purchase_form">
				<span id="product_price" value="<?php echo $product_price; ?>"></span>
				<input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
				<input type="hidden" name="id_active" value="<?php echo $id_active; ?>">
				<input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
				<input type="hidden" name="product_description" value="<?php echo $product_description; ?>">
				<input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
				<input type="hidden" name="seller_id" value="<?php echo $seller_id; ?>">
				<p>Product : <?php echo $product_name; ?></p>
				<p>Price : IDR <?php echo str_replace(',', '.', number_format($product_price)); ?></p>
				<p>Quantity :
					<input type="text" name="quantity" value="1" onkeyup="updateTotalPrice()" id="quantity">
					pcs
				</p>
				<p>Total Price : IDR <span id="total_price"><?php echo str_replace(',', '.', number_format($product_price)); ?></span></p>
				<p>Delivery to :</p>
				<div>
					<label for="consignee">Consignee</label><br />
					<input type="text" name="consignee" id="consignee" value="<?php echo $consignee ?>" class="input-text">
				</div>
				<div>
					<label for="full_address">Full Address</label><br />
					<textarea name="full_address" rows="5" cols="50" id="full_address" class="input-textarea	"><?php echo trim($full_address) ?></textarea>
				</div>
				<div>
					<label for="postal_code">Postal Code</label><br />
					<input type="text" name="postal_code" id="postal_code" value="<?php echo $postal_code ?>" class="input-text">
				</div>
				<div>
					<label for="phone_number">Phone Number</label><br />
					<input type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" class="input-text">
				</div>
				<div>
					<label for="credit_card">12 Digits Credit Card Number</label><br />
					<input type="text" name="credit_card" id="credit_card" class="input-text">
				</div>
				<div>
					<label for="card_verification">3 Digits Card Verification Value</label><br />
					<input type="text" name="card_verification" id="card_verification" class="input-text">
				</div>
				<div>
					<a <?php echo 'href="catalog.php?id_active='.$_GET["id_active"].'"'; ?> class="cancel-button float-right">CANCEL</a>

					<input type="button" value="CONFIRM" onclick="getConfirmation();" class="button float-right">
				</div>
			</form>
		</div>
		<?php include 'footer.php'; ?>
	</body>

	<script type="text/javascript" src="js/confirmation_purchase.js"></script>
</html>