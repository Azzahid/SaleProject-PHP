<?php
	//session_start();
	require_once('authentication.php');
?>

<div class = "text-align-center arial">
	<h1><span class="color-red">Sale</span><span class="color-blue">Project</span></h1>
</div>
<p class="text-align-right">Hi, <?php echo $username; ?>!<br />
<a href="login.php" class="link color-red">logout</a></p>
<div>
	<ul>
		<li><a href="catalog.php?id_active=<?php echo $id_active ?>" <?php if(isset($catalog)) echo 'class="active"' ?>><span>Catalog</span></a></li>
		<li><a href="your_products.php?id_active=<?php echo $id_active ?>" <?php if(isset($your_products)) echo 'class="active"' ?>><span>Your Products</span></a></li>
		<li><a href="add_product.php?id_active=<?php echo $id_active ?>" <?php if(isset($add_product)) echo 'class="active"' ?>><span>Add Product</span></a></li>
		<li><a href="sales.php?id_active=<?php echo $id_active ?>" <?php if(isset($sales)) echo 'class="active"' ?>><span>Sales</span></a></li>
		<li><a href="purchases.php?id_active=<?php echo $id_active ?>" <?php if(isset($purchases)) echo 'class="active"' ?>><span>Purchases</span></a></li>
	</ul>
</div>