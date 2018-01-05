<!DOCTYPE html>
<html>
<head>
	<title> Sign-Up </title>
</head>
<body>
	<?php
		include ('setup.php');

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$name = $_POST["name"];
			$username = $_POST["username"];
                	$password = md5($_POST["password"]);
			$email = $_POST["email"];

			$sql1 = "INSERT INTO login (name, username, password, email) VALUES ('".$name."', '".$username."', '".$password."', '".$email."');";
    			if ($conn->query($sql1)) {
				$sql2 = "CREATE TABLE ".$username."(
					id INT AUTO_INCREMENT PRIMARY KEY,
					org TEXT,
					acc TEXT,
					customerID TEXT,
					email TEXT,
					loginpwd TEXT,
					transactionpwd TEXT,
					PIN TEXT
				);";
    				if ($conn->query($sql2)) {
					echo "New record created successfully";
				}
			} else {
    				echo "Error: username/email already exists.";
			}
		}
	?>
</body>
</html>
