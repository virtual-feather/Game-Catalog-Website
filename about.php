<?php
	include "php/startSession.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Game Database | About</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
	<!-- Header Fold -->

	<body>
		<nav id="navbar">
			<span class="profile">
				<a href="#userProfile.php"><img class="userPFP" src="assets/pfp.jpg"></a>
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
						<h1>Fall 2021 Final Project</h1>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-8">
						<p>Designing and building this website used concepts from <i>Database Management Systems</i>, <i>Web Design</i>, and <i>Software Engineering</i>.</p>
						<p>I created this website for video game collectors and enthusiests so they can have access to their collections when not home. Having this site enables those to check if they have a game in their collection when, for example, out scouting for more.</p>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
						<p>Picture goes here</p>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
						<p>Visitors to the site without an account will have the option to view all the games stored in the database, as well as view users' personal collections.</p>
						<p>Visitors to the site who have an account will be able to view and edit their personal collections, as well as message other users. Those with accounts will also be able to submit new games that are not in the database for other users to add to their collections.</p>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12">
						<br>
						<h1>Credits</h1>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<p>Website desgined and created by Brenden Monteleone.</p>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<p></p>
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