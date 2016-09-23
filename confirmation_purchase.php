<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation Purchase</title>
	</head>
	<body>
		<h1>SaleProject</h1>
		<p>Hi, chirastore!</p>
		<p><a href="#">logout</a></p>
		<ul>
			<li><a href="">Catalog</a></li>
			<li><a href="">Your Products</a></li>
			<li><a href="">Add Product</a></li>
			<li><a href="">Sales</a></li>
			<li><a href="">Purchases</a></li>
		</ul>
		<h3>Please confirm your purchase</h3>
		<hr />
		<form method="post" action="">
			<p>Product : Baseball Jacket</p>
			<p>Price : IDR 500.000</p>
			<p>Quantity :
				<input type="text" name="quantity">
				pcs
			</p>
			<p>Total Price : IDR 1.500.00</p>
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
				<input type="submit" value="Confirm">
			</div>
			<p><a href="">Cancel</a></p>
		</form>
	</body>
</html>