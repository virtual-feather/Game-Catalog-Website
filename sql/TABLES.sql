/* Finish Table creations */
CREATE TABLE 'USERS' (
	'userID' INT NULL AUTO_INCREMENT,
	'userEmail' VARCHAR(100) NOT NULL,
	`userFirstName` VARCHAR(50) NOT NULL, 
	`userLastName` VARCHAR(50) NOT NULL, 
	`userPassword` VARCHAR(50) NOT NULL, 
	PRIMARY KEY (`userID`)
	);

CREATE TABLE 'GENRES' {

}
