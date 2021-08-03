<?php
include('../config.php');
ob_end_clean();
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
  }
$myid = $_SESSION['id'];
$eventid = $_POST['eventid'];
$query=mysqli_query($con,"SELECT id,Shdesc,FullDesc,Date,StartTime,EndTime,NumOfDays,Importance from appointments where UserId='$myid' and id='$eventid' and status!='2'");
if(!$query)
{
    mysqli_error($con).$query;
}else{
    $data=mysqli_fetch_array($query);
    if($data>0)
    {
        $color=$data['Importance'];
        if(empty($color))
        {
            $color='deffault';
        }
        ?>
        <div class="headerPopup">
               <span class="textHeader">Detajet e ngjarjes</span>
           </div>
           <div class="formPopup">
               <div class="container-contact100">
                   <div class="wrap-contact100">
                       <form class="contact100-form validate-form">
                           <div class="wrap-input100 validate-input bg1 bt3 <?php echo $color ?>" data-validate="Please Type Your Name">
                              <div>
                              <p class="headingT5">
                                  <?php echo htmlentities($data['Shdesc']) ?>
                              </p>
                              </div>
                           </div>
                           <div class="headingTime">
                               <div>
                               <h6 class="ht45">
                               <?php echo htmlentities($data['Date']) ?>
                               </h6>
                               </div>
                               <div>
                               <h6>
                               <?php
                               $startTime=$data['StartTime'];
                               if(!empty($startTime))
                               {
                                echo " nga ".$startTime." deri ne ".$data['EndTime'];
                               }
                               
                               ?>    
                               </h6>
                               </div>
                           </div>
                           <div class="wrap-input100 validate-input bg1 bt3" data-validate="Please Type Your Name">
                              <div>
                              <p class="headingT6">
                                <?php echo htmlentities($data['FullDesc']) ?>
                              </p>
                              </div>
                           </div>
       
                           <div class="form-group">
                           </div>
       
       
       
                           <div class="container-contact100-form-btn">
                               <button class="contact100-form-btn2" id="DeleteButton">
                               <span class="buttontt">
                                   Fshij
                                   <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                               </span>
                           </button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       <?php
    }else{
        echo "Nuk ka te dhena";
    }

}
?>
<script>
  $("#DeleteButton").click(function(e) {
    $confirm = confirm('A jeni te sigurte qe deshironi ta fshini?');
    eventid=<?php echo $eventid; ?>;
      table='deleteAppointment';
        if($confirm)
        {
            $.ajax({
        method: "POST",
        url: "includes/delete.inc.php",
        data: {
            eventid: eventid,
            table: table,
        }
      })
      .done(function(response) {
                alert("Fshierja u krye me sukses");
                       $("#CalendarFull").html(response);
                        //alert("Fshierja u krye me sukses");
                        //window.location.href = response;
            });
    return false;
        }
  });
</script>
   