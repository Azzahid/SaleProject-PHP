<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
	</head>
	<body>
		<h1 style="text-align: center;">Sale<span style="color: blue">Project</span></h1>
		<form method="POST" action="login.php">
			<h2 style="border-bottom: 1px solid;margin-bottom: 10px;">Login Here</h2>
			Email or Username :<br>
			<input type="text" name="username"><br>
			Password :<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Login" name="login" style="float: right;">
			<!-- <button type="button" style="float: right;">Login</button> -->
			
		</form>
		
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
				$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
				$result = mysqli_query($conn,$query);
				if(mysqli_num_rows($result) == 1){
					//echo "Login succeeded";
					header('Location: home.html');
				} else {
					echo "Wrong username or password";
				}
			}
			/*
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
				//$result = mysqli_query($conn, $sql);
				if(mysqli_query($conn, $sql)){
					echo "Welcome back, you have successfully logged in !";
					exit();
				}	
				else {
					echo "Invalid Login, check password or username !";
					exit();
				}
			}*/
		?>
	</body>
</html>