<?php
// <=======================================>
// <===== functions for 'Validation' ======>
// <=======================================>

if (isset($_GET['email'])) {
	isValidEmail($_GET['email']);
}

function isValidEmail($email)
{

$myReg="/^[A-Za-z0-9\._-]+@[A-Za-z0-9_-]+\.([A-Za-z0-9_-][A-Za-z0-9_.]+)$/";

	if(preg_match($myReg, $email)){
		if(domain_exists($_GET['email']))
		{
			echo("<img src=\"images/success.gif\">");
		}
		else
		{
				echo("<img src=\"images/failure.gif\">");
		}
	}
	else
	{
			echo("<img src=\"images/failure.gif\">");
	}

}

function domain_exists($email,$record = 'MX')
{
	list($user,$domain) = split('@',$email);
	return checkdnsrr($domain,$record);
}



?> 