<title>School Canteen Reservation System | Announcement records</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3>Announcement records</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Announcement records</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <button type="button" class="btn btn-sm bg-primary ml-2" data-toggle="modal" data-target="#add_activity"><i class="fa-sharp fa-solid fa-square-plus"></i> New Announcement</button>
                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-3">

                  <table id="example11" class="table table-bordered table-hover text-sm">
                  <thead>
                  <tr class="bg-light">
                    <th width="15%">DATE</th>
                    <th width="65%">TYPE OF ACTIVTY</th>
                    <th width="20%">ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php 
                      $sql = mysqli_query($conn, "SELECT * FROM announcement WHERE actDate >= '$date_today' ORDER BY actDate");
                      while ($row = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <?php if($row['actDate'] == $date_today): ?>
                          <td class="bg-white text-bold"><?php echo date("F d, Y", strtotime($row['actDate'])); ?></td>
                          <td class="bg-white text-justify text-bold"><?php echo $row['actName']; ?></td>
                          <td class="bg-white">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['actId']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['actId']; ?>"><i class="fas fa-trash"></i> Delete</button>
                          </td>
                        <?php else: ?>
                          <td class="bg-grey text-muted"><?php echo date("F d, Y", strtotime($row['actDate'])); ?></td>
                          <td class="bg-grey text-muted text-justify"><?php echo $row['actName']; ?></td>
                          <td class="bg-grey text-muted">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['actId']; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['actId']; ?>"><i class="fas fa-trash"></i> Delete</button>
                          </td>
                        <?php endif; ?>
                    </tr>
                    <?php include 'announcement_update_delete.php'; } ?>
                     
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php include 'announcement_add.php'; include '../Includes/footer.php';  ?>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->

