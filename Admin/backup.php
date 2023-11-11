<?php 

require_once 'sidebar.php';

$connection = mysqli_connect("localhost","root","","reservation");
$tables = array();
$result = mysqli_query($connection,"SHOW TABLES");
while($row = mysqli_fetch_row($result)){
  $tables[] = $row[0];
}
$return = '';
foreach($tables as $table){
  $result = mysqli_query($connection,"SELECT * FROM ".$table);
  $num_fields = mysqli_num_fields($result);
  
  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE ".$table));
  $return .= "\n\n".$row2[1].";\n\n";
  
  for($i=0;$i<$num_fields;$i++){
    while($row = mysqli_fetch_row($result)){
      $return .= "INSERT INTO ".$table." VALUES(";
      for($j=0;$j<$num_fields;$j++){
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
        else{ $return .= '""';}
        if($j<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $return .= "\n\n\n";
}
//save file
$handle = fopen(date("Y-m-d").".sql","w+");
fwrite($handle,$return);
fclose($handle);

?>

<script src="../sweetalert2.min.js"></script>
<!-- SUCCESS -->
<?php 
  echo ' <script type="text/javascript">
      swal ({
        title: "Good job!",
        text: "Your Database has been Backed Up Succesfully!",
        icon: "success",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Loading...",
        timer: 3000
      });
    </script>';

    $_SESSION['success']   = "Good job!";
?>



  <div class="content-wrapper" style="margin-top: 70px;">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <?php if(isset($_SESSION['success'])) { ?> 
                 <h3 class="text-success text-center" id="alert"><b>Database back-up success!</b></h3>
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


