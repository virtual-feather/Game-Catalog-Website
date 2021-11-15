<?php
    // Enable the session variables
    include "startSession.php";
    include "viewingFunctions.php";
    include "dbConnect.php";
    include "imageFunctions.php";

    // Get the form data
    $console = getConsoleName($_POST["console"], $conn);
    $game = $_POST["game"];
    $bio = $_POST["bio"];

    // Get relevant session data
    $userID = $_SESSION["userID"];
    $userPFP = $_SESSION["userImgPath"];
    $favConsole = $_SESSION["userFavConsole"];
    $favGame = $_SESSION["userFavGame"];
    $userBio = $_SESSION["userBio"];

    // Compare each section of the form and update accordingly

    // No PFP image uploaded, do nothing
    if($_FILES["pfp"]["name"] == "") {}
        
    // PFP image Uploaded
    else {
        try {
            $pfp = uploadImage("../assets/profileImages/", $_FILES["pfp"], $userID);
            

            // Check the route in the db, if its changing from default change
            if($userPFP == "assets/profileImages/default.jpg") {
                $userPFP = "assets/profileImages/".$pfp;

                // Change in DB
                $sql = "UPDATE USERS 
                        SET userImgPath = '".$userPFP."'
                        WHERE userID = ".$userID;
                $result = $conn->query($sql);

                // Check if the query was successful
                if (!$result)
                    trigger_error('Invalid query: ' . $conn->error);
        
                // Change the session variable
                $_SESSION["userImgPath"] = $userPFP;
            }

        }
        catch(Exception $e){
            echo "
                <script type='text/javascript'>
                    alert('There was a problem uploading the image.')
                    window.location.href = '../updateProfilePage.php';
                </script>";
        }
        
    }

    // Update Favorite console
    if($console != $favConsole) {
        // Update the database
        $sql = "UPDATE USERS 
                SET userFavConsole = '".$console."'
                WHERE userID = ".$userID.";";
        $result = $conn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $conn->error);

        // Change the session variable
        $_SESSION["userFavConsole"] = $console;
    }

    // Update Favorite game
    if($game != $favGame) {
        // Update the database
        $sql = "UPDATE USERS 
                SET userFavGame = '".$game."'
                WHERE userID = ".$userID.";";
        $result = $conn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $conn->error);

        // Change the session variable
        $_SESSION["userFavGame"] = $game;
    }

    // Update the Bio
    if($bio != $userBio) {
        echo strlen($bio);
        // Trigger error to the user
        if(strlen($bio) > 100) {
            echo "
            <script type='text/javascript'>
                alert('Bio has too many characters.')
                window.location.href = '../updateProfilePage.php';
            </script>";  
        }
        else {

            // Update the database
            $sql = "UPDATE USERS 
                    SET userBio = '".$bio."'
                    WHERE userID = ".$userID.";";
            $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result)
                trigger_error('Invalid query: ' . $conn->error);

            // Change the session variable
            $_SESSION["userBio"] = $bio;
        }

    }

    // Close DB Connection
    $conn->close();

    // Everything's done, move to previous page
	header("Location: ../updateProfilePage.php");
?>