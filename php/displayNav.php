<?php
	if($_SESSION["accountName"] != "") {
		echo '<a href="index.php">Home</a>';
		echo '<a href="about.php">About</a>';
		echo '<a href="database.php">Database</a>';
		echo '<a href="userProfile.php">View Collection</a>';
		echo '<a href="editProfile.php">Edit Collection</a>';
		echo '<a href="message.php">Messages</a>';
		echo '<a href="php/logout.php">Logout</a>';
	}
	else {
		echo '<a href="index.php">Home</a>';
		echo '<a href="about.php">About</a>';
		echo '<a href="database.php">Database</a>';
		echo '<a href="login.html">Log in</a>';
	}
?>