<?php
	ob_start();
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type ="text/css" href=login.css>
	</head>
	<body>
		<?php
			$host = "localhost";
			$db_username = "root";
			$db_password = "";
			$db_name = "db1";

			$conn = mysqli_connect($host,$db_username,$db_password,$db_name);
			if(!$conn)
				die("Connection failed : " . mysqli_connect_error());
			
			if(isset($_POST['login'])){
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
				$query = "SELECT * FROM user WHERE (username = '$username' OR email = '$username') AND password = '$password' LIMIT 1";
				$result = mysqli_query($conn,$query);
				
				// validate login
				if(mysqli_num_rows($result) == 1){
					// Get the id, to be added into url
					$id_active = "SELECT id FROM user WHERE username = '$username' OR email = '$username' AND password = '$password' LIMIT 1";
					$tempid = mysqli_query($conn,$id_active);
					$urlresult = mysqli_fetch_array($tempid);

					// Save id_active into session
					$_SESSION['idactive'] = $urlresult['id'];
					// Save username to the session
					$_SESSION['ses_username'] = mysqli_real_escape_string($conn, $_POST['username']);

					$url = "catalog.html" ;
					$url_query = parse_url($url, PHP_URL_QUERY);
					$url .= '?id_active=' .$_SESSION['idactive'];
					header('Location:' .$url);
				} else {
					$login_errmessage = "* Wrong username or password";
				}
			}
		?>
		<div class = "Sale">
			<h1><span style="color: red">Sale</span>Project</h1>
		</div>
		
		<div class = "login-header">
			<h2>Please login</h2>
		</div>
		<br>
		
		<div class = "login-form">
			<form method="POST" action="login.php">
				Email or Username <br><input type="text" name="username" style = "width: 100%; height: 25px;"><br><br>
				Password <br><input type="password" name="password" style = "width: 100%; height: 25px;"><br><br><br>
				<input type="submit" value="LOGIN" name="login" id="button">
				<span class="error" style="color: red;"><?php echo $login_errmessage;?></span>
			</form>
		</div>
		<br><br><br>
		<p id="reg-message"><b>Don't have an account yet? Register <a href = "register.html" id = "link"> here </a></b></p>
	</body>
</html>