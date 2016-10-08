<?php

/* 
	Source: http://www.w3schools.com/
*/
require_once('db.php');
$emailError = $unameError = "";

function register($full_name, $username, $email, $pass,$full_address, $postal_code, $phone_number) {
	$conn = connect_db();
	global $emailError, $unameError;
	$error = false;
	// check if username and email already exist
	
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "* Please enter valid email address.";
	} else {
		$query_email = "SELECT email FROM user WHERE email='$email'";
		$result_email = mysqli_query($conn,$query_email);
		$count_email = mysqli_num_rows($result_email);
		if($count_email != 0){
			$error = true;
			$emailError = "* Provided Email is already in use.";
		}
	}
	

	if(empty($username)){
		$unameError = "* Please enter the username.";
		$error = true;
	} else {
		$query_uname = "SELECT username FROM user WHERE username='$username'";
		$result_uname = mysqli_query($conn,$query_uname);
		$count_uname = mysqli_num_rows($result_uname);
		if($count_uname != 0){
			$error = true;
			$unameError = "* Provided Username already exist.";
		}
	}
	
	if(!$error){
		$sql = "INSERT INTO user (fullname, username, email, password, address, postalcode, phonenumber)
		VALUES ('$full_name', '$username', '$email', '$pass', '$full_address', '$postal_code', '$phone_number')";
		$result = mysqli_query($conn,$sql);

		if ($result) {
			echo "New user created successfully<br><br>";
			$id_active = "SELECT id FROM user WHERE username = '$username' OR email = '$username' AND password = '$password' LIMIT 1";
			$tempid = mysqli_query($conn,$id_active);
			$urlresult = mysqli_fetch_array($tempid);
			$url = "catalog.php" ;
			$url_query = parse_url($url, PHP_URL_QUERY);
			$url .= '?id_active=' .$urlresult['id'];
			header('Location:' .$url);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error();
		}
	} 
	mysqli_close($conn);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$full_name = $_POST["full_name"];
  	$username = $_POST["username"];
  	$email = $_POST["email"];
  	$pass = $_POST["pass"];
  	$confirm_pass = $_POST["confirm_pass"];
  	$full_address = $_POST["full_adress"];
  	$postal_code = $_POST["postal_code"];
  	$phone_number = $_POST["phone_number"];
  	register($full_name, $username, $email, $pass, $full_address, $postal_code, $phone_number);
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type ="text/css" href="css/style.css">
	</head>
	<body class="body-center helvetica">
		<div class = "text-align-center arial">
			<h1><span class="color-red">Sale</span><span class="color-blue">Project</span></h1>
		</div>
		<div class = "border-bottom ">
			<h2>Please register</h2>
		</div>
		<form method="POST" action="register.php" id="register" name="register">
			<div>
				<label for="full_name">Full Name</label><br />
				<input type="text" name="full_name" class="input-text">
			</div>
			<div>
				<label for="username">Username</label><br />
				<input type="text" name="username" class="input-text">
				<span style="color: red;"> <?php echo $unameError;?></span>
			</div>
			<div>
				<label for="email">Email</label><br />
				<input type="text" name="email" class="input-text">
			</div>
			<div>
				<label for="pass">Password</label><br />
				<input type="password" name="pass" class="input-text">
			</div>
			<div>
				<label for="confirm_pass">Confirm Password</label><br />
				<input type="password" name="confirm_pass" class="input-text">
			</div>
			<div>
				<label for="full_adress">Full Address</label><br />
				<textarea name="full_adress" rows="5" cols="50" class="input-textarea"></textarea>
			</div>
			<div>
				<label for="postal_code">Postal Code</label><br />
				<input type="text" name="postal_code" class="input-text">
			</div>
			<div>
				<label for="phone_number">Phone Number</label><br />
				<input type="text" name="phone_number" class="input-text">
			</div>
			<div>
				<input type="submit" value="REGISTER" name="registerr" onclick="validateform();" class="button float-right">
			</div>
		</form>
		<br>
		<div>
			<p class="font-small"><strong>Already registered? Login <a href="login.php" class="link">here</a></strong></p>
		</div>
		<script src="js/register.js"></script>
		<?php include 'footer.php'; ?>
	</body>
</html>