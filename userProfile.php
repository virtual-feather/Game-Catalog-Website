<!-- Include PHP files -->
<?php
	include "php/dbConnect.php";
	include "php/startSession.php";

	// Check to see if someone is logged in
	if($_SESSION["userName"] == "" || $_SESSION["password"] == "")
		header("Location: index.php");
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Game Database | Profile</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/functions.js"></script>
	</head>
	<!-- Header Fold -->

	<body>
		<nav id="navbar">
			<span class="profile">
				<a href="userProfile.php"><img class="userPFP" src="assets/pfp.jpg"></a>
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