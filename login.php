<!DOCTYPE html>
<html>
<head>
	<title> Your Credentials</title>
	<link rel="stylesheet" type="text/css" href="user.css"> 	
</head>
<body>

<?php
	include('setup.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["pwd"];
		$sql = "SELECT username FROM login WHERE username='" . $username . "' and password='".$password."';";
	}
	
	if ($conn->query($sql)) {
		session_start();
		$_SESSION["username"]=$username;
		$abc = "SELECT org, acc, email, customerID, loginpwd, transactionpwd, PIN FROM ".$username.";";
		$result = $conn->query($abc);
	
		if ($result->num_rows > 0) {
    			echo "<table><tr><th>Organisation/Service</th><th>E-mail ID</th><th>Login Password</th><th>Customer-ID</th><th>A/c No.</th><th>PIN</th><th>Transaction Password</th></tr>";
    			while($row = $result->fetch_assoc()) {
        			echo "<tr><td>".$row["org"]."</td><td>".$row["email"]."</td><td>".$row["loginpwd"]."</td><td>".$row["customerID"]."</td><td>".$row["acc"]."</td><td>".$row["PIN"]."</td><td>".$row["transactionpwd"]."</td></tr>";
    }
    			echo "</table><br>";
		} else {
    			echo "0 results";
		}

		echo '<center><form>
			<button type="submit" formaction="./Add.php">Add</button>
			<button type="submit" formaction="./Delete.php">Delete</button>
		</form></center>';	
	}
	else{
		echo "Invalid username/password";
	}
?>
</body>
</html>
