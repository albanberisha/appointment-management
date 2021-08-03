<?php
include('../../config.php');
session_start();
ob_end_clean();
error_reporting(0);
$u_username = $_POST['username'];
    $address = $_POST['address'];
    $u_compId = $_POST['computer_id'];
    if (!preg_match("/^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/", $u_username) || empty($u_username)) {
        echo $error="1";
    }elseif (checkusernameexistence($con, $u_username)) {
        echo $error="2";
    }else{
        saveData($con,$u_username,$address,$u_compId);
    }

    function checkusernameexistence($con, $username)
    {
        $userid=$_SESSION['id'];
         $exists=true;
        if ($stmt = $con->prepare('SELECT userId,name FROM client WHERE name = ? and userId= ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('ss', $username,$userid);
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
    function saveData($con,$u_username,$address,$u_compId)
    {
        $userid=$_SESSION['id'];
        $query = "INSERT INTO client (userId,name,computer_id,Adresa) 
                  VALUES('$userid','$u_username','$u_compId','$address')";
        mysqli_query($con, $query);
        echo "Klienti u ruajt me sukses!";
        // insert another row with different values
// insert another row with different values

    }
?>