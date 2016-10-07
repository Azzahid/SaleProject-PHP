<?php
	$your_products = true;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Your Products</title>
		<link rel="stylesheet" type="text/css" href="css/products.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/header.css">
	</head>
	<body class="body-center helvetica">
		<?php include 'header.php'; ?>
		<div class = "border-bottom ">
			<h2>What are you going to sell today?</h2>
		</div>
		<div class="product">
			<span class="product-date">Sunday, 14 September 2016</span><br />
			<span class="product-time">at 20.00</span>
			<hr />
			<img src="http://placekitten.com/100/100" alt="product-image">
			<div class="product-center-description">
				<span class="product-name">Phelps Air Styler</span><br />
				<span class="product-price">IDR 500.000</span><br />
				<span class="product-desc">Brush shaped hair dryer. Very convenient plus conditioning with keratin smooth.</span><br />
				<span class="product-bottom-desc">bought by me</span>				
			</div>

			<div class="product-right-description">
				<div class="margin-top">	
						<span class="product-desc">96 likes<br />
						2 purcahases</span><br />
				</div>
				<div class="margin-top">
					<span class="edit" onclick="edit_item(this.id);" id="1">EDIT</span>
					<span class="delete" onclick="delete_item()">DELETE</a>
				</div>
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
		<div style="position:relative; border: 1px solid red;width: 40px; height: 40px;">
   <div style="border:1px solid green;position: absolute; bottom: 0; left: 0; width: 20px; height: 20px;"></div>
   <div style="border:1px solid blue;position: absolute; bottom: 0; left: 20px; width: 20px height: 20px;"></div>
</div>
	</body>

	<script type="text/javascript" src="js/your_products.js"></script>
</html>