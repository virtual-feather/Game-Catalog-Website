<?php
	// Include Files
	include "php/dbConnect.php";
	include "php/startSession.php";
	include "php/loggedIn.php";
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
						<!-- FIX BELOW -->
						<form method="post" action="php/updateViewGameSession.php">
							<label>Choose a filter</label>
							<br>
							<select name="filter">
								<option value="gameName ASC">Ascending</option>
								<option value="gameName DESC">Descending</option>
								<option value="GAMES.genre">Genre</option>
							</select>
							<br>
							<br>
							<input type="Submit" value="Go!">
						</form>
						<hr>
						<br>
						<br>
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