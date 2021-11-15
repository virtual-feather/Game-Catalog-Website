<?php
    // Connect to Database
    include "startSession.php";
    include "dbConnect.php";
    include "debugging.php";
    include "viewingFunctions.php";

    // Get request variable from user input
    $inputUN = $_REQUEST["q"];

    // Debugging
    //toConsole($inputUN);

    $sql = "SELECT userName
            FROM USERS
            WHERE userName LIKE '%";
    
    $sql = $sql.$inputUN."%';";
    $result = $conn->query($sql);

    // Check if the query was successful
    if (!$result)
        trigger_error('Invalid query: ' . $conn->error);

    else {
        // Get the result
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Check if the name is the current user's name
                if(isset($_SESSION["userName"]) && ($row["userName"] == $_SESSION["userName"])) {
                    //Do Nothing
                }

                else 
<<<<<<< Updated upstream
                    echo "<p><a href='findUser.php?search=".$row["userName"]."'>".$row["userName"]."</a></p>";
            }
=======
                    //echo "<p><a href='findUser.php?search=".$row["userName"]."'>".$row["userName"]."</a></p>";
                    echo "<p><a href='displayUser.php?search=".$row["userName"]."'>".$row["userName"]."</a></p>";
            }   
>>>>>>> Stashed changes
        }
        else 
            echo "No User Found..";
    }
    

    // Close db connection
    $conn->close();
?>