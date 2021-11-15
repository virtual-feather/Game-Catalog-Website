<?php
	// Start the session
	include "startSession.php";

	// Store filter as a sessioon variable
	if(isset($_POST["filter"]) || $_POST["filter"] =! NULL)
		$_SESSION["theFilter"] = $_POST["filter"];

	// Store sort as a session variable (unless its All Consoles)
	if($_POST["sort"] != "NOSORT") 
		$_SESSION["sorting"] = $_POST["sort"];

	// Store genres as a session variable
	$_SESSION["hasGenre"] = FALSE;

	$count = 1;

	for($genreCount = 1; $genreCount <= 30; $genreCount++) {
		if(isset($_POST["genre".strval($genreCount)])) {
			$_SESSION["genre".strval($count)] = $_POST["genre".strval($genreCount)];
			$count++;
			$_SESSION["hasGenre"] = TRUE;
		}
	}

	// Move to previous page
	header("Location: ../removeGamesForm.php");
?>