<?php
	// Include files
	//include 'dbConnect.php';

	// Store filter
	$filter = '';

	$sql = "SELECT userFirstName, gameName, consoleName 
			FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS 
			WHERE COLLECTION.userID = USERS.userID 
			AND COLLECTION.gameID = GAMES.gameID 
			AND COLLECTION.consoleID = CONSOLE.ConsoleID
			AND USERS.userID = '".$_SESSION["userID"]."';";
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// Gather all data and display (Table Formation)
	
?>