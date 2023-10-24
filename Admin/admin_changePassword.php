<title>Web-based School Canteen Reservation Management System | Manage password</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/user.php'; 
    if(isset($_GET['user_Id'])) {
    $user_Id = $_GET['user_Id'];

    $user = new User();
    $row = $user->get_user($user_Id);

    
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Manage password info</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6 d-block m-auto">
        <div class="card card-primary card-outline">
          <form action="../forms/user_update.php" method="POST">
            <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
            <div class="card-header">
              <h3 class="card-title">Manage passwords</h3>
              <div class="card-tools mt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group mb-3">
                <label for=""><b>Old password</b></label>
                <input type="password" class="form-control" placeholder="Old password" name="OldPassword" required minlength="8">
              </div>
              <div class="form-group">
                <span class="text-dark"><b>New Password</b></span>
                <input type="password" id="password" class="form-control" name="password" placeholder="New Password" minlength="8" required>
                <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
              </div>
              <div class="form-group">
                <span class="text-dark"><b>Confirm new password</b></span>
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm new password" id="cpassword" onkeyup="validate_password()" required minlength="8">
                <small id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;"></small>
              </div>
            </div>
            <div class="card-footer">
              <a href="admin.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Back</a>
              <button type="submit" class="btn btn-info float-right" name="password_admin" id="submit_button"><i class="fas fa-pencil-alt"></i> Change password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php }  else { require_once '../includes/404.php'; } ?>
<br>
<br>
<br>
<?php require_once '../includes/footer.php'; ?>