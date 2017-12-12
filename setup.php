<?php
	$servername = "localhost";
	$username = "root";
	$password = "Anunasik";
	$db = "login";
	$conn = new mysqli($servername, $username, $password, $db);
	if($conn->connect_error){
        	die("Connection failed:" . $conn->connect_error);
	}
?>
