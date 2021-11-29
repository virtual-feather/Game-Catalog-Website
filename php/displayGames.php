<?php
	// Include files
	//include 'debugging.php';
	//include '../js/functions.js';
	include 'displayGameQueries.php'; // Implement different queries based on sorting options

	// Create basic query
	$sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, genreName, imgPath
		FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS JOIN GENRES
		WHERE COLLECTION.userID = USERS.userID 
		AND COLLECTION.gameID = GAMES.gameID 
		AND COLLECTION.consoleID = CONSOLE.ConsoleID
		AND GENRES.genreID = GAMES.genreID";
	
	// Check if User was searched from Database
	if(isset($_SESSION["enteredUN"])) {
		// Add to query
		$userID = $foundID;
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

	// Store filter variable
	if(isset($_SESSION["theFilter"]))
		$filter = $_SESSION["theFilter"];
	else
		$filter = 'gameName ASC';
		
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
	$pageCount = 1;
	$contentCount = 0;
	$totalGamesCount = 0;
	// Check if this is a DB Search
	if(!isset($_SESSION["DBSearch"]))
		$totalGames = getTotalGames($userID, $conn);
	else
		$totalGames = getTotalGames(0, $conn);

	if($result->num_rows > 0) {
		// Initialize the first page
		echo "</div>"
		."<div id='page".$pageCount."' class='row'>";

		while($row = $result->fetch_assoc()) {
			// Debugging
			//toConsole($count);

			// Check if 12 games are displayed on the page
			if($contentCount == 12) {
				// Increment page count
				$pageCount++;

				// End current page
				echo "</div>";

				// Open a new page
				echo "<div id='page".$pageCount."' class='row' style='display: none;'>";

				// Reset Content Count
				$contentCount = 0;
			}

			// Start the game card
			echo "	<div class='col-lg-3 col-md-6 col-sm-6>'>"
				."		<div class='card'>"
				."			<img src='".$row["imgPath"]."' class='card-img-top' alt='Error'>" 	// Update unknown images
				."			<div class='card-body'>";
			
			if($mode == 'view') {
				echo "			<h5 class='card-title'>".$row["gameName"]."</h5>"
				."				<p class='card-text'><b>Date:</b> ".$row["releaseDate"]."</p>"
				."				<p class='card-text'><b>Console:</b> ".$row["consoleName"]."</p>"
				."		</div>"
				."		</div>"
				."	</div>";
			}//end view

			else if($mode == 'remove') {
				echo "			<h5 class='card-title'>".$row["gameName"]."</h5>"	
					."			<form method='post'>"
					."				<button formaction='php/removeGame.php' value='".$row["gameName"]."' name='remove'>Remove Game</button>"
					."			</form>"
					."		</div>"
					."	</div>"
					."</div>";
			}//end remove

			// Add to count
			$count+=1;
			$contentCount+=1;
			$totalGamesCount+=1;

			toConsole($totalGames);
			toConsole($totalGamesCount);
		
			// Check the count
			if($count == 4 || $totalGamesCount == $totalGames){
				echo "	<div class='col-lg-12 col-md-12 col-sm-12'>";

				if($contentCount == 12 || $totalGamesCount == $totalGames) {
					echo "	<br>"
					."		<h6>Page ".$pageCount."</h6>"
					."		<br>"
					."	</div>";
				}
				else {
					echo "	<br><br>"
					."	</div>";
				}

				$count = 0;
			}

		}//end While

		// Check if the previous div was closed based on contentCount
		if($contentCount < 12) {
			echo "</div>";
		}
		
		if($pageCount == 1) {}
		else {
			// Page Navbar: Display page numbers based on number of pages
			echo "	<div class='col-lg-12 col-md-12 col-sm-12'>"
			."			<nav aria-label='Game Display Page' class='paginate'>"
			."				<ul class='pagination'>";
			for($i = 1; $i <= $pageCount; $i++) {
				echo "<li class='page-item'><a class='page-link' onclick='changePage(".$i.", ".$pageCount.");'>".$i."</a></li>";
			}

			echo "			</ul>"
			."			</nav>"
			."	 	 </div>";
		}

	}//end if

	else {
		echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
			."		<h2>No games in collection</h2>"
			."	</div>\n";
  	}

	// Close db connection
	// - closes in userProfile.php

?>