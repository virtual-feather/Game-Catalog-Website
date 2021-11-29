<?php
	// Include files
	include 'startSession.php';
	include 'dbConnect.php';
	include 'alerts.php';

	// Get variables from form
	$pass1 = $_POST["password1"];
	$pass2 = $_POST["password2"];

	// Passwords entered are the same, update password
	if($pass1 == $pass2 && ($pass1 != " ") && ($pass1 != "")) {
		// Crypt the password
		$newPass = crypt($pass1);

		// Update user
		$sql = "UPDATE USERS 
				SET userPassword = '".$newPass."' 
				WHERE USERS.userID = '".$_SESSION["userID"]."';";
		$result = $conn->query($sql);

		// Check if the query was successful
		if (!$result)
			trigger_error('Invalid query: ' . $conn->error);

		// Query successful
		else {
			// Clear the session
			include 'clearSession.php';

			// Display and move user
			echo "
			<script type='text/javascript'>
				alert('Password updated, login to continue.')
				window.location.href = '../login.php';
			</script>";
		}
	}

	// Passwords not the same
	else {
		// Display and move user
		echo "
		<script type='text/javascript'>
			alert('Passwords did not match, try again.')
			window.location.href = '../changeAccountInfo.php';
		</script>";
	}

	// Close DB Connection
	$conn->close();
?>