<?php 
require_once 'sidebar.php';

$connection = mysqli_connect("localhost","root","","reservation");
$filename = date("Y-m-d").".sql";
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  
    if($result){
      echo 'SUCCESS';
    }
}
fclose($handle);

?>

<script src="../sweetalert2.min.js"></script>
<!-- SUCCESS -->
<?php 
  echo ' <script type="text/javascript">
      swal ({
        title: "Good job!",
        text: "Your Database has been restored succesfully!",
        icon: "success",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Loading...",
        timer: 3000
      });
    </script>';
 $_SESSION['success']   = "Good job!";

?>


       

  <div class="content-wrapper" >
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <?php if(isset($_SESSION['success'])) { ?> 
                 <h3 class="text-success text-center" id="alert"><b>Database restoration success!</b></h3>
                <?php unset($_SESSION['success']); } ?>
                 <img src="../images/db.gif" alt="" class="img-fluid" width="500" style=" display: block; margin-left: auto;margin-right: auto;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<?php include '../includes/footer.php'; ?>

