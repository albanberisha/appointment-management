

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
$myid=$_SESSION['id'];
if($_SESSION['role_id'] != 1)
{
  header('Location: ../index.php');
  exit;
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
						<img src="../img/logoBit.png"  class="brand_logo2" alt="Logo">
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
              <div class="card-body cd3 cr13">
                                    <h4 class="card-title">Klientët</h4>
                                    <div>
                                    <table border="0" cellspacing="2" cellpadding="2" class="table table-dark tbd" id="lista">
                                            <tr>
                                                <th>
                                                    <font face="Arial">Nr</font>
                                                </th>
                                                <th>
                                                    <font face="Arial">Emri</font>
                                                </th>
                                                <th>
                                                    <font face="Arial">ID e kompjuterit</font>
                                                </th>
                                                <th>
                                                    <font face="Arial">Adresa</font>
                                                </th>
                                            </tr>
                                            <?php

                                            $query = mysqli_query($con, "SELECT * FROM client where userId='$myid' ORDER BY name ASC");
                                            if (!$query) {
                                                die("E pamundur te azhurohen te dhenat: " . mysqli_connect_error());
                                            } else {
                                                $count = 1;
                                                while (($data = mysqli_fetch_array($query))) {
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $count ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($data['name']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($data['computer_id']); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo htmlentities($data['Adresa']); ?>
                                                        </td>
                                                        <td>
                                                            <span class="edit-data">
                                                                <?php
                                                                // $key = "bit";
                                                                // $text = $data['id'];
                                                                //$encrypted = bin2hex(openssl_encrypt($text, 'AES-128-CBC', $key));

                                                                ?>
                                                                <a href="add-comment-toclient.php?id=<?php echo $data['client_id']; ?>&comment=client">
                                                                    <img src="../img/comment-icon.png"> </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                            <?php
                                            $count++;
                                                }
                                            }
                                            ?>
                                        </table>
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
       document.getElementById("MM5").style.color = "white";
      document.getElementById("MM6").style.color = "white";
      </script>
</body>

</html>
<script>
   $("#UserFrom").submit(function(e) {
        e.preventDefault();
    $('#Usernameerror').html("");
    var myform = document.getElementById("UserFrom");
    var fd = new FormData(myform);
    $.ajax({
        url: "includes/add-client.inc.php",
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        method: 'POST'
      })
      .done(function(response) {
        $message = "";
        switch (response.charAt(0)) {
          case "1":
            $message = "Emri duhet te jete 4-20 karaktere, jo _ dhe . ne fillim apo ne fund!.";
            $('#Usernameerror').html($message);
            document.getElementById('Usernameerror').scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
            break;
            case "2":
            $message = "Ku emer identifikues egziston!.";
            $('#Usernameerror').html($message);
            document.getElementById('Usernameerror').scrollIntoView({
              behavior: 'smooth',
              block: 'center'
            });
            break;
          default:
          $('#UserFrom')[0].reset();
            alert(response);
        }
      });
    return false;
  });
</script>