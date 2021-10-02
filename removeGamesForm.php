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
						<h2>Press the button to remove the game!</h2>
						<hr>
					<!-- FIX BELOW
						<form method="post" id="filter" name="filter">
							<label>Choose a filter</label>
							<br>
							<select>
								<option name="DESC">Ascending</option>
								<option name="DESC">Descending</option>
							</select>
							<br>
							<br>
							<input type="Submit" value="Go!" formaction="userProfile.php">
						</form>
						<hr>
						<br>
						<br>
					-->
					</div>
					<?php
							// Store mode. DEFAULT: VIEW
							$mode = 'remove';

							// Display Game Collection
							include 'php/displayGames.php';
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