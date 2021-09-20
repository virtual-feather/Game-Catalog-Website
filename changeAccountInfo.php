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
<!--
				<?php 
					include "php/displayUserName.php";
					include "php/displayNav.php";
				?>
-->
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
						<?php
						// Display username
						echo "<h1>Welcome ".$_SESSION["userFullName"]."!</h1>";
						echo "<h2>Your username is: ".$_SESSION["userName"]."</h2>";
						?>

						<form method="post" action="">
							<label for="password1">Enter your new password:</label><br>
							<input type="password" name="password1">
							<br><br>
							<label for="password2">Enter the password again:</label><br>
							<input type="password" name="password2">
							<br><br>
							<input type="submit" value="Update Account" formaction="php/updateAccount.php">
						</form>
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