<?php 
require '../includes/config.php';
require '../classes/category.php';

$cat = new Category();

// DELETE CATEGORY - CATEGORY_UPDATE_DELETE.PHP
if (isset($_POST['delete_category'])) {
    $cat_Id  = $_POST['cat_Id'];
    $result = $cat->delete_category($cat_Id);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../Admin/category.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../Admin/category.php'); 
    }
}



?>