<?php
	// Start the session
	include "startSession.php";

	// Store search result as a sessioon variable
	$_SESSION["searchGame"] = $_POST["game"];
	$_SESSION["searchedConsole"] = $_POST["console"];	

	// Move to previous page
	header("Location: ../addGamesForm.php");
?>