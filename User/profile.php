<title>Web-based School Canteen Reservation Management System | Profile</title>
<?php 
    require_once 'header.php'; 
    require_once '../classes/product.php';
?>
<style>
  .card-body .img img {
    height: 200px; /* set a fixed height */
    object-fit: cover; /* use "cover" to scale the image while maintaining aspect ratio */
  }

  .card-body .product-image {
    height: 200px; /* set a fixed height */
    object-fit: cover; /* use "cover" to scale the image while maintaining aspect ratio */
  }
</style>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Customer Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Customer Profile info</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if($row['image'] == ""): ?>
                  <img src="../assets/dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
                  <?php else: ?>
                  <img class="profile-user-img img-fluid img-circle"src="../assets/images-users/<?php echo $row['image']; ?>"alt="User profile picture"  style="height: 90px; width: 90px; border-radius: 50%;">
                  <?php endif; ?>
                </div>
                <h3 class="profile-username text-center"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?></h3>
                <p class="text-muted text-center"><?php echo $row['user_type']; ?></p>
                <a class="btn bg-gradient-primary btn-block">Profile</a>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header bg-gradient-primary">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-location"></i>Address</strong>
                <p class="text-muted">
                  <?php echo $row['address']; ?>
                </p>
                <hr>
                <strong><i class="fa-solid fa-calendar-days"></i> Date registered</strong>
                <p class="text-muted ml-3"><?php echo $row['date_registered']; ?></p>
                <hr>
                <!--  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#viewprofile" data-toggle="tab">Profile info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#updateprofile" data-toggle="tab">Update info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profileupdate" data-toggle="tab">Profile update</a></li>
                  <li class="nav-item"><a class="nav-link" href="#accountsecurity" data-toggle="tab">Account security</a></li>
                </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="viewprofile">
                      <?php if($row['user_type'] == 'Teacher'): ?>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Teacher's Position</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Teacher's Position" placeholder="Teacher's Position" value="<?php echo ' '.$row['teacherPosition'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?>" readonly>
                        </div>
                      </div>
                      <?php else: ?>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Year and Section</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Year and Section" placeholder="Year and Section" value="<?php echo $row['yr_section']; ?>" readonly>
                        </div>
                      </div>
                     <?php endif; ?>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Full name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Date of birth</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo date("F d, Y", strtotime($row['dob'])); echo ' - '; echo $row['age'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="Gender" value="<?php echo $row['gender']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="First name" class="col-sm-2 col-form-label">Civil Status</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="First name" placeholder="Civil Status" value="<?php echo $row['civilstatus']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="Email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="input-group-text">+63</div>
                            <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Contact number" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>" readonly>
                          </div>
                        </div>
                      </div>
                      
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <a type="button" class="btn bg-gradient-primary" href="#updateprofile" data-toggle="tab">Update info</a>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="updateprofile">
                      <form action="../forms/customer_update.php" method="POST">
                        <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="cust_Id">
                        <div class="form-group row">
                          <a  class="col-sm-12 text-primary text-bold">Basic information</a>
                        </div>
                        <div class="form-group row">
                          <label for="First name" class="col-sm-2 col-form-label">First name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="First name" placeholder="First name" value="<?php echo $row['firstname']; ?>" onkeyup="lettersOnly(this)" name="firstname" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Middle name" class="col-sm-2 col-form-label">Middle name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Middle name" placeholder="Middle name" value="<?php echo $row['middlename']; ?>"  onkeyup="lettersOnly(this)"name="middlename">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Last name" class="col-sm-2 col-form-label">Last name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Last name" placeholder="Last name" value="<?php echo $row['lastname']; ?>" onkeyup="lettersOnly(this)" name="lastname" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Suffix" class="col-sm-2 col-form-label">Suffix</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="Suffix" placeholder="Suffix" value="<?php echo $row['suffix']; ?>" name="suffix">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="txtbirthdate" class="col-sm-2 col-form-label">Date of Birth</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="dob" placeholder="Date of birth" required id="birthdate" onchange="calculateAge()" value="<?php echo $row['dob']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="txtage" class="col-sm-2 col-form-label">Age</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control bg-white" placeholder="Age" required id="txtage" name="age" readonly value="<?php echo $row['age']; ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Contact number" class="col-sm-2 col-form-label">Sex</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <?php
                              $genders = ['Male', 'Female', 'Non-Binary'];
                              $selectedGender = $row['gender']; // Assuming $row contains the data for the current user
                              ?>
                              <select class="form-control" name="gender" required>
                                <option selected disabled value="">Select sex</option>
                                <?php foreach ($genders as $gender): ?>
                                <option value="<?php echo $gender; ?>" <?php if ($selectedGender === $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Contact number" class="col-sm-2 col-form-label">Civil Status</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <?php
                              $statuses = ['Single', 'Married', 'Widow/ER', 'Separated'];
                              $selectedStatus = $row['civilstatus']; // Assuming $row contains the data for the current user
                              ?>
                              <select class="form-control" name="civilstatus" required>
                                <option selected disabled value="">Select status</option>
                                <?php foreach ($statuses as $status): ?>
                                <option value="<?php echo $status; ?>" <?php if ($selectedStatus === $status) { echo 'selected'; } ?>><?php echo $status; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()"  value="<?php echo $row['email']; ?>">
                            <small id="text" style="font-style: italic;"></small>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Contact number" class="col-sm-2 col-form-label">Contact number</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <div class="input-group-text bg-white">+63</div>
                              <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Contact number" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Contact number" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <textarea name="address" id="" class="form-control" cols="30" rows="2" placeholder="Address" required><?php echo $row['address']; ?></textarea>
                            </div>
                          </div>
                        </div>
                       
                        <!-- <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-gradient-primary" id="update_admin" name="update_profile_info_user">Submit</button>
                          </div>
                        </div>
                      </form>
                      
                    </div>
                    <div class="tab-pane" id="accountsecurity">
                      <form action="../forms/customer_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="user_Id">
                        <div class="form-group row">
                          <label for="Old password" class="col-sm-2 col-form-label">Old password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="Old password" placeholder="Old password" name="OldPassword" required minlength="8"  style="text-transform: none;">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Password" name="password" required id="password" minlength="8"  style="text-transform: none;">
                            <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="cpassword" class="col-sm-2 col-form-label">Confirm password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" placeholder="Confirm password" name="cpassword" required id="cpassword" onkeyup="validate_password()" minlength="8"  style="text-transform: none;">
                            <small id="wrong_pass_alert" class="text-bold" style="font-style: italic;font-size: 12px;"></small>
                          </div>
                        </div>
                        <div class="icheck-primary mt-3">
                          <input type="checkbox" id="remember" onclick="showPassword()">
                          <label for="remember">
                            Show password
                          </label>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn bg-gradient-primary" name="update_password_user" id="submit_button">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane" id="profileupdate">
                      <form action="../forms/customer_update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="cust_Id">
                        <div class="row d-flex justify-content-center">
                          <!-- LOAD IMAGE PREVIEW -->
                          <div class="col-lg-10">
                            <div class="form-group" id="preview">
                            </div>
                          </div>
                          <div class="col-lg-10">
                            <div class="form-group">
                              <span class="text-dark"><b>Update profile</b></span>
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
                            <hr>
                          </div>
                        </div>
                        <div class="ml-3">
                          <button type="submit" class="ml-5 btn bg-gradient-primary" name="update_image_user">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?php require_once 'footer.php'; ?>
