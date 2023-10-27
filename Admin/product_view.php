<title>Web-based School Canteen Reservation Management System | Product info</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/product.php'; 
    if(isset($_GET['prod_Id'])) {
    $prod_Id = $_GET['prod_Id'];

    $prod = new Product();
    $row = $prod->get_product($prod_Id);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Product info</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"><?= $row['prod_name'] ?></h3>
            <div class="col-12">
              <img src="../assets/images-product/<?php echo $row['prod_image']; ?>" class="product-image" alt="Product Image">
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3"><?= $row['prod_name'] ?></h3>
            <p><?= $row['prod_description'] ?></p>

            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">
                <?= '₱' . number_format($row['price'], 2) ?>
              </h2>
              <h4 class="mt-0">
                <small>Price </small>
              </h4>
              <small>Date added: <?= date("F d, Y h:i:s A", strtotime($row['date_added'])) ?></small>
            </div>

           <!--  <div class="mt-4">
              <div class="btn btn-primary btn-lg btn-flat">
                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                Add to Cart
              </div>

              <div class="btn btn-default btn-lg btn-flat">
                <i class="fas fa-heart fa-lg mr-2"></i>
                Add to Wishlist
              </div>
            </div>

            <div class="mt-4 product-share">
              <a href="#" class="text-gray">
                <i class="fab fa-facebook-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fab fa-twitter-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-envelope-square fa-2x"></i>
              </a>
              <a href="#" class="text-gray">
                <i class="fas fa-rss-square fa-2x"></i>
              </a>
            </div> -->

          </div>
        </div>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Category</a>
              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Product details</a>
              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Other details</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <h4><?= $row['catName'] ?></h4>
              <p><?= $row['description'] ?></p>
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
              <h4><?= $row['prod_name'] ?></h4>
              <p>Description: <?= $row['prod_description'] ?></p>
            </div>
            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
              <p><b>Stock:</b> <?= $row['stock'] ?></p>
              <p><b>Ingredients:</b> <?= $row['ingredients'] ?></p>
              <p><b>Nutritional info:</b> <?= $row['nutritional_info'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php }  else { require_once '../includes/404.php'; } ?>
<br>
<br>
<br>
<?php require_once '../includes/footer.php'; ?>