<?
	if( !isset($_SESSION["userName"]) && !isset($_SESSION["password"]) )
		header("Location: index.php");
?>