<?php
	include 'startSession.php';

	// Initialize
	if(isset($_SESSION["loginfirstName"])) {
		$_SESSION["loginfirstName"];
		$_SESSION["loginlastName"];
		$_SESSION["loginemail"];
		$_SESSION["loginuserName"];
		$_SESSION["loginpassword1"];
		$_SESSION["loginpassword2"];
		$_SESSION["loginrecovery"];
	}
	else {
		$_SESSION["loginfirstName"] = "";
		$_SESSION["loginlastName"] = "";
		$_SESSION["loginemail"] = "";
		$_SESSION["loginuserName"] = "";
		$_SESSION["loginpassword1"] = "";
		$_SESSION["loginpassword2"] = "";
		$_SESSION["loginrecovery"] = "";
	}
?>