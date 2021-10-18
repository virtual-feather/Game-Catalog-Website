<?php
	include "php/startSession.php";
	include "php/loggedIn.php";
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
				<a href="#userProfilePage.html"><img class="userPFP" src="assets/pfp.jpg"></a>
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
								<!-- Nintendo Home Consoles -->
								<option>NES</option>
								<option>SNES</option>
								<option>N64</option>
								<option>Gamecube</option>
								<option value="4">Wii</option>
								<option value="2">Wii U</option>
								<option value="3">Switch</option>

								<!-- Nintendo Handhelds -->
								<option>Gameboy</option>
								<option>Virtual Boy</option>
								<option>Gameboy Color</option>
								<option>Gameboy Advanced</option>
								<option>DS</option>
								<option value="1">3DS</option>

								<!-- Sony Home Consoles -->
								<option>Playstation 1</option>
								<option>Playstation 2</option>
								<option>Playstation 3</option>
								<option>Playstation 4</option>
								<option>Playstation 5</option>

								<!-- Sony Handhelds -->
								<option>PSP</option>
								<option>PS Vita</option>

								<!-- Microsoft Home Consoles -->
							</select>
							<br><br>

							<label for="releaseDate">Release Date: </label>
							<input name="releaseDate" type="date">
							<br><br>

							<label for="genre">Genre: </label>
							<select name="genre">
								<option value="Action">Action</option>
								<option value="Adventure">Adventure</option>
								<option value="ARPG">ARPG</option>
								<option value="Exploration">Exploration</option>
								<option value="FPS">First-Person Shooter</option>
								<option value="Hack & Slash">Hack & Slash</option>
								<option value="RPG">RPG</option>
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

</html>