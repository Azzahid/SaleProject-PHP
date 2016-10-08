<?php 
require_once('db.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST['id'];
	$user = $_POST['user'];
	$conn = connect_db();
	$query = "SELECT * FROM user_like WHERE user_id = '".$user."'AND barang_id='".$id."'";
	$result = $conn->query($query);
	$hasil = array();
	if($result){
		if($result->num_rows >0){
			$status = 0;
			$query = "SELECT * FROM user_like WHERE status != 0 AND user_id = '".$user."'AND barang_id='".$id."'";
			$result = $conn->query($query);
			if($result->num_rows > 0){
				$status = 1;
			}
			if($status == 0){
				$query = "UPDATE user_like SET status = 1 WHERE user_id = '".$user."'AND barang_id='".$id."'";
				array_push($hasil, "Liked");
			}else{
				$query = "UPDATE user_like SET status = 0 WHERE user_id = '".$user."'AND barang_id='".$id."'";
				array_push($hasil, "Like");
			}
			$result = $conn->query($query);
		}else{
			$query = "INSERT INTO user_like (user_id, barang_id, status) VALUES ('".$user."','".$id."',1)";
			$result = $conn->query($query);
			array_push($hasil,"Liked");
		}
		$query = "SELECT * FROM user_like WHERE status != 0 AND barang_id = '".$id."'";
		$result = $conn->query($query);
		$likes = 0;
		if($result){
			if($result->num_rows >0){
				//output
				$likes = $result->num_rows;
			}
		}
		array_push($hasil, $likes);
		mysqli_close($conn);
		echo json_encode($hasil);
	}else{
		echo "mysql failure";
	}
}
?>