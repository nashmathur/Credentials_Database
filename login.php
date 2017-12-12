<html>
<head></head>
<body>

<?php
	include('setup.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "SELECT username FROM login WHERE username='" . $username . "' and password='".$password."';";
	}
	
	if ($conn->query($sql) === true){
		include 'userpage.html';		
	}
	else{
		echo "Invalid username/password";
	}
?>
</body>
</html>
