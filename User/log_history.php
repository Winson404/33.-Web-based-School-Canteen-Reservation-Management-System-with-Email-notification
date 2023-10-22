<title>Web-based School Canteen Reservation Management System | Log history records</title>
<?php require_once 'sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3>Log history records</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Log history records</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <!-- <a href="users_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New User</a> -->
              <div class="card-tools mr-1 mt-3">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-3">
              <table id="example1" class="table table-bordered table-hover text-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>DATE AND TIME LOGGED IN</th>
                    <th>DATE AND TIME LOGGED OUT</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                  <?php
                  $i = 1;
                  $sql = mysqli_query($conn, "SELECT * FROM log_history WHERE user_Id = '$id'");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
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

<?php include '../includes/footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->