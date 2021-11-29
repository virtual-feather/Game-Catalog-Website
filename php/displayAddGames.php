<?php
	// Retrieve Session Variable
	if(isset($_SESSION["searchGame"]) && $_SESSION["searchGame"] != "") {
		// Search the database for this game
		$sql = "SELECT gameName, consoleID, description, imgPath FROM GAMES 
				WHERE gameName LIKE '%".$_SESSION["searchGame"]."%'";

		// Add the console filter
        if($_SESSION["searchedConsole"] != 0)
            $sql = $sql." AND consoleID = ".$_SESSION["searchedConsole"];
		$sql = $sql." ORDER BY gameName ASC;";
	}
	else {
		// Search for 8 games closely related to the user's collection
		$sql = $sql = "SELECT gameName, consoleID, description, imgPath 
					   FROM GAMES 
					   ORDER BY RAND()
					   LIMIT 8;";
	}

	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// Reset counting variables
	$count = 0;
	$pageCount = 1;
	$contentCount = 0;

	// Display each game as a Bootstrap Card
	if($result->num_rows > 0) {
		// Initialize the first page
		echo "</div>"
		."<div id='page".$pageCount."' class='row'>";

		while($row = $result->fetch_assoc()) {
			// Check if 12 games are displayed on the page
			if($contentCount == 8) {
				// Increment page count
				$pageCount++;

				// End current page
				echo "</div>";

				// Open a new page
				echo "<div id='page".$pageCount."' class='row' style='display: none;'>";

				// Reset Content Count
				$contentCount = 0;
			}

			echo "	<div class='gameDisplay col-lg-3 col-md-6 col-sm-6'>\n"
				."		<div class='card'>\n"
				."			<img src='".$row["imgPath"]."' class='card-img-top' alt='Error'>\n"	// Update unknown images
				."			<div class='card-body'>\n"
				."				<h5 class='card-title'>".$row["gameName"]."</h5>\n"	
				."				<form method='post'>\n"	
				."					<button formaction='php/addGame.php' value='".$row["gameName"]."@".$row["consoleID"]."' name='add'>Add Game</button>\n"
				."				</form>"
				."			</div>\n"
				."		</div>\n"
				."	</div>\n";
			
			//Add to the count
			$count+=1;
			$contentCount+=1;

			// Check the count
			if($count == 4) {
				echo "	<div class='gameDisplay col-lg-12 col-md-12 col-sm-12'>\n"
				."			<br><br>\n"
				."		</div>";

				$count = 0;
			}
		}//end While

		// Check if the previous div was closed based on contentCount
		if($contentCount < 8) {
			echo "</div>";
		}
		
		if($pageCount == 1) {}
		else {
			// Page Navbar: Display page numbers based on number of pages
			echo "	<div class='col-lg-12 col-md-12 col-sm-12'>"
			."			<nav aria-label='Game Display Page' class='paginate'>"
			."				<ul class='pagination'>";
			for($i = 1; $i <= $pageCount; $i++) {
				echo "<li class='page-item'><a class='page-link' onclick='changePage(".$i.", ".$pageCount.");'>".$i."</a></li>";
			}

			echo "			</ul>"
			."			</nav>"
			."	 	 </div>";
		}
	}//end if

	else {
		echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
			."		<h2>Could not find a game close to: ".$_SESSION["searchGame"]."</h2>"
			."		<h2>Please Try Again!</h2>"
			."	</div>\n";
	}
	

	

	// Close db connection
	// - closes in userProfile.php
?>