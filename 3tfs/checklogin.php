<?php

session_start();

require_once("appvars.php");
require_once("connectvars.php");

//Clear the error message 
$error_msg = "";

// if user is not logged in, try to log them in
if (!isset($_SESSION['user_id'])) {
	if (isset($_POST['submit'])) {
	
	// Connect to the database
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Grab the user-entered log-in data
	$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	
		if (!empty($user_username) && !empty($user_password)) {
			// Look up the username and password in db
			$query = "SELECT user_id, username, password FROM 3tfs WHERE username = '$user_username' AND password = '$user_password'";
			
			$data = mysqli_query($dbc, $query);
			
			if (mysqli_num_rows($data) == 1) {
				// The login is OK so set the user id and username cookies and redirect to the homepage
				$row = mysqli_fetch_array($data);
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
				header('Location : '.$home_url);
			}
			else {
				// The username/password are incorrect so send the authentication headers
				$error_msg = 'Sorry, your username or password is incorrect.';
			}
		}
		else {
			// The username or password was not entered so set an error message
			$error_msg = 'Sorry, you must enter your username and password to log in.';
		}
	
	}
} else {
	// delete the session vars by clearing the $_SESSION array
		$_SESSION = array();
		
		// Delete the session cookie by setting its expiration to an hour ago
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 3600);
		}
		
		// Destroy the session
		session_destroy();
			
	// redirect to the homepage
	$home_url = 'http://'.$_SERVER['HTTP_POST'].dirname($_SERVER['PHP_SELF']).'/index.php';
	header('Location : '.$home_url);
}
?>