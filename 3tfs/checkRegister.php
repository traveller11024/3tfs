<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>

<?php 
require_once("functions.php");

switch ($action) {
	// check username integrity
	case "checkUsername":
		return isUsernameValid($_GET['username']);
	break;
	
	// register user
	case "registerUser";
	// if (isset($_GET['submit'])) {
		// $user_id = isset($_GET['username']) ? $_GET["username"] : "9999";
		$username = isset($_GET['username']) && !empty($_GET['username']) ? $_GET["username"] : "user";
		$password = isset($_GET['password']) && !empty($_GET['password']) ? $_GET["password"] : "password";
		$email = isset($_GET["email"]) && !empty($_GET['email']) ? $_GET["email"] : "user@3tfs.com";
		$firstname = isset($_GET["firstname"]) && !empty($_GET['firstname']) ? $_GET["firstname"] : "unknownfirstname";
		$lastname = isset($_GET["lastname"]) && !empty($_GET['lastname']) ? $_GET["lastname"] : "unknownlastname";
		$dob = isset($_GET["dob"]) && !empty($_GET['dob']) ? $_GET["dob"] : "1900-01-01";
	
		addUser($username, $password, $email, $firstname, $lastname, $dob);
	// }
	break;
	
	// display registeration confirmation on completion
	case "confirmRegisteration":
		$html =  "<div><h1>Your account has been successfully created. <br /> You are now able to login and start yourshopping time.</h1></div>";
		return $html;
	break;
}
?>