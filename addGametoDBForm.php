<?php
	include "php/startSession.php";
	include "php/loggedIn.php";
	include "php/viewingFunctions.php";
	include "php/dbConnect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Game Database | Add to Database</title>
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
						<form method="post" action="" enctype="multipart/form-data">
							<h2>Add a Game to the Database</h2>
							<hr><br>
							<label for="gameName">Game Name: </label>
							<input name="gameName" type="text">
							<br><br>

							<label for="console">Select Console: </label>
							<!-- Add PHP to collect consoleID and console name? -->
							<select name="console">
								<?php
									// Get list of consoles from CONSOLE list
									getConsoleList(0, $conn);
								?>
							</select>
							<br><br>

							<label for="releaseDate">Release Date: </label>
							<input name="releaseDate" type="date">
							<br><br>

							<label for="genre">Genre: </label>
							<select name="genre">
								<?php
									// Get list of genres from GENRES table
									getGenreList(0, $conn);
								?>
							</select>
							<br><br>

							<label for="desc">Brief Description: </label>
							<br>
							<textarea name="desc" cols="40" rows="5"></textarea>
							<br><br>

							<label for="imgPath">Upload Box Art: </label>
							<input name="imgPath" type="file">
							<br><br>

							<input type="submit" formaction="php/addGameToDB.php" value="Add Game">

						</form>
					</div>
					<!-- Form Fold -->
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