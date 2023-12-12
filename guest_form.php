<title>Web-based School Canteen Reservation Management System | Guest reservation</title>
<?php 
    require_once 'header.php'; 
    require_once 'classes/product.php'; 
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Guest Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Guest Form Reservation</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <form action="forms/guest_create.php" method="POST">
          <div class="row d-flex justify-content-center">
          <?php 
            if(isset($_GET['prod_Id'])) {
            $prod_Id = $_GET['prod_Id'];
            $prod = new Product();
            $row = $prod->get_product($prod_Id);
          ?>
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  <h5>Product info</h5>
                </div>
                <a href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>">
                  <div class="card-body" style="margin-bottom: -30px;">
                    <div class="img">
                      <img src="assets/images-product/<?php echo $row['prod_image']; ?>" alt="" class="img-fluid product-image">
                    </div>
                    <p>
                      <?php echo ucwords($row['prod_name']); ?><br> 
                      <span class="text-sm text-danger">₱<?php echo number_format($row['price'], 2, '.', ','); ?></span> <br>
                    </p>
                  </div>
                </a>
                <div class="card-footer">
                    <div class="d-flex justify-content-center align-items-center">
                      <input type="hidden" class="form-control text-center" value="<?= $row['prod_Id']; ?>" required name="prod_Id">
                      <input type="number" min="1" class="form-control text-center" placeholder="Enter qty" style="width: 150px;" name="prod_qty" required>
                    </div>
                </div>
              </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card bg-light d-flex flex-fill">
              
                <div class="card-header text-muted border-bottom-0">
                  <h5>Fill out the reservation form</h5>
                </div>
                <div class="card-body" style="margin-bottom: -20px;">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>First name</b></span>
                          <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                      <div class="form-group">
                          <span class="text-dark"><b>Middle name</b></span>
                          <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
                      </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Last name</b></span>
                          <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                      <div class="form-group">
                        <span class="text-dark"><b>Ext/Suffix</b></span>
                        <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix">
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Email</b></span>
                          <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required>
                          <small id="text" style="font-style: italic;"></small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Contact number</b></span>
                          <div class="input-group">
                            <div class="input-group-text">+63</div>
                            <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10">
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                          <span class="text-dark"><b>Complete address</b></span>
                          <textarea name="address" class="form-control" id="" cols="30" rows="2" placeholder="Complete address" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                      <p>Already have an account? <a href="login.php">Click here!</a></p>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary float-right" name="guest_reservation" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Register</button>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <?php } ?>
          </div>
        </form>

      </div>
    </div>
  </div>
  
<?php include 'footer.php'; ?>
