<?php 
require '../includes/config.php';
require '../classes/reservation.php';

$reserve = new Reservation();

// CREATE RESERVATION- USER/INDEX.PHP
if (isset($_POST['reserve_button'])) {
    $cust_Id = $_POST['cust_Id'];
    $prod_Id = $_POST['prod_Id'];
    $qty     = $_POST['qty'];

    // Check if a reservation with the given prod_Id, cust_Id, and status=0 exists
    $existingReservation = $reserve->get_existing_reservation($cust_Id, $prod_Id);

    if ($existingReservation) {
        $row = $existingReservation->fetch_assoc(); // Fetch the data as an associative array
        $existingQty = $row['qty'];
           // Update the quantity of the existing reservation
        $updatedQty = $existingQty + $qty;
        $result = $reserve->update_reservation($cust_Id, $prod_Id, $updatedQty);

        if($result) {
            displayUpdateMessage($result, "Record has been updated.", '../User/index.php');
        } else {
            displayErrorMessage("Something went wrong while updating the information.", '../User/index.php'); 
        }
    } else {
        // Create a new reservation
        $result = $reserve->create_reservation($cust_Id, $prod_Id, $qty);
        if($result) {
            displaySaveMessage($result, '../User/index.php');
        } else {
            displayErrorMessage("Something went wrong while saving the information.", '../User/index.php'); 
        }
    }
}

?>