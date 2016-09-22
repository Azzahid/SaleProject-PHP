<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<?php
			$host = "localhost";
			$db_username = "root";
			$db_password = "";
			$db_name = "db1";

			$conn = mysqli_connect($host,$db_username,$db_password,$db_name);			
			//check connection
			if(!$conn)
				die("Connection failed : " . mysqli_connect_error());
			
			if(isset($_POST['login'])){
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
				$query = "SELECT * FROM user WHERE username = '$username' OR email = '$username' AND password = '$password' LIMIT 1";
				$result = mysqli_query($conn,$query);
				if(mysqli_num_rows($result) == 1){
					echo "Login succeeded"; //sementara pake echo buat tanda berhasilnya, kalo halaman home nya dah jadi pake code dibawah buat pindah halaman
					//header('Location: home.html'); // intinya nanti diisi ke halaman home nya
				} else {
					echo "Wrong username or password";
				}
			}
		?>
	</body>
</html>