<title>Web-based School Canteen Reservation Management System | Announcement records</title>
<?php 
    require_once 'sidebar.php'; 
    require '../classes/announcement.php';
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Announcement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Announcement records</li>
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
              <div class="card-header p-2">
                <button type="button" class="btn btn-sm bg-primary ml-2" data-toggle="modal" data-target="#add_activity"><i class="fa-sharp fa-solid fa-square-plus"></i> New Announcement</button>
                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr class="bg-light">
                      <th width="15%">DATE</th>
                      <th width="65%">TYPE OF ACTIVTY</th>
                      <th width="20%">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php
                      $announce = new Announcement();
                      $announcement = $announce->display_announcement();
                      foreach ($announcement as $row) {
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

<?php require_once 'announcement_add.php'; require_once '../includes/footer.php'; ?>