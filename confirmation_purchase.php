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
	    	$product_photourl = $row['photo_url'];
	    	$seller_id = $row['user_id'];
	    }
	} else {
	    $product_name = 'error';
    	$product_price = 'error';
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
	$product_photourl = $_POST["product_photourl"];
	$seller_id = $_POST["seller_id"];

	$conn = connect_db();
	$sql = "INSERT INTO purchase (buyer_id, product_id, consignee, fulladdress, quantity, creditcardnumber, postalcode, phonenumber, created_at, card_verification, product_name, product_description, product_price, product_photourl, seller_id) VALUES ('$id_active', '$id_product', '$consignee', '$full_address', '$quantity', '$credit_card', '$postal_code', '$phone_number', now(), '$card_verification', '$product_name', '$product_description', '$product_price', '$product_photourl', '$seller_id')";
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
		<title>Confirmation Purchase</title>
		<link rel="stylesheet" type="text/css" href="css/your_products.css">
	</head>
	<body>
		<div class="row-center">
			<?php include 'header.php'; ?>
			<h3>Please confirm your purchase</h3>
			<hr />

			<form method="post" action="" id="purchase_form">
				<span id="product_price" value="<?php echo $product_price; ?>"></span>
				<input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
				<input type="hidden" name="id_active" value="<?php echo $id_active; ?>">
				<input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
				<input type="hidden" name="product_description" value="<?php echo $product_description; ?>">
				<input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
				<input type="hidden" name="product_photourl" value="<?php echo $product_photourl; ?>">
				<input type="hidden" name="seller_id" value="<?php echo $seller_id; ?>">
				<p>Product : <?php echo $product_name; ?></p>
				<p>Price : IDR <?php echo number_format($product_price); ?></p>
				<p>Quantity :
					<input type="text" name="quantity" value="1" onkeyup="updateTotalPrice()" id="quantity">
					pcs
				</p>
				<p>Total Price : IDR <span id="total_price"><?php echo number_format($product_price); ?></span></p>
				<p>Delivery to :</p>
				<div>
					<label for="consignee">Consignee</label><br />
					<input type="text" name="consignee" id="consignee" value="<?php echo $consignee ?>">
				</div>
				<div>
					<label for="full_address">Full Address</label><br />
					<textarea name="full_address" rows="5" cols="50" id="full_address"><?php echo trim($full_address) ?></textarea>
				</div>
				<div>
					<label for="postal_code">Postal Code</label><br />
					<input type="text" name="postal_code" id="postal_code" value="<?php echo $postal_code ?>">
				</div>
				<div>
					<label for="phone_number">Phone Number</label><br />
					<input type="text" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>">
				</div>
				<div>
					<label for="credit_card">12 Digits Credit Card Number</label><br />
					<input type="text" name="credit_card" id="credit_card">
				</div>
				<div>
					<label for="card_verification">3 Digits Card Verification Value</label><br />
					<input type="text" name="card_verification" id="card_verification">
				</div>
				<div>
					<input type="button" value="Confirm" onclick="getConfirmation();">
				</div>
				<p><a href="catalog.html">Cancel</a></p>
			</form>
		</div>
	</body>

	<script type="text/javascript" src="js/confirmation_purchase.js"></script>
</html>