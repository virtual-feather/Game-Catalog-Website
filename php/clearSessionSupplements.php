<?php 
	// https://www.php.net/manual/en/function.session-status.php

	function sessionStatus() {
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} 

			else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}

	// Start the session if needed
	if(sessionStatus() == FALSE)
		include "startSession.php";

	// Clear all session variables EXCEPT user information
	// SET SESSION VARIABLES 			<<<
	if(isset($_SESSION["userID"])) {
		$userName = $_SESSION["userName"];
		$pass = $_SESSION["password"];
		$userID = $_SESSION["userID"];
		$userStatus = $_SESSION["userStatus"];
		$accountName = $_SESSION["accountName"];
		$userImgPath = $_SESSION["userImgPath"];

		// Clear session
		session_unset();

		// Set User Variables
		$_SESSION["userName"] = $userName;
		$_SESSION["password"] = $pass;
		$_SESSION["userID"] = $userID;
		$_SESSION["userStatus"] = $userStatus;
		$_SESSION["userImgPath"] = $userImgPath;

		// Get the user's name
		$_SESSION["accountName"] = $accountName;
	}
	
	else {
		// Clear session
		session_unset();
	}
	
?>