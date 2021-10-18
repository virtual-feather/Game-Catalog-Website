<?php
	// Start the session
	include "startSession.php";

	// Store filter as a sessioon variable
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
/*
	if(!empty($_POST["genre1"])) {
		$_SESSION["genre1"] = $_POST["genre".strval($count)];
		$count++;
		$_SESSION["hasGenre"] = TRUE;
	}
	
	if(!empty($_POST["genre2"])) {
		$_SESSION["genre2"] = $_POST["genre".strval($count)];
		$count++;
		$_SESSION["hasGenre"] = TRUE;
	}
	
	if(!empty($_POST["genre3"])) {
		$_SESSION["genre3"] = $_POST["genre".strval($count)];
		$count++;
		$_SESSION["hasGenre"] = TRUE;
	}

	if(!empty($_POST["genre4"])) {
		$_SESSION["genre4"] = $_POST["genre".strval($count)];
		$count++;
		$_SESSION["hasGenre"] = TRUE;
	}

	if(!empty($_POST["genre5"])) {
		$_SESSION["genre5"] = $_POST["genre".strval($count)];
		$count++;
		$_SESSION["hasGenre"] = TRUE;
	}
*/
	// Move to previous page
	header("Location: ../userProfile.php");
?>