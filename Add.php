<!DOCTYPE html>
<html>
<head>
	<title> Add </title>
	<link rel="stylesheet" type="text/css" href="Add.css">
</head>
<body>

<?php
	include ('setup.php');
	session_start();

	$username = $_SESSION["username"];
	$password = $_SESSION["password"];
	echo "<h1> Add a new Entry: </h1>";
	
	echo '<form action="./Add.php" method="post">
  		Organisation/Service:
  		<input type="text" name="org"> <br>
		Email:
  		<input type="text" name="email"><br>
		Login Password:
  		<input type="text" name="loginpwd"><br>
		Customer ID:
  		<input type="text" name="customerID"><br>
		A/c No.:
  		<input type="text" name="acc"><br>
		PIN:
  		<input type="text" name="PIN"><br>
		Transaction Password:
  		<input type="text" name="transactionpwd"><br>
		<br>
  		<input type="submit" value="Submit">
		</form> 
	 ';

	
	if (empty($_POST["org"]) and empty($_POST["email"]) and empty($_POST["loginpwd"]) and empty($_POST["customerID"]) and empty($_POST["acc"]) and empty($_POST["PIN"]) and empty($_POST["transactionpwd"])){
		echo "Enter some data";
	} else {
		$sql = "INSERT INTO ".$username." (org, email, loginpwd, customerID, acc, PIN, transactionpwd) VALUES ('".$_POST["org"]."', '".$_POST["email"]."', '".$_POST["loginpwd"]."', '".$_POST["customerID"]."', '".$_POST["acc"]."', '".$_POST["PIN"]."', '".$_POST["transactionpwd"]."');";
	
		if ($conn->query($sql)) {
		echo "New record created successfully";
		}	
	}

	echo '<form action="./login.php" method="post">
		<input type="hidden" name="username" value="'.$username.'"/>
		<input type="hidden" name="pwd"  value="'.$password.'"/>
		<input type="submit" value="Back"/>
	</form>';

?>
</body>
</html>

