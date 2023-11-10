<title>Web-based School Canteen Reservation Management System | Manage Customer</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/customer.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

<div class="content-wrapper">
  <?php if($page === 'create') { ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Customer Add</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="../forms/customer_create.php" method="POST" enctype="multipart/form-data">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Fill-in the required fields below</h3>
              <div class="card-tools mt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mt-1 mb-2">
                  <a class="h5 text-primary"><b>Basic information</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Type of user</b></span>
                    <select class="form-control" name="user_type" id="user_type" required>
                      <option selected disabled value="">Select type</option>
                      <option value="Student">Student</option>
                      <option value="Teacher">Teacher</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" id="year_section_div" style="display: none">
                  <div class="form-group">
                    <span class="text-dark"><b>Year and Section</b></span>
                    <input type="text" class="form-control" placeholder="Year and Section" name="yr_section" required>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" id="position_div" style="display: none">
                  <div class="form-group">
                    <span class="text-dark"><b>Position</b></span>
                    <input type="text" class="form-control" placeholder="Teacher's Position" name="teacherPosition" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>First name</b></span>
                      <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                      <span class="text-dark"><b>Middle name</b></span>
                      <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Last name</b></span>
                      <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Ext/Suffix</b></span>
                    <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix">
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Date of Birth</b></span>
                      <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()">
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Age</b></span>
                      <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Sex</b></span>
                    <select class="form-control" name="gender" required>
                      <option selected disabled value="">Select sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Non-Binary">Non-Binary</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Civil Status</b></span>
                    <select class="form-control" name="civilstatus" required>
                      <option selected disabled value="">Select status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widow/ER">Widow/ER</option>
                      <option value="Separated">Separated</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                  <a class="h5 text-primary"><b>Contact details</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Email</b></span>
                      <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required>
                      <small id="text" style="font-style: italic;"></small>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
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
                
                <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                  <a class="h5 text-primary"><b>Account password</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Password</b></span>
                      <input type="password" id="password" class="form-control" name="password" placeholder="Password" minlength="8"  style="text-transform: none;">
                      <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Confirm password</b></span>
                      <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password()" required minlength="8"  style="text-transform: none;">
                      <small id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;"></small>
                    </div>
                </div>

                <div class="col-lg-12 mt-3 mb-2">
                  <a class="h5 text-primary"><b>Additional information</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>User photo</b></span>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)" required>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>

                      </div>
                      <p class="help-block text-danger">Max. 500KB</p>
                    </div>
                </div>
                 <!-- LOAD IMAGE PREVIEW -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="form-group" id="preview">
                    </div>
                </div>

              </div>
              <!-- END ROW -->
            </div>
            <div class="card-footer">
              <a href="customer.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="create_customer" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } else { 
    $cust_Id = $page;
    $customer = new Customer();
    $row = $customer->get_customer($cust_Id);
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Customer Update</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="../forms/customer_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="cust_Id" required value="<?php echo $row['cust_Id']; ?>">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Fill-in the required fields below</h3>
              <div class="card-tools mt-2">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 mt-1 mb-2">
                  <a class="h5 text-primary"><b>Basic information</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Type of user</b></span>
                    <select class="form-control" name="user_type" id="user_type" required>
                      <option selected disabled value="">Select type</option>
                      <option value="Student" <?php if($row['user_type'] == 'Student') { echo 'selected'; } ?>>Student</option>
                      <option value="Teacher" <?php if($row['user_type'] == 'Teacher') { echo 'selected'; } ?>>Teacher</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" id="year_section_div" style="display: none">
                  <div class="form-group">
                    <span class="text-dark"><b>Year and Section</b></span>
                    <input type="text" class="form-control" placeholder="Year and Section" name="yr_section" value="<?= $row['yr_section'] ?>">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12" id="position_div" style="display: none">
                  <div class="form-group">
                    <span class="text-dark"><b>Position</b></span>
                    <input type="text" class="form-control" placeholder="Teacher's Position" name="teacherPosition" value="<?= $row['teacherPosition'] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>First name</b></span>
                      <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?= $row['firstname'] ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                      <span class="text-dark"><b>Middle name</b></span>
                      <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?= $row['middlename'] ?>">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Last name</b></span>
                      <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?= $row['lastname'] ?>">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Ext/Suffix</b></span>
                    <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix" value="<?= $row['suffix'] ?>">
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Date of Birth</b></span>
                      <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?= $row['dob'] ?>">
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Age</b></span>
                      <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly value="<?= $row['age'] ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Sex</b></span>
                    <select class="form-control" name="gender" required>
                      <option selected disabled value="">Select sex</option>
                      <option value="Male" <?php if($row['gender'] == 'Male') { echo 'selected'; } ?>>Male</option>
                      <option value="Female" <?php if($row['gender'] == 'Female') { echo 'selected'; } ?>>Female</option>
                      <option value="Non-Binary" <?php if($row['gender'] == 'Non-Binary') { echo 'selected'; } ?>>Non-Binary</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Civil Status</b></span>
                    <select class="form-control" name="civilstatus" required>
                      <option selected disabled value="">Select status</option>
                      <option value="Single" <?php if($row['civilstatus'] == 'Single') { echo 'selected'; } ?>>Single</option>
                      <option value="Married" <?php if($row['civilstatus'] == 'Married') { echo 'selected'; } ?>>Married</option>
                      <option value="Widow/ER" <?php if($row['civilstatus'] == 'Widow/ER') { echo 'selected'; } ?>>Widow/ER</option>
                      <option value="Separated" <?php if($row['civilstatus'] == 'Separated') { echo 'selected'; } ?>>Separated</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                  <a class="h5 text-primary"><b>Contact details</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Email</b></span>
                      <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required value="<?= $row['email'] ?>">
                      <small id="text" style="font-style: italic;"></small>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Contact number</b></span>
                      <div class="input-group">
                        <div class="input-group-text">+63</div>
                        <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10" value="<?= $row['contact'] ?>">
                      </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>Complete address</b></span>
                      <textarea name="address" class="form-control" id="" cols="30" rows="2" placeholder="Complete address" required><?= $row['address'] ?></textarea>
                    </div>
                </div>
                
                <div class="col-lg-12 mt-3 mb-2">
                  <a class="h5 text-primary"><b>Additional information</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="form-group">
                      <span class="text-dark"><b>User photo</b></span>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="fileToUpload" onchange="getImagePreview(event)">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>

                      </div>
                      <p class="help-block text-danger">Max. 500KB</p>
                    </div>
                </div>
                 <!-- LOAD IMAGE PREVIEW -->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="form-group" id="preview">
                    </div>
                </div>

              </div>
              <!-- END ROW -->
            </div>
            <div class="card-footer">
              <a href="customer.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="update_customer" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } } else { require_once '../includes/404.php'; } ?>
<br>
<br>
<br>
<?php require_once '../includes/footer.php'; ?>
<script>
  
  var userTypeSelect = document.getElementById('user_type');
  var yearSectionDiv = document.getElementById('year_section_div');
  var positionDiv = document.getElementById('position_div');

  userTypeSelect.addEventListener('change', function() {
    if (userTypeSelect.value === 'Student') {
      yearSectionDiv.style.display = 'block';
      positionDiv.style.display = 'none';
      document.querySelector('[name=yr_section]').required = true;
      document.querySelector('[name=teacherPosition]').required = false;
    } else if (userTypeSelect.value === 'Teacher') {
      yearSectionDiv.style.display = 'none';
      positionDiv.style.display = 'block';
      document.querySelector('[name=yr_section]').required = false;
      document.querySelector('[name=teacherPosition]').required = true;
    } else {
      yearSectionDiv.style.display = 'none';
      positionDiv.style.display = 'none';
      document.querySelector('[name=yr_section]').required = false;
      document.querySelector('[name=teacherPosition]').required = false;
    }
  });
</script>