<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web-based School Canteen Reservation Management System</title>
    <!---FAVICON ICON FOR WEBSITE--->
    <link rel="shortcut icon" type="image/png" href="../assets/images/ctu-logo copy.jpg">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <script src="../assets/plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
      /*body {
        font-family: 'Roboto', sans-serif;
      }*/
      .modal-content{
        -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
        -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
        -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
        box-shadow: 0 5px 15px rgba(0,0,0,0);
      }
      /*.nav-link {
        padding-top: 5px;
        padding-bottom: 5px;
      }

      .nav-treeview > .nav-item > .nav-link {
        padding-left: 20px;
      }

      .nav-treeview > .nav-item > .nav-link p {
        margin-bottom: 0;
      }*/
      .form-control:not([type="email"]):not([type="password"]) {
        text-transform: capitalize;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
    <div class="wrapper">

      

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- <nav class="main-header navbar navbar-expand navbar-dark"> -->
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="dashboard.php" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="contact-us.php" class="nav-link">Contact</a>
          </li> -->
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- <li class="mt-1">
            <a class="mt-3">Today is <?php //echo date("l"); ?> | <?php// echo date("F d, Y"); ?></a>
          </li> -->
          <!-- Messages Dropdown Menu -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa-solid fa-user"></i><?php //echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?><i class="fa-solid fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="profile.php" class="dropdown-item">
                <div class="media">
                  <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" class="mr-3 img-circle" height="50" width="50">
                  <div class="media-body">
                    <h3 class="dropdown-item-title"><?php //echo ' '.$row['firstname'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></h3>
                    <p class="text-sm text-muted"><?php //echo $row['user_type']; ?></p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a type="button" href="profile.php" class="dropdown-item">&nbsp;<i class="fa-solid fa-gear"></i>&nbsp;&nbsp; Profile settings</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="d-flex justify-content-start dropdown-item dropdown-footer" onclick="logout()">&nbsp;<i class="fa-solid fa-power-off"></i>&nbsp;&nbsp; Logout</a>
            </div>
          </li> -->
          <!-- Navbar Search -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->
          <!-- Messages Dropdown Menu -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <div class="media">
                  <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li> -->
          <!-- Notifications Dropdown Menu -->
         <!--  <?php
           // $announcementManager = new Announcement();
           // $announcementData = $announcementManager->count_announcement();
           // $announcements = $announcementData['announcements'];
           // $count = $announcementData['count'];
           //  // LIMIT NUMBER OF CHARACTERS
           //  function custom_echo($x, $length) {
           //    if(strlen($x)<=$length) {
           //      echo $x;
           //    } else {
           //      $y=substr($x,0,$length) . '...';
           //      echo $y;
           //    }
           //  }
          ?> -->
         <!--  <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"><?php //echo $count; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">
                <?php
                //$message = ($count < 1) ? 'No announcement for today' : ($count == 1 ? $count . ' announcement notification' : $count . ' announcement //notifications');
                //echo $message;
                ?>
              </span>
              <div class="dropdown-divider"></div>
              
              <?php
                //if($count >= 1) {
                //foreach ($announcements as $announcement) {
              ?>
              <a href="#" class="dropdown-item">
                <i class="fa-solid fa-circle-info mr-2"></i> <?php //echo custom_echo($announcement['actName'], 15); ?>
                <span class="float-right text-muted text-sm"><?php //echo $announcement['actDate']; ?></span>
              </a>
              <div class="dropdown-divider"></div>
              <?php
                //}
                //}
              ?>
              <?php //if($count == 1) : ?>
              <a type="button" data-toggle="modal" data-target="#reminder" class="dropdown-item dropdown-footer">See Announcement</a>
              <?php //else: ?>
              <a type="button" data-toggle="modal" data-target="#reminder" class="dropdown-item dropdown-footer">See All Announcement</a>
              <?php //endif; ?>
            </div>
          </li> -->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" class="mr-3 img-circle" height="50" width="50"> -->
              <img src="../assets/images-users/<?php echo $row['image']; ?>" class="user-image img-circle elevation-2" alt="User Image">
              <span class="d-none d-md-inline"><?= $row['firstname'].' '.$row['lastname'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="../assets/images-users/<?php echo $row['image']; ?>" class="img-circle elevation-2" alt="User Image">
                <p>
                  <?= $row['firstname'].' '.$row['lastname'] ?>
                  <small><?php echo $row['user_type']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-12 text-center">
                    <small>Member since <?php echo date("F d, Y", strtotime($row['date_registered'])); ?></small>
                  </div>
                  <!-- <div class="col-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Friends</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                <a href="#" class="btn btn-default btn-flat float-right" onclick="logout()">Sign out</a>
              </li>
            </ul>
          </li>
          <!-- FULL SCREEN -->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <!-- END FULL SCREEN -->
          
        </ul>
      </nav>
 

<script>

  function logout() {
    swal({
      title: 'Are you sure you want to logout?',
      text: "You won't be able to revert this!",
      icon: "warning",
      buttons: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        // Make an AJAX request to the PHP file
        $.ajax({
          url: '../includes/ajax_autoLogout.php',
          type: 'POST',
          data: { 
            id: '<?php echo $id; ?>', 
            login_time: '<?php echo $login_time; ?>',
          },
          success: function(response) {
            // Handle the response if needed
            // swal("Logged out successfully!", {
            //   icon: "success",
            // }).then(() => {
              // Redirect to another page
              window.location = "../logout.php";
            // });
          },
          error: function(xhr, status, error) {
            // Handle the error if needed
            swal("Error occurred while logging out!", {
              icon: "error",
            });
          }
        });
      } else {
        // Handle the cancellation if needed
        swal("Logout canceled.", {
          icon: "info",
        });
      }
    });
  }

</script>

<script src="../sweetalert2.min.js"></script>
<?php include '../sweetalert_messages.php'; ?>