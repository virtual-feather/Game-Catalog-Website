<!-- Include PHP files -->
<?php
	include "php/dbConnect.php";
	include "php/startSession.php";

	if(isset($_SESSION["userName"]))
		include "php/clearSessionSupplements.php";
	else
		include "php/clearSession.php";
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
						<h1>The Shelf</h1>
						<hr>
					</div>

					<div class="col-lg-8 col-md-8 col-sm-8">
						<h2>Track Your Collection</h2>
						<p class="paragraph">Quickly view which games are in your collection with The Shelf! 
							Built for collectors and video game enthusiests, keep a virtual 
							collection with you at all times. Look up what your friends have in their
							collections as well!
						</p>
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