<?php
	// Include files
	include 'dbConnect.php';
	include 'alerts.php';
	include 'startSession.php';

	// Get the gameName from previous page, and user info stuff
	$addGame = $_POST["add"];
	$userID = $_SESSION["userID"];
	$inCollection = False;


	// Check to see if the user has the game in their collection
	$sql = "SELECT gameName 
			FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS 
			WHERE COLLECTION.userID = USERS.userID 
			AND COLLECTION.gameID = GAMES.gameID 
			AND COLLECTION.consoleID = CONSOLE.ConsoleID
			AND USERS.userID = '".$userID."';";
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// Check added game against collection
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// Game is in database, send alert
			if($row["gameName"] == $addGame) {
				$inCollection = True;
				break;
			}
		}
	}

	if($inCollection) {
		echo "
			<script type='text/javascript'>
				alert('".$addGame." is already in your collection!')
				window.location.href = '../addGamesForm.php';
			</script>";
	}

	else {
		// Game is not in collection, gather Game data for entry
		$sql = "SELECT gameID, consoleID FROM GAMES
				WHERE gameName LIKE '".$addGame."';";
		$result = $conn->query($sql);

		// Check if the query was successful
		if (!$result)
			trigger_error('Invalid query: ' . $conn->error);

		// Nothing Existed, send alert
		if( ($row = $result->fetch_assoc()) == 0 ) {
			echo "
				<script type='text/javascript'>
					alert('Something went wrong. Please try again.')
					window.location.href = '../addGamesForm.php';
				</script>";
		}

		// Game exists, store data
		else {
			$gameID = $row["gameID"];
			$consoleID = $row["consoleID"];
		} 

		// Add game to user's collectoin
		$sql = "INSERT INTO COLLECTION
				VALUES(null, ".$userID.", ".$gameID.", ".$consoleID.")";
		$result = $conn->query($sql);

		// Check if the query was successful
		if (!$result)
			trigger_error('Invalid query: ' . $conn->error);
		else
			echo "
				<script type='text/javascript'>
					alert('".$addGame." has been added to your collection!')
					window.location.href = '../addGamesForm.php';
				</script>";
	}
	
	// Disconnect from DB
	$conn->close();

?>