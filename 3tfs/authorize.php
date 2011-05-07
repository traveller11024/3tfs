<?php

// User name and password for authentication
$username = 's3221686';
$password = 'Luan@1111';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
// The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Guitar Wars"');
    exit('<h2>3T Flower shop</h2>Sorry, you must enter a valid user name and password for <span style="color: red;">admin</span> to access this page.');
}
?>