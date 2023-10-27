<?php 
require '../includes/config.php';
require '../classes/customer.php';

$customer = new Customer();


// DELETE CUSTOMER - CUSTOMER_UPDATE_DELETE.PHP
if (isset($_POST['delete_customer'])) {
    $cust_Id  = $_POST['cust_Id'];
    $result = $customer->delete_customer($cust_Id);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../Admin/customer.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../Admin/customer.php'); 
    }
}



?>