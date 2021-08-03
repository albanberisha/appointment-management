<?php
session_start();
error_reporting(0);
include('config.php');
//error_reporting($__error_reporting_level);

// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
$myid=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Bit mobile</title>
  <link href="admin/css/style.css" rel="stylesheet" type="text/css">
  <link href="admin/css/calendar.css" rel="stylesheet" type="text/css">
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  
  <link rel="stylesheet" href="assets/css/demo_1/style.css" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/css/main.css">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <?php
        if ($_SESSION['role_id'] === 1) {
          include("includes/admin-sidebar.php");
        }
        ?>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles default primary"></div>
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles light"></div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-chevron-double-left"></span>
          </button>
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
              <div class="brand_logo_container" onclick="window.open('dashboard.php', '_self');">
                <img src="img/logoBit.png" class="brand_logo2" alt="Logo">
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-logout d-none d-md-block">
              <a class="nav-link" href="logout.php">
                <button class="btn btn-sm btn-danger">Shkyqu</button>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Mirë se vjen, <?php echo $_SESSION['name']; ?></h4>
              <div id="CalendarFull">
              <?php

if (($_SESSION['role_id'] === 1)) {
  include('admin/admin-dashboard.php');
}
?>
              </div>
            </div>
          </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</body>

</html>

<script>
  function showPopup(id) {
    myid = <?php echo $myid ?>;
    $.ajax({
        method: "POST",
        url: "includes/viewEvent.inc.php",
        data: {
          myid: myid,
          eventid: id,
        }
      })
      .done(function(response) {
        $("#EventInfo").html(response);
        $('.hover_bkgr_fricc1').show();
      });
    return false;
   
  }

  function showAddEvent(day,month,year) {
    
    myid = <?php echo $myid ?>;
    $.ajax({
        method: "POST",
        url: "includes/addNewEvent.inc.php",
        data: {
          myid: myid,
          year: year,
          month:month,
          day: day
        }
      })
      .done(function(response) {
        $("#AddNewEvent").html(response);
        $('.hover_bkgr_fricc2').show();
      });
    return false;

  }
  
  function backDay(day,month,year) {
    myid = <?php echo $myid ?>;
    dita=day;
    muaji=month;
    viti=year;
    if((day.length)==1)
    {
      dita="0"+day;
    }

    $.ajax({
        method: "POST",
        url: "prevMonth.php",
        data: {
          myid: myid,
          dita: day,
          muaji: month,
          viti:year,
        }
      })
      .done(function(response) {
        $("#CalendarFull").html(response);
      });
    return false;
   
  }

  function forwardDay(day,month,year) {
    myid = <?php echo $myid ?>;
    dita=day;
    muaji=month;
    viti=year;
    if((day.length)==1)
    {
      dita="0"+day;
    }

    $.ajax({
        method: "POST",
        url: "forwMonth.php",
        data: {
          myid: myid,
          dita: day,
          muaji: month,
          viti:year,
        }
      })
      .done(function(response) {
        $("#CalendarFull").html(response);
      });
    return false;
   
  }
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