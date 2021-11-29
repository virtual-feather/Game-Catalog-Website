<?php
	// Include Files
	include "php/dbConnect.php";
	include "php/startSession.php";
	include "php/loggedIn.php";
	include "php/viewingFunctions.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Collection</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
						<h1>Add Games to your collection</h1>
						<h2>Search for a game</h2>
						<form method="post" name="game">
							<input id="userSearch" type="search" name="game" placeholder="Search for a game...">
							<br>
							<br>
							<label><b>Choose Console: </b></label>
							<select name="console">
								<option value="0">All Consoles</option>
								<?php
									getConsoleList(0, $conn);
								?>
							</select>
							<br>
							<br>
							<input type="Submit" value="Search Database" formaction="php/updateAddGameSession.php">
							<input type="Submit" value="Reset Search" formaction="php/updateAddGameSession.php" onclick="changeInput();">
						</form>
						<br>
						<?php
							if(!isset($_SESSION["searchGame"]) || $_SESSION["searchGame"] == "") {
								echo "</div>"
								."	<div class='col-lg-12 col-md-12 col-sm-12'>"
								."			<h6>Suggested Games</h6><br>";
							}
							elseif(isset($_SESSION["searchGame"]) && $_SESSION["searchGame"] != "") {
								echo "</div>"
								."	<div class='col-lg-12 col-md-12 col-sm-12'>"
								."			<h6>Searched: <se>".$_SESSION["searchGame"]."</se> on ".getConsoleName($_SESSION["searchedConsole"], $conn)."</h6><br>";
							}
							else {
								echo "<br><br>";
							}
						?>
						
					</div>
					<?php   
						// Set Mode
						$mode = "add";

						// Display all games in database
						include 'php/displayAddGames.php';

						// Clear the superfluous session variables
						// include 'php/clearSessionSupplements.php';
					?>

					<div class="col-lg-12 col-md-12 col-sm-12">
						<br>
						<br>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Content Fold -->

	</body>
	<!-- Body Fold -->

	<footer>
		
	</footer>
	<!-- Footer Fold -->

</html>

<?php
	// Close DB Connection
	$conn->close();
?>