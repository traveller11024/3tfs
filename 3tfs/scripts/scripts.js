/*
Authors: Tran Trung Tin, Lu Nguyen Phuc Thinh, Le Chi Thien
Date: 22 April 2011
Semester: 2-2011
*/

// =============================================
// script to validate data
// =============================================
function getHTTPObject(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
	else if (window.XMLHttpRequest) 
		return new XMLHttpRequest();
	else {
		alert("Your browser does not support AJAX.");
		return null;
	}
}


// =========================================================================

function checkUsername(){
    if (document.getElementById('username').value.length == 0) {
		alert("username not checked...");
		document.getElementById('usernameflag').innerHTML = '';
    }
    else if (document.getElementById('username').value.length < 4 || document.getElementById('username').value.length > 30) { 
    	
		document.getElementById('usernameflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
    } else {
		if (isAlphaNumeric(document.getElementById('username').value) == true) {
			alert("username is alphanumeric...");
		    httpObject = getHTTPObject();
		    if (httpObject != null) {
		    	
				httpObject.open("GET", "register.php?action=checkUsername&username=" + document.getElementById('username').value, false);
				httpObject.send(null);
				httpObject.onreadystatechange = setOutput;
				
		    } //else
		   
		} else {
           
		    document.getElementById('usernameflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
		}
    }
}

function setOutput() {
    if(httpObject.readyState == 4) {
		if (httpObject.responseText == '1') {
			alert("username checked, valid");
			document.getElementById('usernameflag').innerHTML = '<img src="images/success.gif" alt="Valid" />';
		} else {
			alert("username checked, invalid");
		    document.getElementById('usernameflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
		}
	
    }
}

function checkPassword() {
	//alert("checking password...");
    if (document.getElementById('password').value.length == 0) {
		document.getElementById('passwordflag').innerHTML = '';
    }
    else if (document.getElementById('password').value.length < 6) {
		document.getElementById('passwordflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
    } else {
		document.getElementById('passwordflag').innerHTML = '<img src="images/success.gif" alt="Valid" />';
    }
}

function checkPasswordMatch() {
	///alert("checking confirm password...");
    if (document.getElementById('password').value.length == 0) {
		document.getElementById('password_confirmflag').innerHTML = '';
    }
    else if (document.getElementById('password_confirm').value == document.getElementById('password').value) {
		document.getElementById('password_confirmflag').innerHTML = '<img src="images/success.gif" alt="Valid" />';
    } else {
		document.getElementById('password_confirmflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
    }
}

function checkEmail() {
	//alert("checking email ...");
    if (document.getElementById('email').value.length == 0) {
		document.getElementById('emailflag').innerHTML = '';
    }
    else if (isEmailAddress(document.getElementById('email').value) == true) {
		document.getElementById('emailflag').innerHTML = '<img src="images/success.gif" alt="Valid" />';
    } else {
		document.getElementById('emailflag').innerHTML = '<img src="images/failure.gif" alt="Invalid" />';
    }
}

function registerUser() {
	alert("registering ...");
    httpObject = getHTTPObject();
    if (httpObject != null) {
		httpObject.open("GET", "register.php?action=registerUser" + 
								"&username=" + document.getElementById('username').value + 
								"&password=" + document.getElementById('password').value + 
								"&email=" + document.getElementById('email').value +
								"&firstname=" + document.getElementById('firstname').value + 
								"&lastname=" + document.getElementById('lastname').value +
								"&dob=" + document.getElementById('dob').value
								, true);
		httpObject.send(null);
		httpObject.onreadystatechange = handleRegistration;
    }
}

function handleRegistration() {
	alert("handling registeration ...");
    if(httpObject.readyState == 4) {
		if (httpObject.responseText == '1') {
		    window.location = "register.php?action=confirmRegisteration";
		} else if (httpObject.responseText == '0') {
		    document.getElementById('signupformflag').innerHTML = 'Registration failed.';
		} else {
		    document.getElementById('signupformflag').innerHTML = 'Server error.';
		}
    }
}

function isAlphaNumeric(val) {
    if (val.match(/^[a-zA-Z0-9]+$/)) {
		return true;
    } else {
		return false;
    }
}

function isEmailAddress(val) {
    if (val.match(/^[A-Za-z0-9\._-]+@[A-Za-z0-9_-]+\.([A-Za-z0-9_-][A-Za-z0-9_.]+)$/)) {
		return true;
    } else {
		return false;
    }
}