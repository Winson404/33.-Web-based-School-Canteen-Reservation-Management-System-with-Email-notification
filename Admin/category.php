<title>Web-based School Canteen Reservation Management System | Category records</title>
<?php 
    require_once 'sidebar.php'; 
    require '../classes/category.php';
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Category records</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="card card-primary card-outline">
              <?php 
                if(isset($_GET['cat_Id'])) {
                  $cat_Id = $_GET['cat_Id'];
                  $cat = new Category();
                  $row = $cat->get_category($cat_Id);
              ?>
                <form action="../forms/category_update.php" method="POST">
                  <input type="hidden" class="form-control" name="cat_Id" required value="<?= $cat_Id; ?>">
                  <div class="card-header">
                    <h5>Update Category</h5>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Category name">Category name</label>
                      <input type="text" class="form-control" placeholder="Enter category name" name="catName" required value="<?= $row['catName']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="Description">Description</label>
                      <textarea name="description" class="form-control" placeholder="Enter Description" id="" cols="30" rows="3" required><?= $row['description']; ?></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" name="update_category">Submit</button>
                  </div>
                </form>
              <?php
                } else {
              ?>
                <form action="../forms/category_create.php" method="POST">
                  <div class="card-header">
                    <h5>Add Category</h5>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Category name">Category name</label>
                      <input type="text" class="form-control" placeholder="Enter category name" name="catName" required>
                    </div>
                    <div class="form-group">
                      <label for="Description">Description</label>
                      <textarea name="description" class="form-control" placeholder="Enter Description" id="" cols="30" rows="3" required></textarea>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" name="save_category">Submit</button>
                  </div>
                </form>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5>Category records</h5>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr>
                      <th>CATEGORY NAME</th>
                      <th>DESCRIPTION</th>
                      <th>DATE ADDED</th>
                      <th>TOOLS</th>
                    </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php
                      $cat = new Category();
                      $category = $cat->display_category();
                      foreach ($category as $row) {
                    ?>
                    <tr>
                      <td><?= $row['catName'] ?></td>
                      <td><?= $row['description'] ?></td>
                      <td class="text-primary"><?php echo $row['date_added']; ?></td>
                      <td>
                        <a class="btn btn-info btn-sm" href="category.php?cat_Id=<?php echo $row['cat_Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['cat_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <?php include 'category_delete.php'; }  ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once '../includes/footer.php'; ?>