<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['actId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> Update Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../forms/announcement_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="actId" required value="<?php echo $row['actId']; ?>">
          <div class="form-group">
            <span class="text-dark"><b>Announcement title</b></span>
            <textarea name="actName" class="form-control" id="" cols="30" rows="5" placeholder="Enter announcement here..." required><?php echo $row['actName']; ?></textarea>
          </div>
          <div class="form-group">
            <span class="text-dark"><b>Announcement date</b></span>
            <input type="date" class="form-control" name="actDate" required value="<?php echo $row['actDate']; ?>">
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-primary" name="update_activity"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['actId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-bell"></i> Delete announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../forms/announcement_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['actId']; ?>" name="actId">
          <h6 class="text-center">Delete announcement record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-danger" name="delete_announcement"><i class="fas fa-trash"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>

