<?php
	// Include files
	include "dbConnect.php";
	include 'clearSession.php';
	include "startSession.php";
	include "alerts.php";

	// Assign variables 
	$userName = $_POST["userName"];
	$enteredPass = $_POST["password"];

	// See if the user exists in the database
	$sql = "SELECT userFirstName, userLastName, userEmail, userID, userStatus, userPassword, userFavConsole, userFavGame, userBio, userImgPath 
			FROM USERS 
			WHERE userName = '".$userName."'";
	$result = $conn->query($sql);

	$conn->close();

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// The person entered does not exist - Back to login
	if( ($row = $result->fetch_assoc()) == 0 ) {
		echo "
			<script type='text/javascript'>
				alert('Something went wrong, please try again.')
				window.location.href = '../login.php';
			</script>";
	}

	// Person does exist
	else{ 
		// Check if passwords are the same
		if(password_verify($enteredPass, $row["userPassword"])) {

			// SET SESSION VARIABLES 			<<<
			$_SESSION["userName"] = $userName;
			$_SESSION["userEmail"] = $row["userEmail"];
			$_SESSION["password"] = $pass;
			$_SESSION["userID"] = $row["userID"];
			$_SESSION["userStatus"] = $row["userStatus"];
			$_SESSION["userFavConsole"] = $row["userFavConsole"];
			$_SESSION["userFavGame"] = $row["userFavGame"];
			$_SESSION["userBio"] = $row["userBio"];
			$_SESSION["userImgPath"] = $row["userImgPath"];

			// Get the user's name
			$_SESSION["accountName"] = $row["userFirstName"]." ".$row["userLastName"];

			// Information gathered, move to next page
			header("Location: ../index.php");
		}
		// Password entered is not the same, return to page
		else {
			echo "
			<script type='text/javascript'>
				alert('Incorrect Password, please try again.')
				window.location.href = '../login.php';
			</script>";
		}
	}

	// Close DB connection
	$conn->close();

?>