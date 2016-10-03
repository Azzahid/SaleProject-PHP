<?php
	session_start();
?>
<div class = "text-align-center arial">
	<h1><span class="color-red">Sale</span><span class="color-blue">Project</span></h1>
</div>
<p class="text-align-right">Hi, chirastore!<br />
<a href="login.php" class="link color-red">logout</a></p>
<div>
	<ul>
		<li><a href="catalog.php?id_active=<?php echo $_SESSION['idactive'] ?>"><span>Catalog</span></a></li>
		<li><a href="your_products.php?id_active=<?php echo $_SESSION['idactive'] ?>"><span>Your Products</span></a></li>
		<li><a href="addProcuct.php?id_active=<?php echo $_SESSION['idactive'] ?>"><span>Add Product</span></a></li>
		<li><a href="sales.php?id_active=<?php echo $_SESSION['idactive'] ?>"><span>Sales</span></a></li>
		<li><a href="purchases.php?id_active=<?php echo $_SESSION['idactive'] ?>"><span>Purchases</span></a></li>
	</ul>
</div>