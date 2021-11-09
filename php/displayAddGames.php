<?php
	// Retrieve Session Variable
	if(isset($_SESSION["searchGame"])) {
		// Search the database for this game
		$sql = "SELECT gameName, description, imgPath FROM GAMES 
				WHERE gameName LIKE '%".$_SESSION["searchGame"]."%';";
	}
	else {
		$sql = $sql = "SELECT gameName, description, imgPath FROM GAMES";
	}

	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	$count = 0;

	// Display each game as a Bootstrap Card
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($count == 4) {
				echo "	<div class='gameDisplay col-lg-12 col-md-12 col-sm-12'>\n"
				."			<br><br>\n"
				."		</div>";

				$count = 0;
			}

			echo "	<div class='gameDisplay col-lg-3 col-md-6 col-sm-6'>\n"
				."		<div class='card'>\n"
				."			<img src='".$row["imgPath"]."' class='card-img-top' alt='Error'>\n"	// Update unknown images
				."			<div class='card-body'>\n"
				."				<h5 class='card-title'>".$row["gameName"]."</h5>\n"	
				."				<form method='post'>\n"	
				."					<button formaction='php/addGame.php' value='".$row["gameName"]."' name='add'>Add Game</button>\n"
				."				</form>"
				."			</div>\n"
				."		</div>\n"
				."	</div>\n";

			$count+=1;
		}//end While
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