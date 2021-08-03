<?php
session_start();
error_reporting(0);
include('config.php');
include 'Calendar.php';
$myid=$_SESSION['id'];
$today = date("Y-m-d");
$today = date('Y-m-d', strtotime($today . ' + 1 days'));
$calendar = new Calendar($today);
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