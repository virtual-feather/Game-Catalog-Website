<?php
    include "alerts.php";

    /*  getConsoleList(): Returns a list of consoles to be displayed
                          in a drop down list format (ex. <option>)
        @param $userID: User's ID to grab list from
        @param $dbConn: Database Connection
    */
    function getConsoleList($userID, $dbConn) {
        // Query list of consoles from the users collection
        $sql = "SELECT DISTINCT CONSOLE.ConsoleName, CONSOLE.ConsoleID
                FROM COLLECTION NATURAL JOIN CONSOLE
                WHERE COLLECTION.consoleID = CONSOLE.ConsoleID
                AND COLLECTION.userID = ".$userID.";";
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
    function getGenreList($userID, $dbConn) {
        // Query list of genres from the users collection
        $sql = "SELECT DISTINCT genreName, genreID
                FROM COLLECTION NATURAL JOIN GAMES NATURAL JOIN GENRES
                WHERE COLLECTION.userID = ".$userID."
                AND COLLECTION.gameID = GAMES.gameID;";
        $result = $dbConn->query($sql);

        // Check if the query was successful
        if (!$result)
            trigger_error('Invalid query: ' . $dbConn->error);
        
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

    /*
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

    /*  getFilterList(): Returns a list of consoles to be displayed
                         in a drop down list format (ex. <option>)
        @param $userID: User's ID to grab list from
        @param $dbConn: Database Connection
    */
    function getFilterList($userID, $dbConn) {
        
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

?>