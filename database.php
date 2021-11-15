<?php
	// Include Files
	include "php/startSession.php";
	include "php/dbConnect.php";
	include "php/viewingFunctions.php";

	if(isset($_SESSION["userName"]))
		include "php/clearSessionSupplements.php";
	else
		include "php/clearSession.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Database</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
	<!-- Header Fold -->

	<body>
		<nav id="navbar">
			<span class="profile">
				<?php 
					include "php/displayProfileImg.php";

					echo displayProfileImg();
				 ?>
			</span>
			<!-- Profile Fold -->

			<span class="nav">
				<?php 
					include "php/displayUserName.php";
					include "php/displayNav.php";
				?>
			</span>

			<span class="credit">
				<p>Created by: Brenden Monteleone</p>
			</span>
		</nav>
		<!-- Navbar Fold -->

		<div class="mainContent">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h1>Explore the Database!</h1>
						<hr>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<br>
						<form action="displayDBGames.php">
							<h2>Filter through Games</h2>
							<br>
							<input type="submit" value="Search Database">
							<br><br>
						</form>
					</div>
					<!-- Game Filter Form Fold -->

					<div class="col-lg-6 col-md-6 col-sm-6">
						<br>
						<form method="GET" action="">
							<h2>Search for Users</h2>
							<i>Enter other user's username</i>
							<br>
							<input type="text" placeholder="Enter username..." name="search" onkeydown="showUsers(this.value)">
<<<<<<< Updated upstream
							<button type="submit" formaction="findUser.php"><i class="fa fa-search"></i></button>
=======
							<!-- <button type="submit" formaction="findUser.php"><i class="fa fa-search"></i></button> -->
>>>>>>> Stashed changes
							<br><br><br>
						</form>
					</div>

					<div id="userHint">
					</div>
					<!-- User Search Form Fold -->

					<?php
						// Adding Games to the DB (MODS only)

						// Check if the user is a mod
						if(isset($_SESSION["userStatus"])) {
							if($_SESSION["userStatus"] == 1) {
								// Display option to add games/consoles to the database
								echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
								."			<br><br>"
								."			<h1>Edit the Database</h1>\n"
								."			<hr>\n"
								."		</div>\n"
								."		<div class='col-lg-6 col-md-6 col-sm-6'>\n"
								."			<h2>Add a Game</h2>\n"
								."			<form action='addGametoDBForm.php'>\n"
								."				<br>\n"
								."				<input type='submit' value='Add Game to Database'>\n"
								."				<br><br>\n"
								."			</form>\n"
								."		</div>\n"
								."		<div class='col-lg-6 col-md-6 col-sm-6'>\n"
								."			<h2>Add a Console</h2>\n"
								."			<form action='addConsoletoDBForm.php'>\n"
								."				<br>\n"
								."				<input type='submit' value='Add Console to Database'>\n"
								."				<br><br>\n"
								."			</form>\n"
								."		</div>";
							}
						}
					?>
					<!-- Adding to Database Fold -->

				</div>
			</div>
		</div>
		<!-- Main Content Fold -->

	</body>
	<!-- Body Fold -->

	<footer>
		
	</footer>
	<!-- Footer Fold -->

	<?php
		// Close DB Connection
		$conn->close();
	?>

</html>