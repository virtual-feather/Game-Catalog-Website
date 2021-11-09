<?php
	// Include files
	include 'debugging.php';
	include 'displayGameQueries.php'; // Implement different queries based on sorting options

	// Create basic query
	$sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, genreName, imgPath
		FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS JOIN GENRES
		WHERE COLLECTION.userID = USERS.userID 
		AND COLLECTION.gameID = GAMES.gameID 
		AND COLLECTION.consoleID = CONSOLE.ConsoleID
		AND GENRES.genreID = GAMES.genreID";

	// Store filter variable
	if(isset($_SESSION["theFilter"]))
		$filter = $_SESSION["theFilter"];
	else
		$filter = 'gameName ASC';

	// Check if User was searched from Database
	if(isset($_SESSION["enteredUN"])) {
		include 'viewingFunctions.php';

		// Get user's ID
		$userID = getUserID($_SESSION["enteredUN"], $conn);

		// Add to query
		$sql = $sql." AND USERS.userID = '".$userID."'";
	}
	else {
		if(isset($_SESSION["DBSearch"])) {
			// Redo query for looking through all database games
			$sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, genreName, imgPath
			FROM CONSOLE JOIN GAMES JOIN GENRES
			WHERE CONSOLE.consoleID = GAMES.consoleID
			AND GAMES.genreID = GENRES.genreID";
		}

		else {
			//Update
			$userID = $_SESSION["userID"];

			// Add to query
			$sql = $sql." AND USERS.userID = '".$userID."'";
		}
	}
	// Add sorting variable
	if(isset($_SESSION["sorting"])) {
		$sort = $_SESSION["sorting"];

		// Query with sorting
		$sql = $sql." AND GAMES.consoleID = '".$sort."'";
	}

	// Create a genre list
	$genreList = array();

	// Collect all genres into the list
	$count = 1;

	if(isset($_SESSION["hasGenre"]) && $_SESSION["hasGenre"]) {
		$sql = $sql." AND GAMES.genreID in (
				SELECT DISTINCT genreID
				FROM GENRES
				WHERE ";
		
		// Push genre into list
		while(isset($_SESSION["genre".strval($count)])) {
			array_push($genreList, $_SESSION["genre".strval($count)]);
			$count++;
		}
	
		// Add each genre to the query
		foreach($genreList as $genreID) {
			$sql = $sql." (genreID = ".$genreID.") OR";
		}
		
		$sql = substr($sql, 0, -2);

		$sql = $sql."GROUP BY genreID)";
	}

	// Add ORDER BY filter to the end of the SQL query
	$sql = $sql." ORDER BY ".$filter.";";

	// Query
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result) 
		trigger_error('Invalid query: ' . $conn->error);
	
	// Gather all data and display (Table Formation) -> INCORPORATE PAGINATION/DYNAMIC DISPLAY
	// https://getbootstrap.com/docs/4.2/components/card/

	// Reset counting variable
	$count = 0;

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			// Debugging
			//toConsole($count);

			// Check the count
			if($count == 4){
				echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
				."			<br><br>\n"
				."		</div>";

				$count = 0;
			}

			echo "	<div class='col-lg-3 col-md-6 col-sm-6>'>\n"
				."		<div class='card'>\n"
				."			<img src='".$row["imgPath"]."' class='card-img-top' alt='Error'>\n" 	// Update unknown images
				."			<div class='card-body'>\n";

			if($mode == 'view') {
				echo "			<h5 class='card-title'>".$row["gameName"]."</h5>\n"
				."				<p class='card-text'><b>Date:</b> ".$row["releaseDate"]."</p>\n"
				."				<p class='card-text'><b>Console:</b> ".$row["consoleName"]."</p>\n"
				."		</div>\n"
				."		</div>\n"
				."	</div>\n";
			}//end view

			else if($mode == 'remove') {
				echo "			<h5 class='card-title'>".$row["gameName"]."</h5>\n"	
					."			<form method='post'>\n"
					."				<button formaction='php/removeGame.php' value='".$row["gameName"]."' name='remove'>Remove Game</button>\n"
					."			</form>"
					."		</div>\n"
					."	</div>\n"
					."</div>\n";
			}//end remove

			// Add to count
			$count+=1;
		}//end While
	}//end if

	else {
    	echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
    		."		<h2>No games in collection</h2>"
    		."	</div>\n";
  	}

	// Close db connection
	// - closes in userProfile.php

?>