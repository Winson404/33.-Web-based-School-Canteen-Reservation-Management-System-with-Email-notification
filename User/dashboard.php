<title>Web-based School Canteen Reservation Management System | Dashboard</title>
<?php require_once 'sidebar.php'; ?>
  
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact us</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Contact us</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='Admin'");
              $row_users = mysqli_num_rows($users);
              ?>
              <h3><?php echo $row_users; ?></h3>
              <p>Administrators</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $users = mysqli_query($conn, "SELECT user_Id from users WHERE user_type='User'");
              $row_users = mysqli_num_rows($users);
              ?>
              <h3><?php echo $row_users; ?></h3>
              <p>Registered users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php include '../includes/footer.php'; ?>
