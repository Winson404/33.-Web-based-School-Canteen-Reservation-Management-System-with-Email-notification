<title>Web-based School Canteen Reservation Management System | Reservation information</title>
<?php 
    require_once 'header.php'; 
    require_once '../classes/reservation.php';
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

  .quantity-control {
    display: flex;
    align-items: center;
  }

  .quantity-minus,
  .quantity-plus{
    color: #0033cc;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    text-align: center;
    cursor: pointer;
    font-size: 16px;
    margin: 0 4px;
  }

  .quantity-done{
    color: #f2f2f2;
    border: none;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    text-align: center;
    cursor: pointer;
    font-size: 16px;
    margin: 0 4px;
  }


</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Food Reservations</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Food Reservation info</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="card">
        <div class="card-header p-2">
          <div class="card-tools mr-1">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body ">
          <table id="example1" class="table table-bordered table-hover text-sm text-center">
            <thead>
              <tr>
                <th>FOOD IMAGE</th>
                <th>FOOD NAME</th>
                <th>FOOD CATEGORY</th>
                <th>QTY</th>
                <th>PRICE</th>
                <th>SUBTOTAL</th>
                <th>STATUS</th>
                <th>TOOLS</th>
              </tr>
            </thead>
            <tbody id="users_data">
              <?php
              $totalSubtotal = 0;
              $reserve = new Reservation();
              $reservation = $reserve->display_reservation($id);
              foreach ($reservation as $row) {
              $subtotal = $row['price'] * $row['qty'];
              $totalSubtotal += $subtotal;
              ?>
              <tr>
                <td>
                  <a data-toggle="modal" data-target="#viewphoto<?php echo $row['user_Id']; ?>">
                    <img src="../assets/images-product/<?php echo $row['prod_image']; ?>" alt="" width="25" height="25" class="img-circle d-block m-auto">
                  </a href="">
                </td>
                <td><?php echo $row['prod_name']; ?></td>
                <td><?= $row['catName'] ?></td>
               <td>
                  <span class="quantity-control">
                    <?php if($row['status'] == 0): ?>
                      <button class="quantity-minus" data-reserve-id="<?= $row['reserve_Id']; ?>">-</button>
                      <span class="quantity-value text"><?= $row['qty'] ?></span>
                      <button class="quantity-plus" data-reserve-id="<?= $row['reserve_Id']; ?>">+</button>
                    <?php else: ?>
                      <button class="quantity-done" data-reserve-id="<?= $row['reserve_Id']; ?>">-</button>
                      <span class="quantity-value text"><?= $row['qty'] ?></span>
                      <button class="quantity-done" data-reserve-id="<?= $row['reserve_Id']; ?>">+</button>
                    <?php endif; ?>
                      
                  </span>
              </td>
              <td>₱<?php echo number_format($row['price'], 2, '.', ','); ?></td>
              <td>₱<span class="subtotal"><?php echo number_format($subtotal, 2, '.', ','); ?></span></td>

                <td>
                  <?php if($row['status'] == 0): ?>
                    <span class="badge badge-warning pt-1">Pending</span>
                  <?php elseif($row['status'] == 1): ?>
                    <span class="badge badge-success pt-1">Approved</span>
                  <?php elseif($row['status'] == 2): ?>
                    <span class="badge badge-info pt-1">Delivered</span>
                  <?php else: ?>
                    <span class="badge badge-danger pt-1">Unavailable</span>
                  <?php endif; ?>
                </td> 
                <td>
                  <a class="btn btn-primary btn-sm" href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>&&reserve_Id=<?php echo $row['reserve_Id']; ?>"><i class="fas fa-folder"></i> View</a>
                  <?php if($row['status'] == 0): ?>
                    <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['reserve_Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                  <?php else: ?>
                    <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['reserve_Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
                  <?php endif; ?>
                </td>
              </tr>
              <?php include 'reservation_delete.php'; } ?>
            </tbody>
             <tfoot id="total-foot">
              <tr>
                <td colspan="5">Total:</td>
                <td><strong>₱<?php echo number_format($totalSubtotal, 2, '.', ','); ?></strong></td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  
<?php require_once 'footer.php'; ?>

<script>
  $(document).ready(function() {
    $('.quantity-minus').on('click', function() {
        var reserveId = $(this).data('reserve-id');
        var quantityValue = $(this).siblings('.quantity-value');

        $.ajax({
            type: 'POST',
            url: '../forms/reservation_qty_update.php',
            data: {
                reserveId: reserveId,
                action: 'minus'
            },
            success: function(response) {
                var result = JSON.parse(response);
                quantityValue.text(result.newQty);
                location.reload();
            }
        });
    });

     $('.quantity-plus').on('click', function() {
        var reserveId = $(this).data('reserve-id');
        var quantityValue = $(this).siblings('.quantity-value');

        // Make an AJAX request to update the quantity
        $.ajax({
            type: 'POST',
             url: '../forms/reservation_qty_update.php', // Replace with the actual URL to your PHP script
            data: {
                reserveId: reserveId,
                action: 'plus' // Indicate the action you want to perform (e.g., minus)
            },
            success: function(response) {
                // Update the quantity value on success
                var result = JSON.parse(response);
                quantityValue.text(result.newQty);
                location.reload();
            }
        });
    });
});

</script>

