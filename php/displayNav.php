<?php
	/*	activePage(): Returns the class attribute 'active'
					  if the page url matches the given url
		@param $url: url of the page currently on
	*/
	function activePage($url) {
		// Get the current page url file
		$currentUrl = substr($_SERVER["REQUEST_URI"], 15);

		if($currentUrl == $url)
			return "activeLink";
	}

	if(isset($_SESSION["accountName"])) {
<<<<<<< Updated upstream
		echo '<a href="index.php">Home</a>';
		echo '<a href="about.php">About</a>';
		echo '<a href="database.php">Database</a>';
		echo '<a href="userProfile.php">View Collection</a>';
		echo '<a href="editProfile.php">Edit Collection</a>';
=======
		echo '<a href="index.php" class='.activePage("index.php").'>Home</a>';
		echo '<a href="about.php" class='.activePage("about.php").'>About</a>';
		echo '<a href="database.php" class='.activePage("database.php").'>Database</a>';
		echo '<a href="userProfile.php" class='.activePage("userProfile.php").'>View Collection</a>';
		echo '<a href="editProfile.php" class='.activePage("editProfile.php").'>Edit Collection</a>';
>>>>>>> Stashed changes
		//echo '<a href="message.php">Messages</a>';
		echo '<a href="php/logout.php">Logout</a>';
	}
	else {
<<<<<<< Updated upstream
		echo '<a href="index.php">Home</a>';
		echo '<a href="about.php">About</a>';
		echo '<a href="database.php">Database</a>';
		echo '<a href="login.php">Log in</a>';
=======
		echo '<a href="index.php" class='.activePage("index.php").'>Home</a>';
		echo '<a href="about.php" class='.activePage("about.php").'>About</a>';
		echo '<a href="database.php" class='.activePage("database.php").'>Database</a>';
		echo '<a href="login.php" class='.activePage("login.php").'>Log in</a>';
>>>>>>> Stashed changes
	}
?>