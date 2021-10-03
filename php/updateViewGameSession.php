<?php
	// Start the session
	include "startSession.php";

	// Store search result as a sessioon variable
	$_SESSION["theFilter"] = $_POST["filter"];	

	// Move to previous page
	header("Location: ../userProfile.php");
?>