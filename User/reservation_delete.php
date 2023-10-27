<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['reserve_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cart-plus fa-lg"></i> Delete Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../forms/reservation_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['reserve_Id']; ?>" name="reserve_Id">
          <h6 class="text-center">Delete reservation record?</h6>
        </div>
        <div class="modal-footer alert-light">
          <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
          <button type="submit" class="btn bg-danger" name="delete_reservation_customer"><i class="fas fa-trash"></i> Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>