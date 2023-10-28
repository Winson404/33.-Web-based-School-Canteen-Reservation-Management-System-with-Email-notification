<title>Web-based School Canteen Reservation Management System | Send verification code</title>
<?php require_once 'header.php'; ?>
<div class="content m-5">
  <div class="login-box d-block m-auto">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Reset </b>Password</a>
      </div>
      <div class="card-body">
        <?php
        $conn = new mysqli("localhost", "root", "", "reservation");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if(isset($_GET['user_Id']) && isset($_GET['type'])) {
        $type    = $_GET['type'];
        $user_Id = $_GET['user_Id'];
        if($type == 'Admin') {
          $fetch = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id'");
          $row = mysqli_fetch_array($fetch);
        ?>
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
          <form action="forms/account_recovery.php" method="POST">
            <input type="hidden" class="form-control mb-3" name="type" value="<?php echo $type; ?>">
            <input type="hidden" class="form-control mb-3" name="email" value="<?php echo $row['email']; ?>">
            <input type="hidden" class="form-control mb-3" name="user_Id" value="<?php echo $user_Id; ?>">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group mb-3">
                  <img src="assets/images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
                </div>
                <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
              </div>
              
              <div class="col-md-12">
                <div class="input-group">
                  <p>Send code via email?</p>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: -18px;">
                <div class="input-group">
                  <p><b><?php echo $row['email']; ?></b></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn bg-gradient-primary btn-block"  name="sendcode">Continue</button>
                <p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>
              </div>
            </div>
          </form>
        <?php
        } else {
          $fetch = mysqli_query($conn, "SELECT * FROM customer WHERE cust_Id='$user_Id'");
          $row = mysqli_fetch_array($fetch);
        ?>
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        <form action="forms/account_recovery.php" method="POST">
          <input type="hidden" class="form-control mb-3" name="type" value="<?php echo $type; ?>">
          <input type="hidden" class="form-control mb-3" name="email" value="<?php echo $row['email']; ?>">
          <input type="hidden" class="form-control mb-3" name="user_Id" value="<?php echo $user_Id; ?>">
          <div class="row">
            <div class="col-md-12">
              <div class="input-group mb-3">
                <img src="assets/images-users/<?php echo $row['image']; ?>" alt="" style="width: 60px;height: 60px; border-radius: 50%; display: block;margin-left: auto;margin-right: auto;margin-bottom: -12px;">
              </div>
              <p class="text-center mb-4"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></p>
            </div>
            
            <div class="col-md-12">
              <div class="input-group">
                <p>Send code via email?</p>
              </div>
            </div>
            <div class="col-md-12" style="margin-top: -18px;">
              <div class="input-group">
                <p><b><?php echo $row['email']; ?></b></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn bg-gradient-primary btn-block"  name="sendcode">Continue</button>
              <p class="mt-1"><a href="forgot-password.php" class="text-center">Not you?</a></p>
            </div>
          </div>
        </form>
        <?php } } else { require_once '404.php'; } ?>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php'; ?>