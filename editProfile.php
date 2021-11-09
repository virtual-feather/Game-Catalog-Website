<?php
	// Include Files
	include "php/dbConnect.php";
	include "php/startSession.php";
	include "php/loggedIn.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Edit</title>
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
						<h1>Edit Collection</h1>
						<hr>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2>Adding Games</h2>
						<form action="addGamesForm.php">
							<br>
							<input type="submit" value="Add Games">
							<br><br>
						</form>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<h2>Removing Games</h2>
						<form action="removeGamesForm.php">
							<br>
							<input type="submit" value="Remove Games">
							<br><br>
						</form>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
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