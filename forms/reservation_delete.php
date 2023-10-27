<?php 
require '../includes/config.php';
require '../classes/reservation.php';

$reserve = new Reservation();

// DELETE CATEGORY - CATEGORY_UPDATE_DELETE.PHP
if (isset($_POST['delete_reservation_customer'])) {
    $reserve_Id  = $_POST['reserve_Id'];
    $result = $reserve->delete_reservation($reserve_Id);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../User/reservation.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../User/reservation.php'); 
    }
}




?>