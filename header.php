<?php 
    require_once 'includes/config.php';
    if(isset($_SESSION['admin_Id'])) {
      header('Location: Admin/dashboard.php');
    } elseif(isset($_SESSION['user_Id'])) {
      header('Location: User/profile.php');
    } else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Forgot Password (v2)</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <style>
    body {
    font-family: 'Roboto', sans-serif;
    }
    .form-control:not([type="email"]):not([type="password"]) {
    text-transform: capitalize;
    }
    </style>
  </head>
  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
          <a href="login.php" class="navbar-brand">
            <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Web-based School Canteen Reservation Management System</span>
          </a>
          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <!-- <ul class="navbar-nav">
              <li class="nav-item">
                <a href="index3.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="#" class="dropdown-item">Some action </a></li>
                  <li><a href="#" class="dropdown-item">Some other action</a></li>
                </ul>
              </li>
            </ul> -->
            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-0 ml-md-3">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form> -->
          </div>
          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php 
              $current_page = basename($_SERVER['PHP_SELF']);
              if ($current_page !== 'login.php') { ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
  <?php } ?>