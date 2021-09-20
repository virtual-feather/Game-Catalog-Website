<?php
	if(isset($_SESSION["accountName"])) {
		echo '<p>'.$_SESSION["accountName"].'</p>';
	}
	else {
		echo '';
	}
?>