<?php 
	// Connect to the database
	$servername = "localhost";
	$username = "root"; // Mysql username
	$password = "9121";	// Mysql Password
	$dbname = "Game_Database";	// database name

	$conn = new mysqli($servername, $username, $password, $dbname);
			 
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error ."<br>");
?>