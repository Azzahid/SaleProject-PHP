<?php
	$your_products = true;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Products</title>
		<link rel="stylesheet" type="text/css" href="css/your_products.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
	</head>
	<body class="body-center helvetica">
		<?php include 'header.php'; ?>
		<div class = "border-bottom ">
			<h2>Please register</h2>
		</div>
		<div class="product">
			<strong>Sunday, 14 September 2016</strong><br />
			at 20.00
			<hr />
			<img src="http://placekitten.com/100/100" alt="product-image">
			<div class="description">
				<p><strong>Phelps Air Styler</strong><br />
				<span class="price">IDR 500.000</span><br />
				Brush shaped hair dryer. Very convenient plus conditioning with keratin smooth.</p>
			</div>

			<div class="side-description">
				<p >96 likes<br />
				2 purchases</p>
				<span class="edit" onclick="edit_item(this.id);" id="1">EDIT</span>
				<span class="delete" onclick="delete_item()">DELETE</a>
			</div>			
			<hr class="full" />
		</div>	

		<div class="product">
			<strong>Sunday, 14 September 2016</strong><br />
			at 20.00
			<hr />
			<img src="http://placekitten.com/100/100" alt="product-image">
			<div class="description">
				<p><strong>Phelps Air Styler</strong><br />
				<span class="price">IDR 500.000</span><br />
				Brush shaped hair dryer. Very convenient plus conditioning with keratin smooth.</p>
			</div>

			<div class="side-description">
				<p >96 likes<br />
				2 purchases</p>
				<span class="edit" onclick="edit_item(this.id);" id="2">EDIT</span>
				<span class="delete" onclick="delete_item()">DELETE</a>	
			</div>			
			<hr class="full" />
		</div>			
	</body>

	<script type="text/javascript" src="js/your_products.js"></script>
</html>