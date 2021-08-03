<?php 
include('../../config.php');
session_start();
ob_end_clean();
error_reporting(0);
  $clientid = $_POST['clientid'];
  $myid = $_SESSION['id'];
$comment = $_POST['comment'];
if(empty($comment))
{
    echo $error='2';
}else{
    savedata($con,$myid,$clientid,$comment);
}
function savedata($con,$myid,$clientid,$comment)
{
    $now = date("Y-m-d H:i:s");
    $query = "INSERT INTO  comment (client_id,user_id,description,dateTime) 
    VALUES('$clientid','$myid','$comment','$now')";
mysqli_query($con, $query);
showComments($con,$clientid);

}

function showComments($con,$clientid)
{
  $myid=$_SESSION['id'];
    ?>
                        <div class="be-comment-block" id="Comments">
                    <?php
                    $query = mysqli_query($con, "SELECT COUNT(*) as c from comment where client_id='$clientid' order by dateTime ASC");
                    if (!$query) {
                        die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                    } else {
                        $count = 1;
                        $data = mysqli_fetch_array($query);
                        if($data>0)
                        {
                          ?>
                          <h1 class="comments-title">Komentet (<?php echo htmlentities($data['c']) ?>)</h1>
                          <?php
                        } 
                      }
                    ?>
                      <?php
                    $query = mysqli_query($con, "SELECT * from comment where client_id='$clientid' and user_id='$myid'");
                    if (!$query) {
                        die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                    } else {
                        $count = 1;
                       while($data = mysqli_fetch_array($query))
                        {
                          ?>
                          <div class="be-comment">
                        <div class="be-comment-content">
                          <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                           <?php echo htmlentities($data['dateTime']) ?>
                          </span>

                          <p class="be-comment-text">
                          <?php echo htmlentities($data['description']) ?>
                          </p>
                        </div>
                      </div>
                          <?php
                        } 
                      }
                    ?>
                    </div>
    <?php
}

?>