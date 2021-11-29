<?php

    function displayProfileImg() {
        // Check if a user is logged in
        if(isset($_SESSION["userID"])) {
            $imgPath = $_SESSION["userImgPath"];
            $webPath = "userProfilePage.php";
        }

        // Check to see if it was a DB search
        elseif(isset($_SESSION["enteredUNImgPath"])) {
            $imgPath = $_SESSION["enteredUNImgPath"];
            $webPath = "userProfilePage.php";
        }

        // Display Default logo
        else {
            $imgPath = "assets/profileImages/question.jpg";
            $webPath = "index.php";
        }

        // Return the html code with correct image
        return "<a href='".$webPath."'><img class='userPFP' src='".$imgPath."'></a>";
    
    }

?>