<?php
    include '../config.php';

    if(isset($_SESSION['admin_Id']) && isset($_SESSION['login_time'])) {

      $id = $_SESSION['admin_Id'];
      $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
      $row = mysqli_fetch_array($users);
      
      $login_time = $_SESSION['login_time'];
      $logout_time = date('Y-m-d h:i A');

      // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
      $_SESSION['last_active'] = time();

    include '../includes/topbar.php';
?>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">School Canteen Reservation System</span>
      <br>
      <span class="text-sm ml-5 font-weight-light mt-2">&nbsp;&nbsp;Sample Address</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-4 pb-2 pt-3 mb-3 d-flex">
        <div class="image">
          <?php //if($row['image'] == ""): ?>
          <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
          <?php //else: ?>
          <img src="../images-users/<?php //echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
          <?php //endif; ?>
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php //echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
        </div>
      </div> -->
      

      <!-- SidebarSearch Form -->
      <!--   <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard </p></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php 
              echo (
                basename($_SERVER['PHP_SELF']) == 'admin.php' || 
                basename($_SERVER['PHP_SELF']) == 'users.php'
                ) ? 'active' : ''; 
              ?>
            "><i class="fa-solid fa-users-gear"></i><p>&nbsp;&nbsp;System Users<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php 
              echo (
                basename($_SERVER['PHP_SELF']) == 'admin.php' || 
                basename($_SERVER['PHP_SELF']) == 'users.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
                <a href="admin.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php') ? 'active' : ''; ?>"><i class="fa-solid fa-user-secret"></i><p>&nbsp;&nbsp; Administrators</p></a>
              </li>
              <li class="nav-item">
                <a href="users.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'active' : ''; ?>"><i class="fa-solid fa-users"></i><p>&nbsp;&nbsp; Users</p></a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="announcement.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'announcement.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-bell"></i><p>&nbsp;&nbsp; Announcement</p></a>
          </li>
          <li class="nav-item">
            <a href="customize.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'customize.php') ? 'active' : ''; ?>">
              <i class="fa-solid fa-palette"></i><p>&nbsp;&nbsp;Customize</p></a>
          </li>

          <li class="nav-item">
            <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>"><i class="fa-solid fa-right-to-bracket"></i><p>&nbsp;&nbsp; Log history</p></a>
          </li>

          <li class="nav-header text-secondary" style="margin-bottom: -10px;">DATABASE MGMT</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
              <?php 
              echo (
                basename($_SERVER['PHP_SELF']) == 'backup.php' || 
                basename($_SERVER['PHP_SELF']) == 'restore.php'
                ) ? 'active' : ''; 
              ?>
            "><i class="fa-solid fa-database"></i><p>&nbsp;&nbsp;Back-up and Restore<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview" 
              <?php 
              echo (
                basename($_SERVER['PHP_SELF']) == 'backup.php' || 
                basename($_SERVER['PHP_SELF']) == 'restore.php'
                ) ? 'style="display: block;"' : ''; 
              ?>
            >
              <li class="nav-item">
                <a href="backup.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'backup.php') ? 'active' : ''; ?>"><i class="fa-solid fa-floppy-disk"></i><p>&nbsp; Back-up database</p></a>
              </li>
              <li class="nav-item">
                <a href="restore.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'restore.php') ? 'active' : ''; ?>"><i class="fa-solid fa-window-restore"></i><p>&nbsp;&nbsp; Restore database</p></a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>




  

<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../login.php');
    }
?>
