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


	// Start the session
	if(sessionStatus() == FALSE)
		include "startSession.php";

	// Clear all session variables
	session_unset();
?>