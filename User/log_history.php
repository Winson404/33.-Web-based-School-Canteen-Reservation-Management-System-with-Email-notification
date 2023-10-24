<title>Web-based School Canteen Reservation Management System | Administrator records</title>
<?php
  require_once 'sidebar.php';
  require_once '../classes/authentication.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Administrators</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Administrator records</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover text-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>SYSTEM USER</th>
                    <th>USERTYPE</th>
                    <th>DATE AND TIME LOGGED IN</th>
                    <th>DATE AND TIME LOGGED OUT</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                   <?php 
                    $i = 1;
                    $log = new LogHistory();
                    $log_history = $log->display_logs();
                    foreach ($log_history as $row) {

                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></td>
                    <td><?php echo $row['user_type']; ?></td>
                    <td><?php echo date("F d, Y h:i A",strtotime($row['login_time'])); ?></td>
                    <td><?php if($row['logout_time'] != '') { echo date("F d, Y h:i A",strtotime($row['logout_time'])); } else { echo 'On-going session'; } ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once '../includes/footer.php'; ?>