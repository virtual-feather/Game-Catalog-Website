<?php
    include "alerts.php";

    /*  getConsoleList(): Returns a list of consoles to be displayed
                          in a drop down list format (ex. <option>)
        @param $userID: User's ID to grab list from
        @param $dbConn: Database Connection
    */
    function getConsoleList($userID, $dbConn) {
        // Get all consoles in the database
        if($userID == 0) {
            $sql = "SELECT ConsoleID, ConsoleName
                    FROM CONSOLE;";
        }

        // Query list of consoles from the users collection
        else {
            $sql = "SELECT DISTINCT CONSOLE.ConsoleName, CONSOLE.ConsoleID
                FROM COLLECTION NATURAL JOIN CONSOLE
                WHERE COLLECTION.consoleID = CONSOLE.ConsoleID
                AND COLLECTION.userID = ".$userID.";";
        }
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);
        
        // Get rows
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value=".$row["ConsoleID"].">".$row["ConsoleName"]."</option>";
            }
        }

    }//end getConsoleList

    /*  getGenreList(): Returns the list of genres in a user's
                        collection
        @param $userID: User in question
        @param $dbConn: Database Connection
    */
    function getGenreList($userID, $dbConn, $dropDown=TRUE) {
        // Get all consoles in the database
        if($userID == 0) {
            $sql = "SELECT genreID, genreName
                    FROM GENRES;";
        }

        // Query list of consoles from the users collection
        else {
            $sql = "SELECT DISTINCT genreName, genreID
                    FROM COLLECTION NATURAL JOIN GAMES NATURAL JOIN GENRES
                    WHERE COLLECTION.userID = ".$userID."
                    AND COLLECTION.gameID = GAMES.gameID;";
        }
        $result = $dbConn->query($sql);
        
        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);
        
        if($userID == 0) {
            // Get rows
            if($result->num_rows > 0) {
                // Make it a dropdown list format
                if($dropDown) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["genreID"]."'>".$row["genreName"]."</option>";
                    }
                }

                else {
                    $count = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<label>".$row["genreName"]."</label>\n
                                <input type='checkbox' name='genre".strval($count)."' value='".$row["genreID"]."'>";
                        $count++;
                    }
                }
            }
        }

        else {
            // Get rows
            if($result->num_rows > 0) {
                $count = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<label>".$row["genreName"]."</label>\n
                            <input type='checkbox' name='genre".strval($count)."' value='".$row["genreID"]."'>";
                    $count++;
                }
            }
        }
    }

    /*  convertGenreID(): Converts a genreID to its associated 
                          name
        @param $genreID: ID in question
        @param $dbConn: Database Connection
    */
    function convertGenreID($genreID, $dbConn) {
        $sql = "SELECT genreName
                FROM GENRES
                WHERE genreID = ".$genreID.";";
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);
        
        // Get name
        if(($row = $result->fetch_assoc()) != 0 )
            return $row["genreName"];
        
    }
    
    /*  getConsoleName(): Returns the name of the console based on 
                          ID number
        @param $consoleID: ID of the console in question
        @param $dbConn: Database Connection
    */
    function getConsoleName($consoleID, $dbConn) {
        $sql = "SELECT ConsoleName 
                FROM CONSOLE 
                WHERE ConsoleID = " . $consoleID . ";";
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);

        // Get the result
        if(($row = $result->fetch_assoc()) != 0 ) 
            return $row["ConsoleName"];
        
    }

    /*
    */
    function getUserID($userName, $dbConn) {
        $sql = "SELECT userID 
                FROM USERS
                WHERE userName='".$userName."';";
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);
        
        // Get the result
        if(($row = $result->fetch_assoc()) != 0 ) 
            return $row["userID"];
    }

    function getTotalGames($userID, $dbConn) {
        // Query all games in collection
        $sql = "SELECT gameName, consoleName, GAMES.releaseDate, GAMES.description, genreName, imgPath
		    FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS JOIN GENRES
		    WHERE COLLECTION.userID = USERS.userID 
		    AND COLLECTION.gameID = GAMES.gameID 
		    AND COLLECTION.consoleID = CONSOLE.ConsoleID
		    AND GENRES.genreID = GAMES.genreID
            AND USERS.userID = ".$userID.";";
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result) 
            trigger_error('Invalid query: ' . $dbConn->error);

        if($result->num_rows > 0) 
            return $result->num_rows;
        
        else
            return 0;
    }

    /*  displayProfile(): Display's the profile of the given userID
        @param uID: userID to use to display profile
    */
    function displayProfile($mode, $userID, $dbConn) {
        // Logged In Profiles
        if(isset($_SESSION["userID"]) && $userID == $_SESSION["userID"]) {
            $pfpImgPath = $_SESSION["userImgPath"];
            $userName = $_SESSION["userName"];
            $accountName = $_SESSION["accountName"];
            $favConsole = $_SESSION["userFavConsole"];
            $favGame = $_SESSION["userFavGame"];
            $bio = $_SESSION["userBio"];
            $email = $_SESSION["userEmail"];
        }
        // Searched Profiles
        else {
            // Query the userID to get relevant information
            $sql = "SELECT userName, userFirstName, userLastName, userFavConsole, userFavGame, userBio, userImgPath
                    FROM USERS
                    WHERE userID = '".$userID."';";
            $result = $dbConn->query($sql);

            // Check if the query was successful
            if (!$result)
                trigger_error('Invalid query: ' . $dbConn->error);
    
            // Get the information
            if(($row = $result->fetch_assoc()) != 0 ) {
                $pfpImgPath = $row["userImgPath"];
                $userName = $row["userName"];
                $accountName = $row["userFirstName"]." ".$row["userLastName"];
                $favConsole = $row["userFavConsole"];
                $favGame = $row["userFavGame"];
                $bio = $row["userBio"];
            }
        }

        // Display profile image
        echo "  <div class='col-lg-5 col-md-6 col-sm-12 profileImg'>";
        
        // Determine what to show based on mode
        if($mode == "view") {
            echo "  <br>
                    <img src='".$pfpImgPath."'>";
        }
        else {
            echo "  <br>
                    <img src='".$pfpImgPath."'>";
        }

        echo "  </div>";

        // Display Content
        echo "  <div class=' profileBody col-lg-7 col-md-6 col-sm-12'>"
        ."           <h1>".$userName."'s Profile</h1>";

        // Determone what to show based on mode
        if($mode == "view") {
            if(isset($_SESSION["userID"]) && $userID == $_SESSION["userID"])
                echo "   <a href='updateProfilePage.php'>Update Profile</a>";
        
            echo "   <hr>"
            ."       <code>Name: ".$accountName."</code><br>"
            ."       <code>Total Games: ".getTotalGames($userID, $dbConn)."</code><br>"
            ."       <code>Favorite Platform: ".$favConsole."</code><br>"   
            ."       <code>Favorite Game: ".$favGame."</code><br>"     
            ."       <code>Bio: ".$bio."</code><br>";   

            if(!isset($_SESSION["userID"]) || ($userID != $_SESSION["userID"])) {
                echo "<hr>
                      <form action='findUser.php'>
                        <input type='submit' value='View Collection' />
                      </form>";
            }

            echo "</div>";
        }   
        elseif($mode == "edit") {
            echo "  <hr>"
            ."      <form method='post' enctype='multipart/form-data'>"
            ."          <label>Change Profile Image: </label>"
            ."          <input name='pfp' type='file'><br>"
            ."          <label>Favorite Console: </label>"
            ."          <select name='console' value='".$favConsole."'>";
                            getConsoleList(0, $dbConn);
            echo "      </select><br>"
            ."          <label>Favorite Game: </label>"
            ."          <input name='game' type='text' value='".$favGame."'><br>"
            ."          <label> Bio: </label><br>"
            ."          <textarea name='bio' cols='40' rows='5'>".$bio."</textarea>"
            ."          <code>Character Limit: 100</code><br><br>"
            ."          <input type='submit' value='Update Profile' formaction='php/confirmProfileChanges.php'>"
            ."          <input type='submit' value='Reset Changes' formaction='updateProfilePage.php'>"
            ."          <input type='submit' value='Return to Profile' formaction='userProfilePage.php'>" 
            ."      </form>"
            ."  </div>";
/*
            ."  <div class='col-lg-12 col-md-12 col-sm-12'>"
            ."      <br>"
            ."      <h1>Edit Account Information</h1>"
            ."      <hr>"
            ."      <form method='post'>"
            ."          <label>Update Name: </label>"
            ."          <input name='name' type='text' value='".$accountName."'><br>"
            ."          <label>Update Email: </label>"
            ."          <input name='email' type='text' value='".$email."'>"
            ."      </form>"
            ."  </div>";
*/
        }

        
        // Display Stats about collection
        echo "  <div class='col-lg-12 col-md-12 col-sm-12'>"
        ."          <br>"
        ."      </div>";
    }
?>