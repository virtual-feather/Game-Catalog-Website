<!DOCTYPE html>
<html>
	<head>
		<title>Game Database | Login</title>
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
						<form method="post" action="">
							<h1>Forgot Username/Password</h1>
							<label for="firstName">Enter your email:</label><br>
							<input type="text" id="email" name="email">
							<br><br>
							<label for="firstName">Enter your 4-digit recovery pin:</label><br>
							<input maxlength="4" type="text" id="recovery" name="recovery">
							<br><br>
							<input type="submit" value="Submit" formaction="php/retrieveAccount.php">
							<br><br>
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