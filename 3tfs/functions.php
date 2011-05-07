<?php

require_once("appvars.php");
require_once("connectvars.php");

// <=======================================>
// <===== functions to connect to DB ======>
// <=======================================>

function connectDB() {
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	return $dbc;
}

function closeDB($dbc) {
	if (!$dbc)
	return msqli_close($dbc);
}


// <===================================>
// <===== functions for 'Log in' ======>
// <===================================>

function createsessions($username,$password)
{
    //Add additional member to Session array as per requirement
    session_register();

    $_SESSION["gdusername"] = $username;
    $_SESSION["gdpassword"] = $password;
    //$_SESSION["gdpassword"] = md5($password);
    if(isset($_POST['remme']))
    {
        //Add additional member to cookie array as per requirement
        setcookie("gdusername", $_SESSION['gdusername'], time()+60*60*24*100, "/");
        setcookie("gdpassword", $_SESSION['gdpassword'], time()+60*60*24*100, "/");
        return;
    }
}

function clearsessionscookies()
{
    unset($_SESSION['gdusername']);
    unset($_SESSION['gdpassword']);
    
    session_unset();    
    session_destroy(); 

    setcookie ("gdusername", "",time()-60*60*24*100, "/");
    setcookie ("gdpassword", "",time()-60*60*24*100, "/");
}

function confirmUser($username,$password)
{
    // Connect to the database
	$dbc = connectDB();
	
	// Grab the user-entered log-in data
	$username = mysqli_real_escape_string($dbc, trim($username));
    $password = mysqli_real_escape_string($dbc, trim($password));

	$query = "SELECT * FROM 3tfs WHERE username = '$username' AND password = '$password'";
			
	$data = mysqli_query($dbc, $query);
	// Validate from the database
	if (mysqli_num_rows($data) == 1) {
		return true;
	}
	else {
		return false;
	}    
}

function checkLoggedin()
{
    if(isset($_SESSION['gdusername']) AND isset($_SESSION['gdpassword']))
        return true;
    elseif(isset($_COOKIE['gdusername']) && isset($_COOKIE['gdpassword']))
    {
        if(confirmUser($_COOKIE['gdusername'],$_COOKIE['gdpassword']))
        {
            createsessions($_COOKIE['gdusername'],$_COOKIE['gdpassword']);
            return true;
        }
        else
        {
            clearsessionscookies();
            return false;
        }
    }
    else
        return false;
}

// <====================================>
// <===== functions for 'Sign up' ======>
// <====================================>
function addUser($username, $password, $email, $firstname, $lastname, $dob) {
	// Connect to the database
	$dbc = connectDB();

	// query to check existing username
	//$query = "SELECT * FROM 3tfs WHERE username = '$username'";
	//$data = mysqli_query($dbc, $query);
	
	// if username is not existed, procceed to add that user
	//if (mysqli_num_rows($data) == 0) {
		$query = "INSERT INTO 3tfs (username, password, email, firstname, lastname, dob) VALUES ('$username','$password','$email','$firstname','$lastname','$dob')";
		//$data = mysqli_query($dbc, $query);
		mysqli_query($dbc, $query);

		//echo '<p>Your account has been successfully created. <br /> You are now able to login and start your shopping time.</p>';
		
		// Close connection to DB
		closeDB($dbc);
		exit();
	//	}
	//else {
		
	//	echo '<p>Username is not available. Please use a different one.</p>';
	//}
	

}

/*
	Function to validate whether a username is available
	@return true when Username is unique, false when Username is duplicated
*/
function isUsernameValid($username) {
	// Connect to the database
	$dbc = connectDB();

	// query to check existing username
	$query = "SELECT * FROM 3tfs WHERE username = '$username'";
	$data = mysqli_query($dbc, $query);
	
	if (mysqli_num_rows($data) == 0) {
		//closeDB($dbc);
		return true;
	} else {
		// closeDB($dbc);
		return false;
	} 
}

/*
	Function to find the lastest user ID
	@return $lsatId, id of the lastest user
*/
function findLastID () {
	$lastId = 0;
	$dbc = connectDB();
	
	$query = "SELECT user_id FROM 3tfs";
	$data = msqli_query($dbc, $query);
	
	if (mysqli_fetch_array($data) != 0) {
		$arr = mysqli_fetch_array($data);
		
		foreach ($arr as $id) {
			if ($id > $lastId) {
				$lastId = $id;
			}
		}
		
	}
	
	return $lastId;

}

?> 