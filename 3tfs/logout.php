<?php
	// If the user is logged in, delete the session vars to log out
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		// delete the session vars by clearing the $_SESSION array
		$_SESSION = array();
		
		// Delete the session cookie by setting its expiration to an hour ago
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 3600);
		}
		
		// Destroy the session
		session_destroy();
	}
	
	// redirect to the homepage
	$home_url = 'http://'.$_SERVER['HTTP_POST'].dirname($_SERVER['PHP_SELF']).'/index.php';
	header('Location : '.$home_url);
?>