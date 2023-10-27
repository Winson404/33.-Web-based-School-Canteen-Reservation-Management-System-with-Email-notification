<?php 
require '../includes/config.php';
require '../classes/reservation.php';

$reserve = new Reservation();

// DELETE CATEGORY - CATEGORY_UPDATE_DELETE.PHP
if (isset($_POST['update_status_reservation'])) {
    $reserve_Id = $_POST['reserve_Id'];
    $status     = $_POST['status'];
    $result     = $reserve->update_status_reservation($reserve_Id, $status);
	// var_dump($result);
    if($result) {
        displayUpdateMessage($result, "Record has been updated.", '../Admin/reservation.php');
    } else {
        displayErrorMessage("Something went wrong while updating the information.", '../Admin/reservation.php'); 
    }
}




?>