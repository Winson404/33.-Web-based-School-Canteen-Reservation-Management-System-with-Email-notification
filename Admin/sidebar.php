<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../includes/config.php';
require '../classes/UserSession.php';

$db = new Database();
$userSession = new UserSession($db->getConnection());
require '../classes/announcement.php';
// Check if a user is logged in
if ($userSession->isUserLoggedIn()) {
    $id = $_SESSION['user_Id'];
    $row = $userSession->getLoggedInUser($id);

    $login_time = $_SESSION['login_time'];
    $logout_time = date('Y-m-d h:i A');
    // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
    $_SESSION['last_active'] = time();
    require_once '../includes/header.php';


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dashboard.php" class="brand-link">
    <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Web-based School Canteen Reservation Management System</span>
    <br>
    <span class="text-sm ml-5 font-weight-light mt-2">&nbsp;&nbsp;Sample Address</span>
  </a>
  
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> -->
    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
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
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'admin.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
            basename($_SERVER['PHP_SELF']) == 'users.php' ||
            basename($_SERVER['PHP_SELF']) == 'users_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'users_view.php'
            ) ? 'active' : '';
            ?>
            ">
            <i class="fa-solid fa-users-gear"></i>
            <p>&nbsp;&nbsp;System Users<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview"
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'admin.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
            basename($_SERVER['PHP_SELF']) == 'users.php' ||
            basename($_SERVER['PHP_SELF']) == 'users_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'users_view.php'
            ) ? 'style="display: block;"' : '';
            ?>
            >
            <li class="nav-item">
              <a href="admin.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' || basename($_SERVER['PHP_SELF']) == 'admin_view.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>&nbsp;&nbsp; Administrators</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php' || basename($_SERVER['PHP_SELF']) == 'users_mgmt.php' || basename($_SERVER['PHP_SELF']) == 'users_view.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>&nbsp;&nbsp; Users</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="announcement.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'announcement.php') ? 'active' : ''; ?>">
            <i class="fa-solid fa-bell"></i>
            <p>&nbsp;&nbsp; Announcement</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
            <i class="fas fa-list-alt"></i>
            <p>&nbsp;&nbsp; Log history</p>
          </a>
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
            ">
            <i class="fa-solid fa-database"></i>
            <p>&nbsp;&nbsp;Back-up and Restore<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview"
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'backup.php' ||
            basename($_SERVER['PHP_SELF']) == 'restore.php'
            ) ? 'style="display: block;"' : '';
            ?>
            >
            <li class="nav-item">
              <a href="backup.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'backup.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>&nbsp; Back-up database</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="restore.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'restore.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>&nbsp;&nbsp; Restore database</p>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>
<?php
  } else {
    header('Location: ../login.php');
    exit();

  }
?>