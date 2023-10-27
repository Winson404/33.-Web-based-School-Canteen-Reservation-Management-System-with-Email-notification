<title>Web-based School Canteen Reservation Management System | Register</title>
<?php require_once 'header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-10 mt-5">
            <form action="forms/customer_create.php" method="POST" enctype="multipart/form-data">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Registration</b></a>
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
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" minlength="8">
                              <span id="password-message" class="text-bold" style="font-style: italic;font-size: 12px;color: #e60000;"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <span class="text-dark"><b>Confirm password</b></span>
                              <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password()" required minlength="8">
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
                        <div class="col-12">
                          <hr>
                          <p>Already have an account? <a href="login.php">Click here!</a></p>
                        </div>

                    </div>
                    <!-- END ROW -->
                </div>

                <div class="card-footer">
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary float-right" name="register_user" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Register</button>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

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