<?php
session_start();
error_reporting(0);
include('../config.php');
//error_reporting($__error_reporting_level);

// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: ../index.php');
  exit;
}
$myid = $_SESSION['id'];
if($_SESSION['role_id'] != 1)
{
  header('Location: ../index.php');
  exit;
}
$clientid = null;
$clientname = null;
if (isset($_GET['comment'])) {
  $clientid = $_GET['id'];
}
$query = mysqli_query($con, "Select * from client where client_id='$clientid'");
if (!$query) {
  die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
} else {
  $data2 = mysqli_fetch_array($query);
  if ($data2 > 0) {
    $clientname = $data2['name'];
  } else {
    echo "Hyrje e pa autorizuar";
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Bit mobile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/jquery-bar-rating/css-stars.css" />
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/demo_1/style.css" />
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          <li class="nav-item">
    <a class="nav-link" href="../dashboard.php">
        <i class="mdi mdi-account-circle menu-icon"></i>
        <span class="menu-title">Paneli Kryesor</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="add-client.php" >
        <i class="mdi mdi-account-circle menu-icon" id="MM3"></i>
        <span class="menu-title" id="MM4">Shto klient</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="clientlist.php">
        <i class="mdi mdi-account-circle menu-icon"></i>
        <span class="menu-title">Lista e klienteve</span>
    </a>
</li>
          </ul>
        </nav>
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
              <div class="brand_logo_container" onclick="window.open('../dashboard.php', '_self');">
                <img src="../img/logoBit.png" class="brand_logo2" alt="Logo">
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-logout d-none d-md-block">
              <a class="nav-link" href="../logout.php">
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
        <div class="content-wrapper cr1">
          <div class="page-header">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body cd3">
                  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                  <div class="container">
                    <h4 class="card-title">Klienti: <?php echo $clientname ?></h4>
                    <span id="Error" style="color: green;"></span>
                    <form method="POST" id="CommentsForm" enctype="multipart/form-data">
                    <span id="Commenteerror" style="color: red;font-size:0.8em"></span>
                      <div class="form-group">
                        <textarea class="form-input" id="TextaRt" name="comment" placeholder="Komenti ..."></textarea>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="update_client" value="update" class="btn btn-primary mr-2" style="font-size: 1.03em;">Komento </button>
                      </div>
                    </form>
                    <div class="be-comment-block" id="Comments">
                    <?php
                    $query = mysqli_query($con, "SELECT COUNT(*) as c from comment where client_id='$clientid'");
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
                    $query = mysqli_query($con, "SELECT * from comment where client_id='$clientid' and user_id='$myid' ");
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
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->

        <!-- partial -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    </script>
</body>

</html>
<script>
    $("#CommentsForm").submit(function(e) {
        e.preventDefault();
        $('#Commenteerror').html("");
        $("#Notes").html("");
        $("#Error").html("");
        clientid=<?php echo $clientid ?>;
        var myform = document.getElementById("CommentsForm");
        var fd = new FormData(myform);
        fd.append("clientid", clientid);
        $.ajax({
                url: "includes/add-comment.inc.php",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST'
            })
            .done(function(response) {
                $message = "";
                
        switch (response.charAt(0)) {
            case "2":
            $message = "Komenti nuk mund te jete i zbrazet!.";
            $('#Commenteerror').html($message);
            document.getElementById('Commenteerror').scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
            break;
          default:
          $('#CommentsForm')[0].reset();
          $("#Comments").html(response);
          $("#Error").html("Shënimi u perfundua me sukses");
        }
                       
            });
        return false;
    });
</script>