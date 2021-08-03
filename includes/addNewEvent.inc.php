<?php
$myid = $_POST['myid'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
if (strlen($month) == 1) {
    $month = "0" . $month;
}
if (strlen($day) == 1) {
    $day = "0" . $day;
}
?>
<div class="headerPopup">
    <span class="textHeader">Termin i ri</span>
</div>
<div class="formPopup">
    <div class="container-contact100">
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" id="AddEvent" method="post">
            
                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                    <span class="label-input100 ">Përshkrimi *</span>
                    <input class="input100" type="text" name="ShortDescription" placeholder="Shtypni përshkrimin">
                    <span class="label-input100 l34" id="ShDescError" style="color: red;"></span>
                </div>
                
                <div class="wrap-input100 validate-input bg1">
                    <span class="label-input100">Data *</span>
                    <input class="input100" type="date" name="Date" value="<?php echo $year . "-" . $month . "-" . $day ?>">
                    <span class="label-input100 l34" id="DateError" style="color: red;"></span>
                </div>
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100">Ora e fillimit</span>
                    <input class="input100" type="time" name="StartTime">
                    <span class="label-input100 l34"  id="StartTimeError" style="color: red;"></span>
                </div>
               
                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
                    <span class="label-input100">Ora e mbarimit</span>
                    <input class="input100" type="time" name="EndTime">
                    <span class="label-input100 l34" id="EndTimeError" style="color: red;"></span>
                </div>
                <div class="wrap-input100 bg1">
                    <span class="label-input100">Kohezgjatja sipas diteve</span>
                    <input class="input100" type="number" name="Days" placeholder="Shtyp numrin e diteve" value="1">
                    <span class="label-input100 l34" id="DaysError" style="color: red;"></span>
                </div>

                <div class="form-group">

                    <div class="wrap-input100 bg1">
                        <span class="label-input100" style="    width: 100%;
    padding-bottom: 10px;">Tipi</span>
                        <div class="input-title-btn" style="display: inline-flex;">
                            <div class="" style="    padding-right: 10px;">
                                <input class="" type="radio" name="cond" value="red">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <a href="#" type="button" class="btn btn-secondary" style=" background: #ce5151; color:#ce5151; border:1px solid rgb(255, 142, 142); color: #ce5151" data-toggle="tooltip" data-placement="bottom">.</a>
                                </label>
                            </div>
                            <div class="" style="    padding-right: 10px;">
                                <input class="" type="radio" name="cond" value="blue">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <a href="#" type="button" class="btn btn-secondary" style="background: #518fce; border:1px solid rgb(199, 199, 105); color: #518fce" data-toggle="tooltip" data-placement="bottom">.</a>
                                </label>
                            </div>
                            <div class="" style="    padding-right: 10px;">
                                <input class="" type="radio" name="cond" value="green">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <a href="#" type="button" class="btn btn-secondary" style="background: #51ce57; border:1px solid rgb(128, 253, 128); color: #51ce57" data-toggle="tooltip" data-placement="bottom">.</a>
                                </label>
                            </div>
                        </div>
                        <span id="Conditionerror" style="color: red;"></span>
                    </div>
                </div>
                <span class="label-input100 l34" id="CommentError" style="color: red;"></span>
                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
                    <span class="label-input100">Komenti</span>
                    <textarea class="input100" name="Comment" placeholder="Shenoni komentin ..."></textarea>
                </div>
                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" type="submit">
                        <span>
                            Perfundo
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $("#AddEvent").submit(function(e) {
       e.preventDefault();
        $('#ShDescError').html("");
        $('#DateError---').html("");
        $('#StartTimeError---').html("");
        $('#EndTimeError----').html("");
        $('#DaysError---').html("");
        $('#CommentError').html("");
        var myform = document.getElementById("AddEvent");
        var fd = new FormData(myform);
        $.ajax({
                url: "includes/add-event.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                error=response.substring(0,2);
                switch (error) {
                    case "1":
                        $message = "Përshkrimi nuk mund te jete i zbrazet!";
                        $('#ShDescError').html($message);
                        document.getElementById('ShDescError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "2":
                        $message = "Përshkrimi nuk mund te permbaje me shume se 30 karaktere!";
                        $('#ShDescError').html($message);
                        document.getElementById('ShDescError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "3":
                        $message = "Data nuk mund te jete e zbrazet!";
                        $('#DateError').html($message);
                        document.getElementById('DateError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "4":
                        $message = "Ora nuk mund te jete e zbrazet!";
                        $('#StartTimeError').html($message);
                        document.getElementById('StartTimeError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "5":
                        $message = "Ora nuk mund te jete e zbrazet!";
                        $('#EndTimeError').html($message);
                        document.getElementById('EndTimeError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "6":
                        $message = "Ora e mbarimit me e vogel se ora e fillimit!";
                        $('#EndTimeError').html($message);
                        document.getElementById('EndTimeError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                        case "7":
                        $message = "Numri i diteve nuk mund te jete me i vogel se 1!";
                        $('#DaysError').html($message);
                        document.getElementById('DaysError').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        break;
                    default:
                       alert("Te dhenat u ruajten me sukses");
                       $("#CalendarFull").html(response);

                }
            });
        return false;
    });
</script>