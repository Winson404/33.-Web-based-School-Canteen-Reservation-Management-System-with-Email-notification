  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered p-3">
      <div class="modal-content">
         <div class="modal-header bg-light">
            <img src="../assets/images/ctu-logo copy.jpg" alt="" class="d-block m-auto img-circle img-fluid shadow-sm" width="100">
        </div>
        <div class="modal-body p-5">
            <h6 class="text-center">Your session has timed out. Please login again</h6>
        </div>
        <div class="modal-footer alert-light">
          <a href="../logout.php" type="button" class="btn btn-secondary">Close</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <!-- <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Mission</label>
        <p class="text-sm text-justify text-muted">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Veniam doloremque hic nam corrupti. Soluta ea, vero! Tenetur voluptatem rem, dolor quasi itaque inventore id nisi adipisci sunt, asperiores aut, provident?</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Vision</label>
        <p class="text-sm text-justify text-muted">Lorem ipsum, dolor sit, amet consectetur adipisicing elit. Veniam doloremque hic nam corrupti. Soluta ea, vero! Tenetur voluptatem rem, dolor quasi itaque inventore id nisi adipisci sunt, asperiores aut, provident?</p>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 bg-white">
        <label>Contact Us</label>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-phone"></i> +63 9123456789</p>
        <p class="text-sm text-justify text-muted"><i class="fa-solid fa-envelope"></i> admin@gmail.com</p>
      </div>

    </div>
    <div class="dropdown-divider"></div> -->
    <strong>Copyright &copy; 2023 <a href="#">Web-based School Canteen Reservation Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>

<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>


<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "pdf", "print"]
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });





  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });



  // SHOW/HIDE PASSWORDS
    function showPassword() {
      var x = document.getElementById("Old password");
      var y = document.getElementById("password");
      var z = document.getElementById("cpassword");
      if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
        z.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
        z.type = "password";
      }
   }


  // AUTO LOGOUT AFTER 10 MINS
  setInterval(function() {
    var lastActive = <?php echo $_SESSION['last_active']; ?>;
    var currentTime = new Date().getTime() / 1000;
    var inactiveTime = currentTime - lastActive;
    if (inactiveTime > 600) { // inactivity period is 10 seconds
        
        $('#approve').modal({
          backdrop: 'static',
          keyboard: false
        }).modal('show');

        setTimeout(function() {
          window.location.href = '../logout.php';
        }, 15000); 

    }
  }, 1000); // check every second



  // GET IMAGE PREVIEW
  function getImagePreview(event) {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }




  // LETTERS ONLY
  function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
  }




  // EMAIL VALIDATION
  function validation() {
    var email = document.getElementById("email").value;
    var pattern = /.+@(gmail\.com|ctu\.edu\.ph)$/;
    // var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('submit_button').disabled = false;
        document.getElementById('submit_button').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com or ctu.edu.ph';
        document.getElementById('submit_button').disabled = true;
        document.getElementById('submit_button').style.opacity = (0.4);
        
    }
  }





  // AUTO CALCULATE AGE
  function calculateAge() {
      var birthdate = new Date(document.getElementById("birthdate").value);
      var now = new Date();

      var ageInMilliseconds = now.getTime() - birthdate.getTime();
      var ageInSeconds = ageInMilliseconds / 1000;
      var ageInMinutes = ageInSeconds / 60;
      var ageInHours = ageInMinutes / 60;
      var ageInDays = ageInHours / 24;
      var ageInWeeks = ageInDays / 7;
      var ageInMonths = ageInDays / 30.44;
      var ageInYears = ageInDays / 365;

      var age = Math.floor(ageInYears);

      if (ageInDays >= 365) {
        var ageDescription = age + " year" + (age > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 30) {
        var ageDescription = Math.floor(ageInMonths) + " month" + (Math.floor(ageInMonths) > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 7) {
        var ageDescription = Math.floor(ageInWeeks) + " week" + (Math.floor(ageInWeeks) > 1 ? "s" : "") + " old";
      } else {
        var ageDescription = Math.floor(ageInDays) + " day" + (Math.floor(ageInDays) > 1 ? "s" : "") + " old";
      }
      document.getElementById("txtage").value = ageDescription;
  }





  // PASSWORD MATCHING
  function validate_password() {
    var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('cpassword').value;
    if (pass != confirm_pass) {
      document.getElementById('wrong_pass_alert').style.color = '#e60000';
      document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
      document.getElementById('submit_button').disabled = true;
      document.getElementById('submit_button').style.opacity = (0.4);
    } else {
      document.getElementById('wrong_pass_alert').style.color = 'green';
      document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
      document.getElementById('submit_button').disabled = false;
      document.getElementById('submit_button').style.opacity = (1);
    }
  }





  /*SECURE PASSOWORD AND VALIDATE PASSWORD*/
  const passwordField = document.getElementById('password');
  const passwordMessage = document.getElementById('password-message');
  passwordField.addEventListener('input', () => {
    const password = passwordField.value;
    let errors = [];

    // Check password length
    if (password.length < 8) {
      errors.push('Password must be at least 8 characters long.');
    }

    // Check if password contains a special character
    if (!/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {
      errors.push('Password must contain at least one special character.');
    }

    // Display error messages if any
    if (errors.length > 0) {
      passwordMessage.innerText = errors.join(' ');
      passwordMessage.classList.add('error');
    } else {
      passwordMessage.innerText = '';
      passwordMessage.classList.remove('error');
    }
  });


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

</body>
</html>
