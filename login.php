<?php
	require_once('db.php');
	ob_start();
	session_start();

	$conn = connect_db();
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

			$url = "catalog.php" ;
			$url_query = parse_url($url, PHP_URL_QUERY);
			$url .= '?id_active=' .$_SESSION['idactive'];
			header('Location:' .$url);
		} else {
			$login_errmessage = "* Wrong username or password";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type ="text/css" href="css/style.css">
</head>
<body class="body-center helvetica">
	<div class = "text-align-center arial">
		<h1><span class="color-red">Sale</span><span class="color-blue">Project</span></h1>
	</div>
	
	<div class = "border-bottom ">
		<h2>Please login</h2>
	</div>
	
	<div>
		<form method="POST" action="login.php">
			<span class="font-small">Email or Username</span><br><input type="text" name="username" class="input-text">
			<span class="font-small">Password</span><br><input type="password" name="password"  class="input-text"><br><br><br>
			<input type="submit" value="LOGIN" name="login" class="float-right button">
			<span class="error color-red"><?php if(isset($login_errmessage)) echo $login_errmessage;?></span>
		</form>
	</div>	
	<br><br><br>
	<p class="font-small"><strong>Don't have an account yet? Register <a href = "register.php" class="link"> here </a></strong></p>
	<?php include 'footer.php'; ?>
</body>
</html>