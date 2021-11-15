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

UPDATE 11/15/21 <-- UPDATE GITHUB
- Implemented Viewing Profiles
	- View profiles from searched users
	- View your own profile
- Implemented Editing Profiles
	- Update profile images
	- Update profile information
- Various bug fixes


TODO:
-> Incorporate Pagination
-> FIX: Uploading Profile Images
	-> Only works for me, which is strange
-> MODS: Adding consoles to the database?
-> Upload site and database to spectrisstudio.com/TheShelf
	-> Debug stuff


-----------------

-> Planned Features for profiles:
	-> View Statistics 
		-> Total worth?
	-> Allow edits to be made to the account
	-> First & Last Name
	-> PIN
	-> Email

- Messaging other users
-> Adding Genre Filters to Adding Games 
	-> Don't need to search gamename, can just do by genre as well
- Planned Features for database:
	-> Single player vs. Multiplayer
- Page to outline specific titles & their details


-----------------
DEVELOPMENT INFO
- When adding more columns to USERS table:
	- Update php/login.php to query these new columns
	- Place new columns in a new session variable
	- Update clearSessionSupplements.php to ensure these new variables are not deleted