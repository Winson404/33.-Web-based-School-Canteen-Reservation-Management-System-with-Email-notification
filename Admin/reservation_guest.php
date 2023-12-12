<title>Web-based School Canteen Reservation Management System | Guest Reservation records</title>
<?php 
    require_once 'sidebar.php'; 
    require_once '../classes/guest.php';
?>

</style>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Guest Reservation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Guest Reservation records</li>
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
              <div class="card-header">
                <div class="card-tools mr-1">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr>
                      <th>CUSTOMER NAME</th>
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
                    $reserve = new GuestReservation();
                    $reservation = $reserve->display_reservation();
                    foreach ($reservation as $row) {
                    $subtotal = $row['price'] * $row['prod_qty'];
                    $totalSubtotal += $subtotal;
                    ?>
                    <tr>
                    <td><a href="customer_view.php?cust_Id=<?= $row['guest_Id'] ?>"><?php echo ucwords($row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']); ?></a></td>
                    <td><?php echo $row['prod_name']; ?></td>
                    <td><?= $row['catName'] ?></td>
                    <td><?= $row['prod_qty'] ?></td>
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
                        <a class="btn btn-primary btn-sm" href="product_view.php?prod_Id=<?php echo $row['prod_Id']; ?>"><i class="fas fa-folder"></i> View</a>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['guest_Id']; ?>" <?php if($row['status'] == 2) { echo 'disabled'; } ?>><i class="fas fa-pencil-alt"></i> Edit status</button>
                      </td>
                    </tr>
                    <?php include 'reservation_update_guest.php'; } ?>
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
    </section>
</div>
<?php require_once '../includes/footer.php'; ?>