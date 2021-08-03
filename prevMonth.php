<?php
session_start();
error_reporting(0);
include('config.php');
$dita=$_POST['dita'];
$muaji=$_POST['muaji'];
$viti=$_POST['viti'];
$myid=$_SESSION['id'];
if(strlen($dita)==1)
{
    $dita="0".$dita;
}if(strlen($muaji)==1)
{
    $muaji="0".$muaji;
}
include 'admin/calendar.php';
$time = strtotime($muaji.'/'.$dita.'/'.$viti);
$today = date('Y-m-d',$time);
$today= date('Y-m-d', strtotime($today. ' - 1 month'));
$calendar = new Calendar($today);
$query = mysqli_query($con, "SELECT id,Shdesc, FullDesc, Date,StartTime,EndTime,NumOfDays,Importance from appointments WHERE UserId='$myid' and status!='2' ORDER BY (CASE WHEN StartTime IS NOT NULL THEN 1 ELSE 2 END),
StartTime ASC");
                    if (!$query) {
                        die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                    } else {
                       while($data = mysqli_fetch_array($query))
                       { $strtTime="";
                        $endTime="";
                           if($data['StartTime']!=NULL)
                           {$strtTime=date('H:i', strtotime($data['StartTime']));
                        }
                        if($data['EndTime']!=NULL)
                        {$endTime=date('H:i', strtotime($data['EndTime']));
                     }
                        $calendar->add_event($data['id'],$data['Shdesc'], $strtTime.'-'. $endTime, $data['Date'], $data['NumOfDays'], $data['Importance']);
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