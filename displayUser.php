<?php
	// Include Files
	include "php/dbConnect.php";
	include "php/startSession.php";
	include "php/viewingFunctions.php";

	// Check if the searched variable is set
	if(isset($_SESSION["enteredUN"]))
        $userID = getUserID($_SESSION["enteredUN"], $conn);
    else {
		// Grab from form
		if(isset($_GET["search"])) {
			include "php/grabUserDataFromSearch.php";
			$userID = getUserID($_SESSION["enteredUN"], $conn);
		}
		else
			header("Location: index.php");
		
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>The Shelf | Collection</title>
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
                    <?php
                        // Store the mode
                        $mode = "view";

                        // Display User's Profile
                        displayProfile($mode, $userID, $conn);

                        // Clear Session supplements
                        //include "php/clearSessionSupplements.php";

                    ?>

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