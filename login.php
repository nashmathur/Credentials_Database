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
		$password = $_POST["password"];
		$sql = "SELECT username FROM login WHERE username='" . $username . "' and password='".$password."';";
	}
	
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
	}	

	if ($conn->query($sql)) {
		session_start();
		$_SESSION["username"]=$username;
		$_SESSION["password"]=$password;
		$abc = "SELECT id, org, acc, email, customerID, loginpwd, transactionpwd, PIN FROM ".$username.";";
		$result = $conn->query($abc);
	
		if ($result->num_rows > 0) {
    			echo "<form method='post'><table><tr><th></th><th>Organisation/Service</th><th>E-mail ID</th><th>Login Password</th><th>Customer-ID</th><th>A/c No.</th><th>PIN</th><th>Transaction Password</th></tr>";
    			while($row = $result->fetch_assoc()) {
        			echo "<tr><td><input type='radio' name='ID' value='".$row["id"]."'></td><td>".$row["org"]."</td><td>".$row["email"]."</td><td>".$row["loginpwd"]."</td><td>".$row["customerID"]."</td><td>".$row["acc"]."</td><td>".$row["PIN"]."</td><td>".$row["transactionpwd"]."</td></tr>";
    }
    			echo "</table><br>";
		} else {
    			echo "0 results";
		}

		echo '<center>
			<button type="submit" formaction="./Add.php">Add</button>
			<button type="submit">Delete</button>
			<input type="hidden" name="username" value="'.$username.'">
			<input type="hidden" name="password" value="'.$password.'">
		</form></center>';
		echo "<a href='logout.php'>Logout</a>";
		
		$del = "DELETE FROM ".$username." WHERE id = ".$_POST['ID'].";";
		$resultdel = $conn->query($del);
	}
	else{
		echo "Invalid username/password";
	}
?>
</body>
</html>
