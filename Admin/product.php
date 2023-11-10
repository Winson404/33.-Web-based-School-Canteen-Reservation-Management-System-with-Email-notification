<title>Web-based School Canteen Reservation Management System | Product records</title>
<?php 
    require_once 'sidebar.php'; 
    require '../classes/product.php';
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product records</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header p-2">
                <a href="product_mgmt.php?page=create" class="btn btn-sm bg-primary ml-2"><i class="fa-sharp fa-solid fa-square-plus"></i> New Product</a>

                <div class="card-tools mr-1 mt-3">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr>
                      <th>IMAGE</th>
                      <th>CATEGORY</th>
                      <th>PRODUCT NAME</th>
                      <th>PRICE</th>
                      <th>PREPARATION TIME</th>
                      <th>TOOLS</th>
                    </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php
                      $prod = new Product();
                      $product = $prod->display_product();
                      foreach ($product as $row) {
                    ?>
                    <tr>
                      <td>
                        <a data-toggle="modal" data-target="#viewphoto<?php echo $row['prod_Id']; ?>">
                          <img src="../assets/images-product/<?php echo $row['prod_image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                        </a href="">
                      </td>
                      <td><?= $row['catName'] ?></td>
                      <td><?= $row['prod_name'] ?></td>
                      <td><?= '₱' . number_format($row['price'], 2) ?></td>
                      <td><?= $row['preparation_time'] ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>"><i class="fas fa-folder"></i> View</a>
                        <a class="btn btn-info btn-sm" href="product_mgmt.php?page=<?php echo $row['prod_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['prod_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        
                      </td>
                    </tr>
                    <?php include 'product_delete.php'; }  ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once '../includes/footer.php'; ?>