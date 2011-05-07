<?php	
ob_start();
session_start();

require_once ("functions.php");

if(checkLoggedin() != true) {
	echo "<a href=\"login.php\">Login</a>";
	echo "|";
	echo "<a href=\"signup.php\">Sign up</a>";
}
else {
	echo "<a href=\"login.php?do=logout\">Log out</a>";
}
	
echo "|";
echo "<a href=\"help.html\">Help</a>";
	
// testing edited pm Github	
?>

