<?php
	// Retrieve Session Variable
	if(isset($_SESSION["searchGame"])) {
		// Search the database for this game
		$sql = "SELECT gameName, description FROM GAMES 
				WHERE gameName LIKE '%".$_SESSION["searchGame"]."%';";
		$result = $conn->query($sql);

		// Check if the query was successful
		if (!$result)
			trigger_error('Invalid query: ' . $conn->error);

		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "	<div class='col-lg-3 col-md-6 col-sm-6'>\n"
					."		<div class='card'>\n"
					."			<img src='assets/question.jpg' class='card-img-top' alt='Error'>\n"	// CHANGE IMAGE PATH!
					."			<div class='card-body'>\n"
					."				<h5 class='card-title'>Click to add!</h5>\n"	
					."				<form method='post' action='php/addGame.php'>\n"	// Implement addGame.php	
					."				<input type='Submit' value='".$row["gameName"]."' name='add'>\n"	
					."				</form>"
					."			</div>\n"
					."		</div>\n"
					."	</div>\n";
			}//end While
		}//end if

		else {
	    	echo "	<div class='col-lg-12 col-md-12 col-sm-12'>\n"
	    		."		<h2>Could not find a game close to: ".$_SESSION["searchGame"]."</h2>"
	    		."		<h2>Please Try Again!</h2>"
	    		."	</div>\n";
	  	}
	}

	

	// Close db connection
	// - closes in userProfile.php
?>