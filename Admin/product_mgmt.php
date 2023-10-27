<title>Web-based School Canteen Reservation Management System | Manage Product</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/product.php'; 
    require_once '../classes/category.php'; 
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
?>

<div class="content-wrapper">
  <?php if($page === 'create') { ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Product Add</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <form action="../forms/product_create.php" method="POST" enctype="multipart/form-data">
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Category</b></span>
                    <select class="form-control" name="cat_Id" required>
                      <option selected disabled value="">Select category</option>
                      <?php 
                        $cat = new Category();
                        $category = $cat->display_category();
                        if($category->num_rows > 0) {
                          while($row = $category->fetch_assoc()) {
                            echo '<option value="'.$row['cat_Id'].'">'.$row['catName'].'</option>';
                          }
                        } else {
                          echo '<option selected disabled value="">No category record</option>';
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product name</b></span>
                    <input type="text" class="form-control"  placeholder="Product name" name="prod_name" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Description</b></span>
                    <textarea name="prod_description" class="form-control" id="" cols="30" rows="2" placeholder="Enter product description" required></textarea>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product price</b></span>
                    <input type="number" class="form-control"  placeholder="Product price" name="price" required>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product stock</b></span>
                    <input type="number" class="form-control"  placeholder="Product stock" name="stock" required>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Ingredients</b></span>
                    <textarea name="ingredients" class="form-control" id="" cols="30" rows="2" placeholder="Enter product ingredients"></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Nutritional information</b></span>
                    <textarea name="nutritional_info" class="form-control" id="" cols="30" rows="2" placeholder="Enter nutritional_information"></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Preparation time</b></span>
                    <textarea name="preparation_time" class="form-control" id="" cols="30" rows="2" placeholder="Enter rreparation time" required></textarea>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product image</b></span>
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
              <a href="product.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="create_product" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php } else { 
    $prod_Id = $page;
    $prod = new Product();
    $row = $prod->get_product($prod_Id);
  ?>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Product Update</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10">
        <form action="../forms/product_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="prod_Id" required value="<?= $prod_Id; ?>">
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Category</b></span>
                    <select class="form-control" name="cat_Id" required>
                      <option selected disabled value="">Select category</option>
                      <?php 
                        $cat = new Category();
                        $category = $cat->display_category();
                        if($category->num_rows > 0) {
                          while($row2 = $category->fetch_assoc()) {
                            echo '<option value="' . $row2['cat_Id'] . '" ' . ($row['cat_Id'] == $row2['cat_Id'] ? 'selected' : '') . '>' . $row2['catName'] . '</option>';

                          }
                        } else {
                          echo '<option selected disabled value="">No category record</option>';
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product name </b></span>
                    <input type="text" class="form-control"  placeholder="Product name" name="prod_name" required value="<?= $row['prod_name']; ?>">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Description</b></span>
                    <textarea name="prod_description" class="form-control" id="" cols="30" rows="2" placeholder="Enter product description" required><?= $row['prod_description']; ?></textarea>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product price</b></span>
                    <input type="number" class="form-control"  placeholder="Product price" name="price" required value="<?= $row['price']; ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product stock</b></span>
                    <input type="number" class="form-control"  placeholder="Product stock" name="stock" required value="<?= $row['stock']; ?>">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Ingredients</b></span>
                    <textarea name="ingredients" class="form-control" id="" cols="30" rows="2" placeholder="Enter product ingredients"><?= $row['ingredients']; ?></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Nutritional information</b></span>
                    <textarea name="nutritional_info" class="form-control" id="" cols="30" rows="2" placeholder="Enter nutritional_information"><?= $row['nutritional_info']; ?></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Preparation time</b></span>
                    <textarea name="preparation_time" class="form-control" id="" cols="30" rows="2" placeholder="Enter rreparation time" required><?= $row['preparation_time']; ?></textarea>
                  </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-12">
                  <div class="form-group">
                    <span class="text-dark"><b>Product image</b></span>
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
              <a href="product.php" class="btn btn-secondary"><i class="fa-solid fa-backward"></i> Cancel</a>
              <button type="submit" class="btn btn-primary float-right" name="update_product" id="submit_button"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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