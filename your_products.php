<?php
	require_once('db.php');

	$your_products = true;
	$id_active = $_GET['id_active'];

	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["d"])) {
		if($_GET['d'] != "") {
			$conn = connect_db();
			$p_id = $_GET["d"];
			$sql = "DELETE FROM product WHERE p_id='$p_id'";

			if (mysqli_query($conn, $sql)) {
			    // echo "Record deleted successfully";
			} else {
			    // echo "Error deleting record: " . mysqli_error($conn);
			}
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$conn = connect_db();

		$id_product = $_POST['id_product'];
		$id_active = $_POST['id_active'];

		$sql = "INSERT INTO user_like (user_id, barang_id, status)
		VALUES ('$id_active', '$id_product', 1)";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
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
				        $date = new DateTime($row['created_at']);
						echo "<span class='product-date'>".date_format($date, "l, d F Y")."</span><br />";
						echo "<span class='product-time'>at ".date_format($date, "G:i")."</span>";
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
								echo "<span class='delete' onclick='delete_item(this.id)' id='".$row['p_id']."'>DELETE</span>";
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