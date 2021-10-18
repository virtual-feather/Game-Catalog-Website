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
				<a href="userProfilePage.php"><img class="userPFP" src="assets/pfp.jpg"></a>
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
						<h1><?php echo $_SESSION["userName"]; ?>'s  Collection</h1>
						<div class="viewForm">
							<!-- FORM DATA GOES TO ACTION -->
							<form method="post" action="php/updateViewGameSession.php">
								<!-- Filters (FIX THESE)-->
								<label>Choose a filter: </label>
								<select name="filter">
									<option value="gameName ASC">Ascending</option>
									<option value="gameName DESC">Descending</option>
								</select>
								<br>

								<!-- Sorting (Ensure values are correct later) -->
								<label>Choose a Console: </label>
								<select name="sort">
									<option value="NOSORT">All Consoles</option>
									<?php
										// Returns <option> list of consoles
										getConsoleList($_SESSION["userID"], $conn);
									?>
								</select>
								<br>

								<!-- Genre Filters [Add and Implement]-->
								<label>Select Genre Filter: </label>
								<?php
									// Get rows of genres in user's collection
									getGenreList($_SESSION["userID"], $conn);
								?>

<!--
								<label>Sort by Console: </label>
								<br>

								<input type="radio" id="NOSORT" name="sort" value="NOSORT" checked="checked">
								<label for="NOSORT">All Consoles</label>

								
								<input type="radio" id="NES" name="sort" value="NES">
								<label for="NES">NES</label>

								<input type="radio" id="SNES" name="sort" value="SNES">
								<label for="SNES">SNES</label>

								<input type="radio" id="N64" name="sort" value="N64">
								<label for="N64">N64</label>

								<input type="radio" id="GC" name="sort" value="GC">
								<label for="GC">Gamecube</label>

								<input type="radio" id="WII" name="sort" value="4">
								<label for="WII">Wii</label>

								<input type="radio" id="WIIu" name="sort" value="2">
								<label for="WIIu">Wii U</label>

								<input type="radio" id="SWITCH" name="sort" value="3">
								<label for="SWITCH">Switch</label>
								<br>

								
								<input type="radio" id="GB" name="sort" value="GB">
								<label for="GB">Game Boy</label>

								<input type="radio" id="VB" name="sort" value="VB">
								<label for="VB">Virtual Boy</label>

								<input type="radio" id="GBC" name="sort" value="GBC">
								<label for="GBC">Game Boy Color</label>

								<input type="radio" id="GBA" name="sort" value="GBA">
								<label for="GBA">Game Boy Advanced</label>

								<input type="radio" id="DS" name="sort" value="DS">
								<label for="DS">DS</label>

								<input type="radio" id="3DS" name="sort" value="1">
								<label for="3DS">3DS</label>
								<br>

								
								<input type="radio" id="PS1" name="sort" value="PS1">
								<label for="PS1">Playstation 1</label>

								<input type="radio" id="PS2" name="sort" value="PS2">
								<label for="PS2">Playstation 2</label>

								<input type="radio" id="PS3" name="sort" value="PS3">
								<label for="PS3">Playstation 3</label>

								<input type="radio" id="PS4" name="sort" value="PS4">
								<label for="PS4">Playstation 4</label>

								<input type="radio" id="PS5" name="sort" value="PS5">
								<label for="PS5">Playstation 5</label>

								
								<input type="radio" id="PSP" name="sort" value="PSP">
								<label for="PSP">Playstation Portable</label>

								<input type="radio" id="PSV" name="sort" value="PSV">
								<label for="PSV">Playstation Vita</label>
								<br>

								


-->
								<br>
								<input type="Submit" value="Go!">							
							</form>						
						</div>
						<hr>
						<br>
						<br>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 filterTab">
						<?php
							// Display which filters are displayed
							if(isset($_SESSION["theFilter"]) || isset($_SESSION["sorting"]) || isset($_SESSION["genre1"])) {
								echo "<p>Filters Set: ";

								// Filters
								if(isset($_SESSION["theFilter"])) {
									if($_SESSION["theFilter"] == "gameName ASC")
										echo "<code>Ascending</code>";
									else
										echo "<code>Descending</code>";
								}

								// Consoles
								if(isset($_SESSION["sorting"]))
									echo "<code>".getConsoleName($_SESSION["sorting"], $conn)."</code>";

								// Genre <-- Fix this
								// Create a genre list
								$genreList = array();

								// Collect all genres into the list
								$count = 1;

								if(isset($_SESSION["hasGenre"]) && $_SESSION["hasGenre"]) {
									while(isset($_SESSION["genre".strval($count)])) {
										array_push($genreList, $_SESSION["genre".strval($count)]);
										$count++;
									}
								}

								// Add the genre to the expression
								foreach($genreList as $genreID) 
									echo "<code>".convertGenreID($genreID, $conn)."</code>";
								
								echo "</p>";
							}
						?>
					</div>

					<?php
						
						// Store mode. DEFAULT: VIEW
						$mode = 'view';

						// Display Game Collection
						include 'php/displayGames.php';

						// Clear the superfluous session variables
						include 'php/clearSessionSupplements.php';
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