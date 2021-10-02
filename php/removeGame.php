<?php
	// Include files
	include "dbConnect.php";
	include "startSession.php";
	include "alerts.php";

	// Get the gameName from previous page, and user info stuff
	$removeGame = $_POST["remove"];
	$userID = $_SESSION["userID"];


	// Find the game ID
	$sql = "SELECT gameID
			FROM GAMES
			WHERE gameName = '".$removeGame."';";
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// Query not successful, display message and return to removeGamesForm.php
	if( ($row = $result->fetch_assoc()) == 0 ) {
		echo "
			<script type='text/javascript'>
				alert('An error occurred while removing the game. Please try again.')
				window.location.href = '../removeGamesForm.php';
			</script>";
	}

	// Query is successful, remove the game from the user's collection
	else {
		$gameID = $row["gameID"];

		// Delete the game from the user's collection
		$sql = "DELETE FROM COLLECTION
				WHERE userID = '".$userID."'
				AND gameID = '".$gameID."';";
		$result = $conn->query($sql);

		// Query not successful, display message and return to removeGamesForm.php
		if (!$result) {
			//trigger_error('Invalid query: ' . $conn->error);
			echo "
				<script type='text/javascript'>
					alert('Game could not be removed due to an error. Please try again.')
					window.location.href = '../removeGamesForm.php';
				</script>";
		}

		// Query Successful
		echo "
			<script type='text/javascript'>
				alert('".$removeGame." was removed successfully!')
				window.location.href = '../removeGamesForm.php';
			</script>";
	}

	// Disconnect from db
	$conn->close();
?>