<?php
	// Include Files
	include "php/dbConnect.php";
	include "php/startSession.php";
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
						<h1>Database Games</h1>
						<div class="viewForm">
							<!-- FORM DATA GOES TO ACTION -->
							<form method="post" action="php/updateViewDBGameSession.php">
								<!-- Filters -->
								<label class="title">Choose a Sorting Option: </label>
								<select name="filter">
								<option value="gameName ASC">Name Ascending</option>
									<option value="gameName DESC">Name Descending</option>
									<option value="GAMES.releaseDate">Release Date Ascending</option>
								</select>
								<br>

								<!-- Sorting (Ensure values are correct later) -->
								<label class="title">Choose a Console: </label>
								<select name="sort">
									<option value="NOSORT">All Consoles</option>
									<?php
										// Returns <option> list of consoles
										getConsoleList(0, $conn);
									?>
								</select>
								<br>

								<!-- Genre Filters -->
								<label class="title">Select Genre Filter: </label>
                                <?php
                                    // Get rows of genres in user's collection
                                    getGenreList(0, $conn, FALSE);
                                ?>
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
										echo "<code>Name Ascending</code>";
									elseif($_SESSION["theFilter"] == "gameName DESC")
										echo "<code>Name Descending</code>";
									else
										echo "<code>Release Date Ascending</code>";
								}

								// Consoles
								if(isset($_SESSION["sorting"]))
									echo "<code>| ".getConsoleName($_SESSION["sorting"], $conn)."</code>";
								else
									echo "<code>| All Consoles</code>";

								// Genre
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
									echo "<code>| ".convertGenreID($genreID, $conn)."</code>";
								
								echo "</p>";
							}
						?>
					</div>

					<?php
						// Store mode. DEFAULT: VIEW
						$mode = 'view';

                        // Set variable to let displayGames.php know this is a DB search
                        $_SESSION["DBSearch"] = TRUE;

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