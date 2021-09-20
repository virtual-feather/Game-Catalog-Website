<?php
	// Connect external files
	include 'dbConnect.php';
	include 'alerts.php';
	include 'startSession.php';

	// Get info from form
	$email = $_POST["email"];
	$recovery = $_POST["recovery"];

	// Find an account with that email
	$sql = "SELECT userID, userFirstName, userLastName, userRecovery, userName FROM USERS
			WHERE USERS.userEmail = '".$email."';";
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// Person does not exist
	if( ($row = $result->fetch_assoc()) == 0 ) {
		echo "
			<script type='text/javascript'>
				alert('No account with associated email, please try again.')
				window.location.href = '../forgot.html';
			</script>";
	}

	// Person exists, send an email to the address
	else {
		// Recovery pin is the same
		if(password_verify($recovery, $row["userRecovery"])) {
			// Get Person's name
			$_SESSION["userFullName"] = $row["userFirstName"]." ".$row["userLastName"];
			$_SESSION["userName"] = $row["userName"];
			$_SESSION["userID"] = $row["userID"];


			/*
			// Generate 6-digit code
			$_SESSION["code"] = random_int(100000, 999999);

			$message = "Hello ".$userName.", please enter this 6-digit code: ".$_SESSION["code"];

			// Send message
			mail($email, "Forgot Username/Password", $message);
			*/

			// Move to next page
			header("Location: ../changeAccountInfo.php");
		}

		// Recovery pin is not the same
		else {
			echo "
			<script type='text/javascript'>
				alert('Invalid recovery pin, please try again.')
				window.location.href = '../forgot.html';
			</script>";
		}
	}

	// Close connection
	$conn->close();
?>