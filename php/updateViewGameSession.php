<?php
	// Start the session
	include "startSession.php";

	// Store filter as a sessioon variable
	$_SESSION["theFilter"] = $_POST["filter"];

	// Store sort as a session variable (unless its All Consoles)
	if($_POST["sort"] != "NOSORT") 
		$_SESSION["sorting"] = $_POST["sort"];

	// Move to previous page
	header("Location: ../userProfile.php");
?>