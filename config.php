<?php

$server = 'localhost';
$dbase = 'calendarapp';
$user = 'root';
$password = '';
$domain= 'http://client.ambau-de.com/';


define('SERVER',$server);
define('USER',$user);
define('PASSWORD',$password);
define('DBASE',$dbase); 
define('DOMAIN',$domain);

$DATABASE_HOST = SERVER;
$DATABASE_USER = USER;
$DATABASE_PASS = PASSWORD;
$DATABASE_NAME = DBASE;

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>
    
    

