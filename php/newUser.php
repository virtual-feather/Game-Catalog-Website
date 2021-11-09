<!--
	Alert redirecting: https://stackoverflow.com/questions/19825283/redirect-to-a-page-url-after-alert-button-is-pressed/19825307
-->
<?php
	// Include alert function
	include "alerts.php";

	// Include saved info file
	include "savedInput.php";

	// Connect to db
	include "dbConnect.php";

	// Set variables from previous page
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$email = $_POST["email"];
	$userName = $_POST["userName"];
	$password1 = $_POST["password"];
	$password2 = $_POST["password2"];
	$recovery = $_POST["recovery"];

	// Store the session in saved file
	$_SESSION["loginfirstName"] = $firstName;
	$_SESSION["loginlastName"] = $lastName;
	$_SESSION["loginemail"] = $email;
	$_SESSION["loginuserName"] = $userName;
	$_SESSION["loginpassword1"] = $password1;
	$_SESSION["loginpassword2"] = $password2;
	$_SESSION["loginrecovery"] = $recovery;

	// Check to see if a user with that email exists in the DB
	$sql = "SELECT userID FROM USERS WHERE 
			userEmail = '".$email."'";
	$result = $conn->query($sql);

	// Check if the query was successful
	if (!$result)
		trigger_error('Invalid query: ' . $conn->error);

	// All fields not entered
	if($firstName == "" || $lastName == "" || $email == "" || $userName == "" || $password1 == "" || $password2 == "" || $recovery == "") {
		// Alert that not all fields were entered
		echo "
			<script type='text/javascript'>
				alert('Please enter all fields!');
				window.location.href = '../registerNewUser.php';
			</script>";
	}

	// All fields entered
	else {

		// User does not exist, start process to create one
		if( ($row = $result->fetch_assoc()) == 0 ) {
			//Both passwords entered are the same
			if($password1 == $password2) {
				// Create new account
				$pass = crypt($password1, $recovery);
				$recover = crypt($recovery, $password1);

				$sql = "INSERT INTO USERS VALUES
						(null, 0, '".$email."','".$userName."','".$firstName."','".$lastName."','".$pass."','".$recover."', 'assets/profileImages/default.jpg')";
				$result = $conn->query($sql);

				// Check if the query was successful
				if (!$result)
					trigger_error('Invalid query: ' . $conn->error);

				// Query successful!
				else {
					// Clear the savedInput session
					include "clearSession.php";

					// Alert that account was created
					echo "
						<script type='text/javascript'>
							alert('Account created! Login to continue');
							window.location.href = '../login.php';
						</script>";
				}
			}

			// Passwords don't match, return to account creation
			else {
				// Alert that passwords did not match
				echo "
					<script type='text/javascript'>
						alert('Passwords did not match. Please try again.');
						window.location.href = '../registerNewUser.php';
					</script>";
			}
		}//end creating an account

		// User does exist, display message for the user
		else {
			// Alert that user already exists
			echo "
				<script type='text/javascript'>
					alert('A user with that email already exists. Please try again.');
					window.location.href = '../registerNewUser.php';
				</script>";
		}//end user dne

	}//end check fields

	// Close DB Connection
	$conn->close();
?>
login