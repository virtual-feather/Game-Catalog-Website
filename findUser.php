<?php
    // Start the session and clear the superfluous content
	include "php/dbConnect.php";
	include "php/startSession.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Database</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <script type="text/javascript" src="js/functions.js"></script> -->
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
					<?php
<<<<<<< Updated upstream
						// Clear supplements
						include "php/clearSessionSupplements.php";

						// Perform a quick query with the selected name
						include "php/grabUserDataFromSearch.php";

						// Display user's information
						echo "<div class='col-lg-12 col-md-12 col-sm-12'>".
								"<h1>".$_GET['search']."'s Collection</h1>".
								"<hr><br>".
							 "</div>";
=======
						// Check if the search variable is set
						if(isset($_SESSION["enteredUN"])) 
							$foundUN = $_SESSION["enteredUN"];
						else
							header("Location: index.php");
						
						// Clear supplements
						//include "php/clearSessionSupplements.php";
						
						// Coming from database.php
						if(!isset($foundUN)) {
							// Perform a quick query with the selected name
							//include "php/grabUserDataFromSearch.php";

							// Display user's information
							echo "<div class='col-lg-12 col-md-12 col-sm-12'>".
									"<h1><a href='displayUser.php'>".$foundUN."'s Collection</a></h1>". // used to be $_GET['search']
									"<hr><br>".
								"</div>";
						}

						// Coming from displayUser.php
						else {
							// Display user's information
							echo "<div class='col-lg-12 col-md-12 col-sm-12'>".
									"<h1><a href='displayUser.php'>".$foundUN."'s Collection</a></h1>".
									"<hr><br>".
								"</div>";
						}
>>>>>>> Stashed changes

						// Store mode. DEFAULT: VIEW
						$mode = 'view';

						// Grab user information to view
						include "php/displayGames.php";
						
					?>

					<div class="col-lg-12 col-md-12 col-sm-12">
						<br>
						<br>
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

	<?php
		// Close Connection
		$conn->close()
	?>
</html>