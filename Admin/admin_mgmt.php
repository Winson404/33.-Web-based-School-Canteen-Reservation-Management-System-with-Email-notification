<title>Web-based School Canteen Reservation Management System | Manage Administrator</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/user.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

<div class="content-wrapper">
  <?php if($page === 'create') { ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrator</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Administrator Add</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="../forms/user_create.php" method="POST" enctype="multipart/form-data">
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
                <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <div class="form-group">
                      <span class="text-dark"><b>User type</b></span>
                      <select class="form-control" name="user_type" required>
                        <option selected disabled value="">Select type</option>
                        <option value="Staff">Staff</option>
                        <option value="Admin">Admin</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>First name</b></span>
                    <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
                  </div>
                </div>
                <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Middle name</b></span>
                    <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
                  </div>
                </div>
                <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Date of Birth</b></span>
                    <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()">
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Age</b></span>
                    <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly>
                  </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Place of Birth</b></span>
                    <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"></textarea>
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
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
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Profession/ Occupation</b></span>
                    <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Religion</b></span>
                    <select class="form-control" name="religion" required>
                      <option selected disabled value="">Select religion</option>
                      <option value="Roman Catholic">Roman Catholic</option>
                      <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                      <option value="Evangelical Christianity">Evangelical Christianity</option>
                      <option value="Islam">Islam</option>
                      <option value="Protestants">Protestants</option>
                      <option value="Seventh-day Adventism">Seventh-day Adventism</option>
                      <option value="Aglipayan">Aglipayan</option>
                      <option value="Bible Baptist Church">Bible Baptist Church</option>
                      <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                      <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                      <option value="Buddhist">Buddhist</option>
                      <option value="Methodist">Methodist</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Judaism">Judaism</option>
                      <option value="Ang Dating Daan">Ang Dating Daan</option>
                      <option value="Other Religion">Other Religion</option>
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
                
                <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                  <a class="h5 text-primary"><b>Complete address</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>House No.</b></span>
                    <input type="text" class="form-control"  placeholder="House No." name="house_no">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Street name</b></span>
                    <input type="text" class="form-control"  placeholder="Street name" name="street_name">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Sitio/Purok</b></span>
                    <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Zone</b></span>
                    <input type="text" class="form-control"  placeholder="Zone" name="zone">
                  </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Barangay</b></span>
                    <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Municipality</b></span>
                    <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Province</b></span>
                    <input type="text" class="form-control"  placeholder="Province" name="province" required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Region</b></span>
                    <input type="text" class="form-control"  placeholder="Region" name="region" required>
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
                    <span class="text-dark"><b>Administrator photo</b></span>
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
              <a href="admin.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="create_admin" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } else { 
    $user_Id = $page;
    $user = new User();
    $row = $user->get_user($user_Id);
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrator</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Administrator Update</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="../forms/user_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="user_Id" required value="<?php echo $row['user_Id']; ?>">
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
                <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <?php
                    $user_types = ['Staff', 'Admin'];
                    $selecteduser_type = $row['user_type']; // Assuming $row contains the data for the current user
                    ?>
                    <span class="text-dark"><b>Sex</b></span>
                    <select class="form-control" name="user_type" required>
                      <option selected disabled value="">Select type</option>
                      <?php foreach ($user_types as $user_type): ?>
                      <option value="<?php echo $user_type; ?>" <?php if ($selecteduser_type === $user_type) { echo 'selected'; } ?>><?php echo $user_type; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-8 col col-md-6 col-sm-6 col-12"></div>
                <div class="col-lg-4 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>First name</b></span>
                    <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
                  </div>
                </div>
                <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Middle name</b></span>
                    <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
                  </div>
                </div>
                <div class="col-lg-3 col col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Last name</b></span>
                    <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Ext/Suffix</b></span>
                    <input type="text" class="form-control"  placeholder="Ext/Suffix" name="suffix" value="<?php echo $row['suffix']; ?>">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Date of Birth</b></span>
                    <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?php echo $row['dob']; ?>">
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Age</b></span>
                    <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly value="<?php echo $row['age']; ?>">
                  </div>
                </div>
                
                <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Place of Birth</b></span>
                    <textarea name="birthplace" id="" cols="30" rows="1" class="form-control" required placeholder="Place of Birth"><?php echo $row['birthplace']; ?></textarea>
                  </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <?php
                    $genders = ['Male', 'Female', 'Non-Binary'];
                    $selectedGender = $row['gender']; // Assuming $row contains the data for the current user
                    ?>
                    <span class="text-dark"><b>Sex</b></span>
                    <select class="form-control" name="gender" required>
                      <option selected disabled value="">Select sex</option>
                      <?php foreach ($genders as $gender): ?>
                      <option value="<?php echo $gender; ?>" <?php if ($selectedGender === $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <?php
                    $statuses = ['Single', 'Married', 'Widow/ER', 'Separated'];
                    $selectedStatus = $row['civilstatus']; // Assuming $row contains the data for the current user
                    ?>
                    <span class="text-dark"><b>Civil Status</b></span>
                    <select class="form-control" name="civilstatus" required>
                      <option selected disabled value="">Select status</option>
                      <?php foreach ($statuses as $status): ?>
                      <option value="<?php echo $status; ?>" <?php if ($selectedStatus === $status) { echo 'selected'; } ?>><?php echo $status; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Profession/ Occupation</b></span>
                    <input type="text" class="form-control"  placeholder="Profession/ Occupation" name="occupation" required value="<?php echo $row['occupation']; ?>">
                  </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <?php
                    $religions = ['Roman Catholic', 'Iglesia Ni Cristo', 'Evangelical Christianity', 'Islam', 'Protestants', 'Seventh-day Adventism', 'Aglipayan', 'Bible Baptist Church', 'United Church of Christ in the Philippines', "Jehovah's Witnesses", 'Buddhist', 'Methodist', 'Hindu', 'Judaism', 'Ang Dating Daan', 'Other Religion'];
                    $selectedreligion = $row['religion']; // Assuming $row contains the data for the current user
                    ?>
                    <span class="text-dark"><b>Religion</b></span>
                    <select class="form-control" name="religion" required>
                      <option selected disabled value="">Select religion</option>
                      <?php foreach ($religions as $religion): ?>
                      <option value="<?php echo $religion; ?>" <?php if ($selectedreligion === $religion) { echo 'selected'; } ?>><?php echo $religion; ?></option>
                      <?php endforeach; ?>
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
                    <input type="email" class="form-control" placeholder="email@gmail.com" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" required value="<?php echo $row['email']; ?>">
                    <small id="text" style="font-style: italic;"></small>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Contact number</b></span>
                    <div class="input-group">
                      <div class="input-group-text">+63</div>
                      <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-12 mt-3 mb-2 col-md-12 col-sm-12 col-12">
                  <a class="h5 text-primary"><b>Complete address</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>House No.</b></span>
                    <input type="text" class="form-control"  placeholder="House No." name="house_no" value="<?php echo $row['house_no']; ?>">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Street name</b></span>
                    <input type="text" class="form-control"  placeholder="Street name" name="street_name" value="<?php echo $row['street_name']; ?>">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Sitio/Purok</b></span>
                    <input type="text" class="form-control"  placeholder="Sitio/Purok" name="purok" value="<?php echo $row['purok']; ?>">
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Zone</b></span>
                    <input type="text" class="form-control"  placeholder="Zone" name="zone" value="<?php echo $row['zone']; ?>">
                  </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Barangay</b></span>
                    <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required value="<?php echo $row['barangay']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Municipality</b></span>
                    <input type="text" class="form-control"  placeholder="Municipality" name="municipality" required value="<?php echo $row['municipality']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Province</b></span>
                    <input type="text" class="form-control"  placeholder="Province" name="province" required value="<?php echo $row['province']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Region</b></span>
                    <input type="text" class="form-control"  placeholder="Region" name="region" required value="<?php echo $row['region']; ?>">
                  </div>
                </div>
                <div class="col-lg-12 mt-3 mb-2">
                  <a class="h5 text-primary"><b>Additional information</b></a>
                  <div class="dropdown-divider"></div>
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Administrator photo</b></span>
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
              <a href="admin.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="update_admin" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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