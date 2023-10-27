<title>Web-based School Canteen Reservation Management System | Food Products information</title>
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
            <h1 class="m-0"> All Food Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Food Product info</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-start">
          <?php 
            if(isset($_POST['search_button'])) {
              $search_product = $_POST['search_product'];
              $prod = new Product();
              $product = $prod->display_product_search($search_product);
              if (count($product) > 0) {
                foreach ($product as $row) {
          ?>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        </div>
                        <a href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>">
                          <div class="card-body" style="margin-bottom: -30px;">
                            <div class="img">
                              <img src="../assets/images-product/<?php echo $row['prod_image']; ?>" alt="" class="img-fluid product-image">
                            </div>
                            <p>
                              <?php echo ucwords($row['prod_name']); ?><br> 
                              <span class="text-sm text-danger">₱<?php echo number_format($row['price'], 2, '.', ','); ?></span> <br>
                            </p>
                          </div>
                        </a>
                        <div class="card-footer">
                          <form action="../forms/reservation_create.php" method="POST">
                            <div class="d-flex justify-content-between align-items-center">
                              <button type="submit" class="btn btn-info btn-sm" name="reserve_button"><i class="fas fa-cart-plus fa-lg"></i> Reserve</button>
                              <input type="hidden" class="form-control text-center" value="<?= $id; ?>" required name="cust_Id">
                              <input type="hidden" class="form-control text-center" value="<?= $row['prod_Id']; ?>" required name="prod_Id">
                              <input type="number" min="1" class="form-control text-center" placeholder="qty" style="width: 90px;" name="qty" required>
                            </div>
                          </form>
                        </div>
                      </div>
                  </div>

          <?php } //END OF WHILE LOOP ?>  

                <div class="col-12 text-center mt-3">
                  <p>You have reached the end of the list</p>
                  <hr>
                </div> 
                
          <?php  } /*END OF IF MYSQLI_NUM_ROWS > 0*/
          else { ?>

              <div class="text-center d-block m-auto">
                <img src="images/hack-khaby.gif" alt="No results found" class="img-fluid" width="250">
                <p class="mt-2">Sorry, no results found.</p>
              </div>
          <?php } } /*END OF IF ISSET FUNCTION*/
          else { 
         
            $prod = new Product();
            $product = $prod->display_product();
            if($product->num_rows > 0) {
              while($row=$product->fetch_assoc()) {
          ?>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                      <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        </div>
                        <a href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>">
                          <div class="card-body" style="margin-bottom: -30px;">
                            <div class="img">
                              <img src="../assets/images-product/<?php echo $row['prod_image']; ?>" alt="" class="img-fluid product-image">
                            </div>
                            <p>
                              <?php echo ucwords($row['prod_name']); ?><br>
                              <span class="text-sm text-danger">₱<?php echo number_format($row['price'], 2, '.', ','); ?></span> <br>
                            </p>
                          </div>
                        </a>
                        <div class="card-footer">
                          <form action="../forms/reservation_create.php" method="POST">
                            <div class="d-flex justify-content-between align-items-center">
                              <button type="submit" class="btn btn-info btn-sm" name="reserve_button"><i class="fas fa-cart-plus fa-lg"></i> Reserve</button>
                              <input type="hidden" class="form-control text-center" value="<?= $id; ?>" required name="cust_Id">
                              <input type="hidden" class="form-control text-center" value="<?= $row['prod_Id']; ?>" required name="prod_Id">
                              <input type="number" min="1" class="form-control text-center" placeholder="qty" style="width: 90px;" name="qty" required>
                            </div>
                          </form>
                        </div>
                      </div>
                  </div>

          <?php } //END OF WHILE LOOP ?>  

                <div class="col-12 text-center mt-3">
                  <p>You have reached the end of the list</p>
                  <hr>
                </div> 
                
          <?php  } /*END OF IF MYSQLI_NUM_ROWS > 0*/
          else { ?>

              <div class="text-center d-block m-auto">
                <img src="images/hack-khaby.gif" alt="No results found" class="img-fluid" width="250">
                <p class="mt-2">No record found.</p>
              </div>

          <?php } } //END SEARCH  ?>

        </div>
      </div>
    </div>
  </div>
  
<?php require_once 'footer.php'; ?>
