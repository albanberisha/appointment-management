<?php
include('../../includes/config.php');
session_start();
ob_end_clean();
error_reporting(0);
$u_username = $_POST['username'];
    $u_psw = $_POST['password_1'];
    $u_confpsw = $_POST['password_2'];
    if (!preg_match("/^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $u_username) || empty($u_username)) {
        echo $error="1";
    }elseif (checkusernameexistence($con, $u_username)) {
        echo $error="2";
    }elseif (!preg_match("/^(?=.*?[a-z])(?=.*?[0-9]).{4,}$/", $u_psw) || empty($u_psw)) {
        echo $error="3";
    }elseif (strcmp($u_psw, $u_confpsw) == 0) {
      saveData($con,$u_username,$u_confpsw);
    } else {
        echo $error="4";
    }

    function checkusernameexistence($con, $username)
    {
         $exists=true;
        if ($stmt = $con->prepare('SELECT user_id,username, password FROM users WHERE username = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $username);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $exists=true;
            } else {
        
                $exists=false;
            }
        } else {
        }
        $stmt->close();
        return $exists;
    }
    function saveData($con,$u_username,$u_confpsw)
    {
        $role="2";
        $hashed_password = password_hash($u_confpsw, PASSWORD_DEFAULT); 
        $query = "INSERT INTO users (username,password,role_id) 
                  VALUES('$u_username','$hashed_password','$role')";
        mysqli_query($con, $query);
        echo "Klienti u ruajt me sukses!";
        // insert another row with different values
// insert another row with different values

    }
?>

