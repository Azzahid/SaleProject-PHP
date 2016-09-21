<?php
	$host = "localhost:4433";
	$db_username = "root";
	$db_password = "";
	$db_name = "db1";

	mysql_connect($host,$db_username,$db_password);
	mysql_select_db($db_name);

	$username = $_POST['username'];
	$password = $_POST['password'];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1){
			echo "Welcome back, you have successfully logged in !";
			exit();
		}	
		else {
			echo "Invalid Login, check password or username !";
			exit();
		}
	}
?>

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
			<button type="button" style="float: right;">Login</button>
			
		</form>
	</body>
</html>