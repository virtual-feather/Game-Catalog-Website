<?php 
	include "php/savedInput.php"; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Game Database | Register</title>
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
					include 'php/displayNav.php';
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
							<h1>Create An Account</h1>
							<label for="firstName">First Name:</label><br>
							<input type="text" id="firstName" name="firstName" value=<?php echo $_SESSION["loginfirstName"];?>>
							<br><br>
							<label for="lastName">Last Name:</label><br>
							<input type="text" id="lastName" name="lastName" value=<?php echo $_SESSION["loginlastName"];?>>
							<br><br>
							<label for="email">Email:</label><br>
							<input type="text" id="email" name="email" value=<?php echo $_SESSION["loginemail"];?>>
							<br><br>
							<label for="userName">Username:</label><br>
							<input type="text" id="userName" name="userName" value=<?php echo $_SESSION["loginuserName"];?>>
							<br><br>
							<label for="password">Password:</label><br>
							<input type="password" id="password" name="password">
							<br><br>
							<label for="password2">Confirm Password:</label><br>
							<input type="password" id="password2" name="password2">
							<br><br>
							<label for="recovery">Enter a 4-digit recovery pin:</label><br>
							<input maxlength="4" type="text" id="recovery" name="recovery" value=<?php echo $_SESSION["loginrecovery"];?>>
							<br><br>
							<input type="submit" value="Submit" formaction="php/newUser.php">
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

<?php include "php/clearSession.php"; ?>