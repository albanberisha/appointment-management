<?php
include('../config.php');
ob_end_clean();
session_start();
$myid=$_SESSION['id'];
$today=date(" Y-m-d H:i:sa ");//
$shortD = $_POST['ShortDescription'];//
$date= $_POST['Date'];
$strtTime= $_POST['StartTime'];
$endTime= $_POST['EndTime'];
$numDays= $_POST['Days'];
$comment= $_POST['Comment'];
$type=NULL;
if(!isset( $_POST['cond']))
{
}else{
    $type=$_POST['cond'];
}

if(empty($shortD))
{
    echo "1";
}elseif(strlen($shortD)>30)
{
    echo "2";
}elseif(empty($date))
{
    echo "3";
}elseif(!empty($strtTime))
{
    if(empty($endTime))
    {
        echo "5";
    }elseif($endTime<$strtTime)
    {
        echo "6";
    }elseif($numDays<1)
    {
        echo "7";
    }else{
        saveData($con,$myid,$shortD,$comment,$date,$strtTime,$endTime,$numDays,$type);
    }
}elseif($numDays<1)
{
    echo "7";
}else{
    saveData($con,$myid,$shortD,$comment,$date,$strtTime,$endTime,$numDays,$type);
}


function saveData($con,$myid,$shortD,$comment,$date,$strtTime,$endTime,$numDays,$type)
{
    $status=1;
    $query3="INSERT INTO appointments(UserId,Shdesc,FullDesc,Date,StartTime,EndTime,NumOfDays,Importance,status)
    VALUES('$myid','$shortD','$comment','$date','$strtTime','$endTime','$numDays','$type','$status')";
    if(empty($strtTime))
    {
        $query3 ="INSERT INTO appointments(UserId,Shdesc,FullDesc,Date,NumOfDays,Importance,status) 
    VALUES('$myid','$shortD','$comment','$date','$numDays','$type','$status')";
    }
    $query4=mysqli_query($con,$query3);
    if (!$query4) {
        die(mysqli_error($con).$query4);
         }else{
            include '../admin/calendar.php';
            $myid=$_SESSION['id'];
            $calendar = new Calendar($date);
            $query = mysqli_query($con, "SELECT id,Shdesc, FullDesc, Date,StartTime,EndTime,NumOfDays,Importance from appointments where UserId='$myid' and status!='2' ORDER BY (CASE WHEN StartTime IS NOT NULL THEN 1 ELSE 2 END),
            StartTime ASC");
            if (!$query) {
                die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
            } else {
                while ($data = mysqli_fetch_array($query)) {
                    $strtTime = "";
                    $endTime = "";
                    if ($data['StartTime'] != NULL) {
                        $strtTime = date('H:i', strtotime($data['StartTime']));
                    }
                    if ($data['EndTime'] != NULL) {
                        $endTime = date('H:i', strtotime($data['EndTime']));
                    }
                    $calendar->add_event($data['id'], $data['Shdesc'], $strtTime . '-' . $endTime, $data['Date'], $data['NumOfDays'], $data['Importance']);
                }
            }
            ?>
            <nav class="navtop">
            </nav>
            <div class="content home">
                <?= $calendar ?>
            </div>
            <div class="hover_bkgr_fricc1">
                <span class="helper1"></span>
                <div>
                    <div class="popupCloseButton1">&times;</div>
                    <div id="EventInfo">
                    </div>
                </div>
            </div>
            <div class="hover_bkgr_fricc2">
                <span class="helper2"></span>
                <div>
                    <div class="popupCloseButton2">&times;</div>
                    <div id="AddNewEvent">
                    </div>
                </div>
            </div>
            <div class="hover_bkgr_fricc3">
                <span class="helper3"></span>
                <div>
                    <div class="popupCloseButton3">&times;</div>
                    <div id="UpdateEvent">
                    </div>
                </div>
            </div>
            <script>
                  $('.hover_bkgr_fricc1').click(function() {
    $('.hover_bkgr_fricc1').hide();
  });
  $('.popupCloseButton1').click(function() {
    $('.hover_bkgr_fricc1').hide();
  });
  $('.popupCloseButton2').click(function() {
    $('.hover_bkgr_fricc2').hide();
  });
            </script>
            <?php
         }
}
?>