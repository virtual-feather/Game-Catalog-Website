<?php
	// Connect to db
	include "dbConnect.php";
	include "startSession.php";
	include "alerts.php";

	// Assign variables
	$userName = $_POST["userName"];
	$pass = $_POST["password"];

	// See if the user exists in the database
	$sql = "SELECT userFirstName, userLastName FROM USERS 
			WHERE userName = '".$userName."'
			AND userPassword = '".$pass."'";
	$result = $conn->query($sql);

	$conn->close();

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// The person entered does not exist - Back to login
	if( ($row = $result->fetch_assoc()) == 0 ) {
		echo "
			<script type='text/javascript'>
				alert('Something went wrong, please try again.');
				window.location.href = '../login.html';
			</script>";
	}

	// Person does exist
	else{
		// Reset Session variables
		$_SESSION["userName"] = $userName;
		$_SESSION["password"] = $pass;

		// Get the user's name
		$_SESSION["accountName"] = $row["userFirstName"]." ".$row["userLastName"];

		// Information gathered, move to next page
		header("Location: ../index.php");
	}

	// Close DB connection
	$conn->close();

?>