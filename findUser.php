<?php
    // Start the session and clear the superfluous content
	include "php/dbConnect.php";
	include "php/startSession.php";
	include "php/viewingFunctions.php";
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
						<?php
							// Check if the search variable is set
							if(isset($_SESSION["enteredUN"])) {
								$foundUN = $_SESSION["enteredUN"];
								 
								// Get the ID
								$foundID = getUserID($foundUN, $conn);
							}
							else
								header("Location: index.php");
							
							// Coming from database.php
							if(!isset($foundUN)) {
								// Perform a quick query with the selected name
								//include "php/grabUserDataFromSearch.php";

								// Display user's information
								echo "<h1><a href='displayUser.php'>".$foundUN."'s Collection</a></h1>"; // used to be $_GET['search']
							}

							// Coming from displayUser.php
							else {
								// Display user's information
								echo "<h1><a href='displayUser.php'>".$foundUN."'s Collection</a></h1>";
							}
						?>
						<div class="viewForm">
							<!-- FORM DATA GOES TO ACTION -->
							<form method="post" action="php/updateViewGameSession.php">
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
										getConsoleList($foundID, $conn);
									?>
								</select>
								<br>

								<!-- Genre Filters -->
								<label class="title">Select Genre Filter: </label>
								<?php
									// Get rows of genres in user's collection
									getGenreList($foundID, $conn);
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

						// Grab user information to view
						include "php/displayGames.php";

						// Clear supplements
						include "php/clearSessionSupplements.php";

						// Reset the initial session variable
						$_SESSION["enteredUN"] = $foundUN;
						
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

	<?php
		// Close Connection
		$conn->close()
	?>
</html>