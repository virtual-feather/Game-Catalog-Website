<?php
	// Include files
	include 'debugging.php';
	include 'displayGameQueries.php'; // Implement different queries based on sorting options

	// Store filter variable
	if(isset($_SESSION["theFilter"]))
		$filter = $_SESSION["theFilter"];
	else
		$filter = 'gameName ASC';

	// Store sorting variable
	if(isset($_SESSION["sorting"])) {
		$sort = $_SESSION["sorting"];

		// Query with sorting
		$sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, GAMES.genre, imgPath
			FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS 
			WHERE COLLECTION.userID = USERS.userID 
			AND COLLECTION.gameID = GAMES.gameID 
			AND COLLECTION.consoleID = CONSOLE.ConsoleID
			AND USERS.userID = '".$_SESSION["userID"]."'
			AND GAMES.consoleID = '".$sort."'
			ORDER BY ".$filter.";";
	}
	
	else {
		// Query without game sorting
		$sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, GAMES.genre, imgPath
				FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS 
				WHERE COLLECTION.userID = USERS.userID 
				AND COLLECTION.gameID = GAMES.gameID 
				AND COLLECTION.consoleID = CONSOLE.ConsoleID
				AND USERS.userID = '".$_SESSION["userID"]."'
				ORDER BY ".$filter.";";
	}
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}

	// Gather all data and display (Table Formation) -> IMCORPORATE PAGINATION/DYNAMIC DISPLAY
	// https://getbootstrap.com/docs/4.2/components/card/
	$count = 0;

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			toConsole($count);

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
				."				<p class='card-text'>Console: ".$row["consoleName"]."</p>\n"
				."				<p class='card-text'>Genre: ".$row["genre"]."</p>\n"
				."		</div>\n"
				."		</div>\n"
				."	</div>\n";
			}//end view

			else if($mode == 'remove') {
				echo "			<h5 class='card-title'>Click to remove!</h5>\n"	
					."			<form method='post' action='php/removeGame.php'>\n"
					."				<input type='Submit' value='".$row["gameName"]."' name='remove'>\n"	
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