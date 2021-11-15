<?php
    // Include files
    include "dbConnect.php";
    include "alerts.php";
    include "imageFunctions.php";

    // Collect form data
    $gameName = $_POST["gameName"];
    $console = $_POST["console"];
    $releaseDate = $_POST["releaseDate"];
    $genre = $_POST["genre"];
    $desc = $_POST["desc"];

    // Check if required fields are entered
    if($gameName == "" || $console == "" || $releaseDate == "" || $genre == "") {
        echo "
			<script type='text/javascript'>
				alert('Please enter all fields.')
				window.location.href = '../addGametoDBForm.php';
			</script>";
    }

    // Everything entered
    else {
        // No image uploaded, set default image
        if($_FILES["imgPath"]["name"] == "") 
            $imgName = "question.jpg";   
        
        // Image Uploaded
        else 
            $imgName = uploadImage("../assets/gamePhotos/", $_FILES["imgPath"]);
        
<<<<<<< Updated upstream
        echo $imgName;
=======
        //echo $imgName;
>>>>>>> Stashed changes

        // !IMPORTANT! Check if the game is already in the database before adding
        // <-- DO THIS

        // Insert game into the database
        $sql = "INSERT INTO GAMES 
                VALUES(null, ".$console.", '".$gameName."', '".$releaseDate."', '".$genre."', '".$desc."', 'assets/gamePhotos/".$imgName."');";
        $result = $conn->query($sql);

        // Check if the query was successful
        if (!$result) {
            echo "
            <script type='text/javascript'>
                alert('There was an error adding the game. Please try again or contact support if the issue persists.')
                window.location.href = '../addGametoDBForm.php';
            </script>";  
        }

        // Game Added
        else {
            echo "
                <script type='text/javascript'>
                    alert('".$gameName." was succesfully added to the database!')
                    window.location.href = '../addGametoDBForm.php';
                </script>";  
        }

    }   

    // Close connection
    $conn->close();
?>