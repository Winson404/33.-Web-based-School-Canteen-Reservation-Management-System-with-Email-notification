<title>Web-based School Canteen Reservation Management System | Administrator records</title>
<?php 
    require_once 'sidebar.php'; 
    require '../classes/user.php';
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrator</h1>
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
              <div class="card-header p-2">
                <a href="admin_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Administrator</a>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr>
                      <th>PHOTO</th>
                      <th>NAME</th>
                      <th>GENDER</th>
                      <th>EMAIL/CONTACT</th>
                      <th>USERTYPE</th>
                      <th>DATE ADDED</th>
                      <th>TOOLS</th>
                    </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php
                      $user = new User();
                      $admin = $user->display_user('Admin');
                      foreach ($admin as $row) {
                    ?>
                    <tr>
                      <td>
                        <a data-toggle="modal" data-target="#viewphoto<?php echo $row['user_Id']; ?>">
                          <img src="../assets/images-users/<?php echo $row['image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                        </a href="">
                      </td>
                      <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?></td>
                      <td><?= $row['gender'] ?></td>
                      <td><?php echo $row['email']; ?> <br> <span class="text-info"><?php if($row['contact'] !== '') { echo '+63 '.$row['contact']; } ?></span></td>
                      <td>
                        <?php if($row['user_type'] == 'Admin'): ?>
                        <span class="badge badge-primary p-1"><?php echo $row['user_type']; ?></span>
                        <?php else: ?>
                        <span class="badge badge-success p-1"><?php echo $row['user_type']; ?></span>
                        <?php endif; ?>
                      </td>
                      <td class="text-primary"><?php echo $row['date_registered']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="admin_view.php?user_Id=<?php echo $row['user_Id']; ?>"><i class="fas fa-folder"></i> View</a>
                        <?php if($row['user_type'] == 'Admin'): ?>
                        <a class="btn btn-info btn-sm" href="admin_mgmt.php?page=<?php echo $row['user_Id']; ?>" style="pointer-events: none;opacity: .7;"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['user_Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
                        <!-- <a type="button" href="admin_changePassword.php?user_Id=<?php //echo $row['user_Id']; ?>" class="btn btn-warning btn-sm" style="pointer-events: none;"><i class="fa-solid fa-lock"></i> Security</a> -->
                        <?php else: ?>
                        <a class="btn btn-info btn-sm" href="admin_mgmt.php?page=<?php echo $row['user_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['user_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        <!-- <a type="button" href="admin_changePassword.php?user_Id=<?php// echo $row['user_Id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-lock"></i> Security</a> -->
                        <?php endif; ?>
                        
                      </td>
                    </tr>
                    <?php include 'admin_delete.php'; }  ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once '../includes/footer.php'; ?>