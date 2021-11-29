UPDATE 9/19/21
- Fixed password hashing and storage
- Implemented Forgot Username/Password page
- Updated about.php

UPDATE 9/26/21
- NEW USERS: Content is saved if account creation fails
- Began work implementing 'Edit Collection'
- Name proposal: The Shelf
- Updated site presentation

UPDATE 10/2/21
- Implemented basic version of 'View Collection'
	- Filter variable supported (needs work)
- Implemented removing games from collections

UPDATE 10/3/21
- Implemented adding games to collections
	- Implemented search functionality
- Add filter functionality to 'View Collection' page

UPDATE 10/11/21
- Implemented console sorting when viewing collection

UPDATE 10/18/21
- Implemented adding games to the database: MOD only feature
- Viewing: Now pulls console list from user's collection
- Display what filters were chosen
- Added Genre filters to view games
- DATABASE UPDATES:
	- Added GENRES table
	- Modified GAMES table to include genreID variable

UPDATE 11/08/21
- Implemented 'database.php'
	- Search through database's games implemented
	- Implemnted beta version of looking up users in the database
		- If a user is signed in, they cannot search themselves
- Added filters to removing games from collections
- Various UI updates
- Began implementing user profile page

UPDATE 11/15/21
- Implemented Viewing Profiles
	- View profiles from searched users
	- View your own profile
- Implemented Editing Profiles
	- Update profile images
	- Update profile information
- Various bug fixes

UPDATE 11/29/21 <--- NEW UPDATE
- Implemented static pagination
	- Personal profiles supported
	- Removing games supported
	- Adding games supported
	- Viewing other profiles supported
- Updated Add Games
	- Updated UI
	- Added console sorting 
	- Fixed adding games on multiple consoles
- Updated viewing other user's collections
	- Can now sort through other user's games
- Various bug fixes


TODO:
-> MODS: Adding consoles to the database?
-> Adding Games fixes
	-> Suggested Games based on User's collection
-> Planned Features for profiles:
	-> View Statistics 
		-> Total worth?
		-> Charts? (https://canvasjs.com/php-charts/pie-chart/)
	-> Allow edits to be made to the account
		-> First & Last Name
		-> PIN
		-> Email
-> Incorporate Dynamic Pagination


-----------------

BONUS FEATURES:
- Messaging other users
- Planned Features for database:
	-> Single player vs. Multiplayer
- Page to outline specific titles & their details


-----------------
DEVELOPMENT INFO
- When adding more columns to USERS table:
	- Update php/login.php to query these new columns
	- Place new columns in a new session variable
	- Update clearSessionSupplements.php to ensure these new variables are not deleted