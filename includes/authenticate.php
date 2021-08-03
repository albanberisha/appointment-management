
<?php
session_start();
// Change this to your connection info.
include ('../config.php');
ob_end_clean();
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password,RoleId FROM users WHERE username = ? and RoleId=1')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$date = date("Y-m-d H:i:s");
	$stmt->bind_result($id, $password,$role_id);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		$_SESSION['role_id'] = $role_id;
        $uip=$_SERVER['REMOTE_ADDR']; // get the user ip
		$extra = "../dashboard.php"; //
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        userlog($con,$_SESSION['id'],$_SESSION['name'],$uip,$date);
                echo "http://".$host.$uri."/".$extra."?login=success";
	} else {

		echo $error="2";
	}
} else {
	echo $error="1";


}


	$stmt->close();
}

function _date($format="r", $timestamp=false, $timezone=false)
{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
}

function userlog($con,$userid,$username,$userip,$time)
{
	
        $stmt1 = $con->prepare('insert into `userlog`(`userId`, `username`, `userIp`, `loginTime`) values(?,?,?,?)');
    	$stmt1->bind_param('isss',$userid,$username,$userip,$time);
    	$stmt1->execute();
}
?>