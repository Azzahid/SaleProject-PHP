<?php

/* 
	Source: http://www.w3schools.com/
*/

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "db1";
$error = false;
$emailError = $unameError = "";

function connect_db() {
	global $servername, $db_username, $db_password, $dbname;
	// Create connection
	$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

function register($full_name, $username, $email, $pass,$full_address, $postal_code, $phone_number) {
	$conn = connect_db();
	global $emailError, $unameError;
	global $error;
	// check if username and email already exist
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter valid email address.";
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
		$unameError = "Please enter the username.";
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

<!DOCTYPE HTML>
<html>
	<head>
	</head>
	<body>
		<h1>SaleProject</h1>
		<h3>Please Register</h3>
		<form method="POST" action="register.php">
			<div>
				<label for="full_name">Full Name</label><br />
				<input type="text" name="full_name">
			</div>
			<div>
				<label for="username">Username</label><br />
				<input type="text" name="username">
				<span class="error"> <?php echo $unameError;?></span>
			</div>
			<div>
				<label for="email">Email</label><br />
				<input type="text" name="email">
				<span class="error"> <?php echo $emailError;?></span>
			</div>
			<div>
				<label for="pass">Password</label><br />
				<input type="password" name="pass">
			</div>
			<div>
				<label for="confirm_pass">Confirm Password</label><br />
				<input type="password" name="confirm_pass">
			</div>
			<div>
				<label for="full_address">Full Address</label><br />
				<textarea name="full_adress" rows="5" cols="50">
				</textarea>
			</div>
			<div>
				<label for="postal_code">Postal Code</label><br />
				<input type="text" name="postal_code">
			</div>
			<div>
				<label for="phone_number">Phone Number</label><br />
				<input type="text" name="phone_number">
			</div>
			<div>
				<input type="submit" value="Register">
			</div>
		</form>
		<div>
			<p>Already registered? Login <a href="login.html">here</a></p>
		</div>
	</body>
</html>