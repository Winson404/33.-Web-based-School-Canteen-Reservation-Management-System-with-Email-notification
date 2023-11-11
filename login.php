<title>Web-based School Canteen Reservation Management System | Login</title>
<?php require_once 'header.php'; ?>
<div class="content m-5">
  <div class="login-box d-block m-auto">
    <div class="card card-outline card-primary ">
      <div class="card-header text-center">
        <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
        <a href="login.php" class="h1">
          <img src="assets/images/ctu-logo copy.jpg" alt="logo" class="img-fluid shadow-sm img-circle">
        </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="forms/login_processes.php" method="post">
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <!-- FOR INVALID EMAIL -->
          <div class="input-group mb-3">
            <small id="text" style="font-style: italic;"></small>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" minlength="8" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" onclick="myFunction()">
                <label for="remember">
                  Show password
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="login" id="submit_button">Sign In</button>
            </div>
          </div>
        </form>
        <!-- <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div> -->
        <p class="mb-1">
          <a href="forgot-password.php">Forgot password?</a>
        </p>
        <p class="mb-0">
          No account? <a href="register.php" class="text-center">Register here!</a>
        </p>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php'; ?>