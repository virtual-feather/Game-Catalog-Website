/* Query below displays all games and their associated console */
SELECT gameName, consoleName FROM CONSOLE JOIN GAMES WHERE
	CONSOLE.ConsoleID AND GAMES.consoleID = 1;

/* Query below displays what games a specific user has (Brenden in this example)*/
SELECT userFirstName, gameName, consoleName 
FROM COLLECTION JOIN CONSOLE JOIN GAMES JOIN USERS 
WHERE COLLECTION.userID = USERS.userID 
AND COLLECTION.gameID = GAMES.gameID 
AND COLLECTION.consoleID = CONSOLE.ConsoleID
AND USERS.userID = 1;