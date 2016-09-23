<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation Purchase</title>
		<link rel="stylesheet" type="text/css" href="css/your_products.css">
	</head>
	<body>
		<div class="row-center">
			<h1>SaleProject</h1>
			<p class="right">Hi, chirastore!<br />
			<a href="#" class="logout">logout</a></p>
			<div class="center">
				<ul>
					<li><a href=""><span>Catalog</span></a></li>
					<li><a href=""><span>Your Products</span></a></li>
					<li><a href=""><span>Add Product</span></a></li>
					<li><a href=""><span>Sales</span></a></li>
					<li><a href=""><span>Purchases</span></a></li>
				</ul>
			</div>
			<h3>What are you going to sell today?</h3>
			<hr />

			<form method="post" action="" id="purchase_form">
				<p>Product : Baseball Jacket</p>
				<p>Price : IDR 500.000</p>
				<p>Quantity :
					<input type="text" name="quantity" value="1" onchange="updateTotalPrice()" id="quantity">
					pcs
				</p>
				<p>Total Price : IDR <span id="total_price">1.500.000</span></p>
				<p>Delivery to :</p>
				<div>
					<label for="consignee">Consignee</label><br />
					<input type="text" name="consignee">
				</div>
				<div>
					<label for="full_address">Full Adress</label><br />
					<textarea name="full_adress" rows="5" cols="50">
					</textarea>
				</div>
				<div>
					<label for="postal_code">Postal Code</label><br />
					<input type="text" name="postal_code">
				</div>
				<div>
					<label for="phone_number">Phone Number</label><br />
					<input type="text" name="phone_number">
				</div>
				<div>
					<label for="credit_card">12 Digits Credit Card Number</label><br />
					<input type="text" name="credit_card">
				</div>
				<div>
					<label for="card_verification">3 Digits Card Verification Value</label><br />
					<input type="text" name="card_verification">
				</div>
				<div>
					<input type="button" value="Confirm" onclick="getConfirmation();">
				</div>
				<p><a href="">Cancel</a></p>
			</form>
		</div>
	</body>

	<script type="text/javascript" src="js/confirmation_purchase.js"></script>
</html>