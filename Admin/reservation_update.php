<!-- DELETE -->
<div class="modal fade" id="update<?php echo $row['reserve_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cart-plus fa-lg"></i> Update Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../forms/reservation_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['reserve_Id']; ?>" name="reserve_Id">
          <div class="form-group">
            <label for="Status">Status</label>
            <select name="status" id="" class="form-control" required>
              <option value="0" <?php if($row['status'] == 0) { echo 'selected'; } ?> >Pending</option>
              <option value="1" <?php if($row['status'] == 1) { echo 'selected'; } ?> >Approved</option>
              <option value="2" <?php if($row['status'] == 2) { echo 'selected'; } ?> >Delivered</option>
              <option value="3" <?php if($row['status'] == 3) { echo 'selected'; } ?> >Unavailable</option>
            </select>
          </div>
        </div>
        <div class="modal-footer alert-light">
          <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
          <button type="submit" class="btn bg-primary" name="update_status_reservation"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>