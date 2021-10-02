<!-- Include PHP files -->
<?php
	include "php/dbConnect.php";
	include "php/startSession.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Home</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
	<!-- Header Fold -->

	<body>
		<nav id="navbar">
			<span class="profile">
				<a href="#userProfilePage.php"><img class="userPFP" src="assets/pfp.jpg"></a>
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
						<h1>The Shelf</h1>
						<hr>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-8">
						<h2>Build your collection online</h2>
						<p>Take control of your game collection on the go!</p>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
						<h2>NULL</h2>
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

<?php
	// Close DB Connection
	$conn->close();
?>