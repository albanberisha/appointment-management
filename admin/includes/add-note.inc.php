<?php 
include('../../includes/config.php');
session_start();
ob_end_clean();
error_reporting(0);
$date = $_POST['date'];
$comment = $_POST['comment'];
$myid=$_SESSION['id'];
if(empty($date))
{
    echo $error='1';
}elseif(empty($comment))
{
    echo $error='2';
}else{
    savedata($con,$date,$comment,$myid);
}
function savedata($con,$date,$comment,$myid)
{
    $query = "INSERT INTO  user_notes (user_id,note,date) 
    VALUES('$myid','$comment','$date')";
mysqli_query($con, $query);
reloadNotes($con,$myid);
}
function useralreadyconnected($con,$clientid,$accid)
{
    $exists=true;
    $query=mysqli_query($con,"Select * from userclient where user_id='$accid' and client_id='$clientid'");
                  if (!$query) {
                    die(mysqli_error($con) . $query);
                  } else {
                    $data = mysqli_fetch_array($query);
                    if ($data > 0) {
                        $exists=true;
                    }else{
                        $exists=false;
                    }
                }
    return $exists;
}
function reloadNotes($con,$myid)
{
?>
                                                <?php
                                                $today = date("Y-m-d");
                                                $query = mysqli_query($con, "SELECT id,user_id,note,date from user_notes where user_id='$myid' and date=CURDATE()");
                                                if (!$query) {
                                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                                } else {
                                                    $count = 1;

                                                    while (($data = mysqli_fetch_array($query))) {
                                                ?>
                                                        <li>
                                                            <div class="rotate-1 today-bg">
                                                                <h4><?php echo htmlentities($data['date']) ?></h4>
                                                                <p><?php echo htmlentities($data['note']) ?></p>
                                                                <a href="javascript:deleteNote('<?php echo $data['id']; ?>')" class="text-danger pull-right"><i class="fa fa-trash-o "></i></a>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                $today = date("Y-m-d");
                                                $query = mysqli_query($con, "SELECT id,user_id,note,date from user_notes where user_id='$myid' and date>CURDATE() order by date ASC");
                                                if (!$query) {
                                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                                } else {
                                                    $count = 1;

                                                    while (($data = mysqli_fetch_array($query))) {
                                                ?>
                                                        <li>
                                                            <div class="rotate-1 tomorrow-bg">
                                                                <h4><?php echo htmlentities($data['date']) ?></h4>
                                                                <p><?php echo htmlentities($data['note']) ?></p>
                                                                <a href="javascript:deleteNote('<?php echo $data['id']; ?>')" class="text-danger pull-right"><i class="fa fa-trash-o "></i></a>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                $today = date("Y-m-d");
                                                $query = mysqli_query($con, "SELECT id,user_id,note,date from user_notes where user_id='$myid' and date<CURDATE() order by date desc");
                                                if (!$query) {
                                                    die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                                } else {
                                                    $count = 1;

                                                    while (($data = mysqli_fetch_array($query))) {
                                                ?>
                                                        <li>
                                                            <div class="rotate-1 past-bg">
                                                                <h4><?php echo htmlentities($data['date']) ?></h4>
                                                                <p><?php echo htmlentities($data['note']) ?></p>
                                                                <a href="javascript:deleteNote('<?php echo $data['id']; ?>')" class="text-danger pull-right"><i class="fa fa-trash-o "></i></a>
                                                            </div>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
<?php
}
?>