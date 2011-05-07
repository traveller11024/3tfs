<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/jquery.equalheights.js"></script>
<script type="text/javascript">

</script>

<?php
	
require_once("functions.php");
if (isset($_POST['submit'])) {
	//$user_id = isset($_POST['username']) ? $_POST["username"] : "9999";
	$username = isset($_POST['username']) && !empty($_POST['username']) ? $_POST["username"] : "user";
	$password = isset($_POST['password']) && !empty($_POST['password']) ? $_POST["password"] : "password";
	$email = isset($_POST["email"]) && !empty($_POST['email']) ? $_POST["email"] : "user@3tfs.com";
	$firstname = isset($_POST["firstname"]) && !empty($_POST['firstname']) ? $_POST["firstname"] : "firstname";
	$lastname = isset($_POST["lastname"]) && !empty($_POST['lastname']) ? $_POST["lastname"] : "lastname";
	$dob = isset($_POST["dob"]) && !empty($_POST['dob']) ? $_POST["dob"] : "1900-01-01";

	addUser($username, $password, $email, $firstname, $lastname, $dob);
}
?>


<div id="signup">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="signup" id="signup">
        <fieldset>
            <legend>Sign up</legend>

            <div class="section">
                <ul>
                    <li><label for="username">Username: </label><input type="text" name="username" id="username" /><input type="button" id="button" value="Check availability" onclick=""/></li>
                </ul>
            </div>
            <div class="section">
                <ul>
                    <li><label for="password">Password</label><input type="password" name="password" id="password"/></li>
                    <li><label for="password_confirm">Confirm Password</label><input type="password" name="password_confirm" id="password_confirm" /></li>
                </ul>
            </div>
            <div class="section">
                <ul>
                    <li><label for="email">Email</label><input type="text" name="email" id="email" onBlur="checkEmail();"/><div id="emailflag" style="display:inline;"></div></li>
                    <li><label for="email_confirm">Confirm Email</label><input type="text" name="email_confirm" id="email_confirm" /></li>
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
            <input type="submit" value="Register" name="submit" onclick=""/>

        </fieldset>
    </form>	

</form>
</div>
