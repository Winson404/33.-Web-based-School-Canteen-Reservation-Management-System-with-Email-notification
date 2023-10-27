<?php 
require '../includes/config.php';
require '../classes/product.php';

$prod = new Product();

// DELETE ANNOUNCEMENT - ANNOUNCEMENT_UPDATE_DELETE.PHP
if (isset($_POST['delete_product'])) {
    $prod_Id  = $_POST['prod_Id'];
    $result = $prod->delete_product($prod_Id);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../Admin/product.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../Admin/product.php'); 
    }
}



?>