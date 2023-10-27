<?php 
require '../includes/config.php';
require '../classes/category.php';

$category = new Category();

// CREATE CATEGORY - CATEGORY.PHP
if (isset($_POST['save_category'])) {
    $catName     = $_POST['catName'];
	$description = $_POST['description'];
	
    if ($category->check_category_exists($catName)) {
        displayErrorMessage("Category already exists!", '../Admin/category.php');
    } else {
        $result = $category->create_category($catName, $description);
        // var_dump($result);
        if($result) {
            displaySaveMessage($result, '../Admin/category.php');
        } else {
            displayErrorMessage("Something went wrong while saving the information.", '../Admin/category.php'); 
        }
    }
}

?>