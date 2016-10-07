<?php
	$your_products = true;
	$id_active = $_GET['id_active'];
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
		<span id="id_active" <?php echo 'value="'.$id_active.'"' ?>></span>
		<div class = "border-bottom ">
			<h2>What are you going to sell today?</h2>
		</div>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$id_active = $_GET['id_active'];
				$conn = connect_db();

				$sql = "SELECT * FROM product WHERE user_id='$id_active'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<div class='product'>";
						echo "<span class='product-date'>".$row["created_at"]."</span><br />";
						echo "<span class='product-time'>at 20.00</span>";
						echo "<hr />";
						echo "<img src='getImage.php?id_active=".$row["p_id"]."' alt='product-image' width='100px' height='100px'>";
						echo "<div class='product-center-description'>";
							echo "<span class='product-name'>".$row["namaProduk"]."</span><br />";
							echo "<span class='product-price'>IDR ".number_format($row["price"])."</span><br />";
							echo "<span class='product-desc'>".$row["description"]."</span><br />";
						echo "</div>";

						echo "<div class='product-right-description'>";
							echo "<div class='margin-top'>	";
									$sql = "SELECT COUNT(*) AS likes FROM user_like WHERE barang_id='".$row['p_id']."'";
									$result2 = $conn->query($sql);
									if ($result2->num_rows > 0) {
				    					// output data of each row
				    					while($row2 = $result2->fetch_assoc()) {
				    						$likes = $row2["likes"];
				    					}
				    				}
				    				else {
										$likes = 0;
				    				}
									echo "<span class='product-desc'>".$likes." likes<br />";
									$sql = "SELECT COUNT(*) AS purchases FROM purchase WHERE product_id='".$row['p_id']."'";
									$result3 = $conn->query($sql);
									if ($result3->num_rows > 0) {
				    					// output data of each row
				    					while($row3 = $result3->fetch_assoc()) {
				    						$purchases = $row3["purchases"];
				    					}
				    				}
				    				else {
										$purchases = 0;
				    				}
									echo $purchases." purchases</span><br />";
							echo "</div>";
							echo "<div class='margin-top'>";
								echo "<span class='edit' onclick='edit_item(this.id);' id='".$row['p_id']."'>EDIT</span>";
								echo "<span class='delete' onclick='delete_item(this.id)' >DELETE</a>";
							echo "</div>";
						echo "</div>			";
						echo "<hr class='full' />";
					echo "</div>	";

				    }
				} else {
				    echo "0 results";
				}
			}	
		?>		
	</body>

	<script type="text/javascript" src="js/your_products.js"></script>
</html>