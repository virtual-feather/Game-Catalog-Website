<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Login</title>
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
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h1>Existing Users</h1>
						<hr>

						<form method="post" action="">
							<label for="userName">Username:</label><br>
							<input type="text" id="userName" name="userName">
							<br><br>
							<label for="userName">Password:</label><br>
							<input type="password" id="password" name="password">
							<p><a href="forgot.php">Forgot Username/Password</a></p>
							<input type="submit" value="Login" formaction="php/login.php">
						</form>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<h1>New Users</h1>
						<hr>

						<form style="padding:100px;" action="registerNewUser.php">
							<input type="submit" value="Create New Account">
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