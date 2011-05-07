<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>

<?php 
require_once("functions.php");

if (!isset($_GET['action'])) $action = 'undefined';
else {
	$action = $_GET['action'];
	switch ($action) {
	
		// check username integrity
		case "checkUsername":
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
			//return isUsernameValid($_GET['username']);
		break;
		
		// register user
		case "registerUser";
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
}
?>

<div id="signup">

    <form action="<?php /*echo $_SERVER['PHP_SELF'];*/ ?>" method="POST" name="signupform" id="signup">
        <fieldset>
            <legend>Sign up</legend>
			<div id="signupformflag" style="color: red; font-decoration: bold; height: 2em;"></div>
            <div class="section">
                <ul>
                    <li><label for="username">Username: </label><input type="text" name="username" id="username" onChange="checkUsername()"/>
                    	<div id="usernameflag" style="display:inline;"></div>
                    </li>
                </ul>
            </div>
            <div class="section">
                <ul>
                    <li><label for="password">Password</label><input type="password" name="password" id="password" onChange="checkPassword()"/>
                    	<div id="passwordflag" style="display:inline;"></div>
                    </li>
                    	
                    <li><label for="password_confirm">Confirm Password</label><input type="password" name="password_confirm" id="password_confirm" onChange="checkPasswordMatch()"/>
                    	<div id="password_confirmflag" style="display:inline;"></div>
                    </li>
                </ul>
            </div>
            <div class="section">
                <ul>
                    <li><label for="email">Email</label><input type="text" name="email" id="email" onChange="checkEmail()"/>
                    	<div id="emailflag" style="display:inline;"></div>
                    </li>
                </ul>
            </div>
            <div class="section">
			<span>Additional information: </span>
                <ul>
                    <li><label for="firstname">First Name</label><input type="text" name="firstname" id="firstname" /></li>
                    <li><label for="lastname">Last Name</label><input type="text" name="lastname" id="lastname" /></li>
                    <li><label for="dob">Date of birth</label><input type="date" name="dob" id="dob" /></li>
                </ul>
            </div>
            <input type="submit" value="Register" name="submit" onSubmit="registerUser()"/>

        </fieldset>
    </form>	

</div>
