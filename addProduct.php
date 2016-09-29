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
			<!-- bar question -->
			<div>
				<h3 id="buyquestion">What are you going to buy today ?</h3>
			</div>
			<!-- search form -->
			<form action="catalog.php" method="get">
				<div class="overflow margin10">
					<input type ="text" id="searchbar" name="search" 
					placeholder="Search catalog ...">
					<button id="gobutton" class="bluebox">GO</button>
				</div>
				<div class="overflow">
					<div class="floatl">by :</div>
					<div class="floatl">
						<input type ="radio" name = "option" value=0 checked>
						<label for="option"><span><span></span></span>product</label>
						<br>
						<input type ="radio" name = "option" value=1>
						<label for="option"><span><span></span></span>store</label>
					</div>
				</div>
			</form>
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