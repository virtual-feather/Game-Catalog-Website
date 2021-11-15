<?php
	// Start session
	include "startSession.php";

	// Clear all session variables
	include "clearSession.php";

	// Forward to login page
	header("Location: ../login.php");
?>