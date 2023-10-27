<title>Web-based School Canteen Reservation Management System | Dashboard</title>
<?php
  require_once 'sidebar.php';
  require '../classes/user.php';
  require '../classes/customer.php';
  require '../classes/category.php';
  require '../classes/product.php';
  require '../classes/reservation.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
                $admin = new User();
                $count_admin = $admin->count_users('Admin');
              ?>
              <h3><?= $count_admin; ?></h3>
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
                $user = new User();
                $count_user = $user->count_users('User');
              ?>
              <h3><?= $count_user; ?></h3>
              <p>Registered users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
                $student = new Customer();
                $count_student = $student->count_customer('Student');
              ?>
              <h3><?= $count_student; ?></h3>
              <p>Registered Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="customer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
                $teacher = new Customer();
                $count_teacher = $teacher->count_customer('Teacher');
              ?>
              <h3><?= $count_teacher; ?></h3>
              <p>Registered Teachers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="customer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
                $cat = new Category();
                $count_cat = $cat->count_category();
              ?>
              <h3><?= $count_cat; ?></h3>
              <p>Product categories</p>
            </div>
            <div class="icon">
              <i class="fas fa-tags"></i>
            </div>
            <a href="category.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
                $prod = new Product();
                $count_prod = $prod->count_product();
              ?>
              <h3><?= $count_prod; ?></h3>
              <p>Foods</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
                $reserve = new Reservation();
                $count_reserve = $reserve->count_reserve();
              ?>
              <h3><?= $count_reserve; ?></h3>
              <p>Reservations</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-check"></i>
            </div>
            <a href="reservation.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <?php require_once '../includes/footer.php'; ?>