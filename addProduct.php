<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Catalog</title>
		<link rel="stylesheet" type ="text/css" href=catalog.css>
		<script src="catalog.js"></script>
	</head>
	<body>
		<div id="webpage">
			<h1 id="head">Sale<span class="blue">Project</span></h1>
			<div class="right">Hi, <?php echo $_SESSION['ses_username']; ?></div>
			<!-- logout -->
			<div class="overflow">
				<button id="logout" onclick="logout()">logout</button> 
			</div>
			<!-- menu bar -->
			<div id="menubar">
				<button class="menubutton bluebox">Catalog</button>
				<button class="menubutton">Your Product</button>
				<button class="menubutton" >Add Product</button>
				<button class="menubutton">Sales</button>
				<button class="menubutton">Purchases</button>
			</div>

			<h2>Please add your product here</h2>
			<br>
			<form method="post" action="addProduct.php">
				Name<br><input type="text" name="productName" /><br>
				Description (max 200 chars)<br><textarea name="productDescription" rows="4" cols="50"></textarea><br>
				Price (IDR)<br><input type="text" name="productPrice" /><br>
				Photo<br><input type="file" name="productPicture"/><br><br>
				<input type="submit" value="ADD" name="addsubmit"/>
				<input type="submit" value="CANCEL" name="cancelsubmit"/>
			</form>
		</div>
	</body>
</html>
