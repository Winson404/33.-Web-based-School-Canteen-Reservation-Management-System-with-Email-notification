<?php 
require '../includes/config.php';
require '../classes/category.php';

$category = new Category();

// UPDATE CATEGORY - CATEGORY.PHP
if (isset($_POST['update_category'])) {
    $cat_Id      = $_POST['cat_Id'];
    $catName     = $_POST['catName'];
	$description = $_POST['description'];
	
    if ($category->update_check_category_exists($cat_Id, $catName)) {
        displayErrorMessage("Category already exists!", '../Admin/category.php');
    } else {
        $result = $category->update_category($cat_Id, $catName, $description);
        // var_dump($result);
        if($result) {
            displayUpdateMessage($result, "Category has been updated.", '../Admin/category.php?cat_Id='.$cat_Id);
        } else {
            displayErrorMessage("Something went wrong while saving the information.", '../Admin/category.php?cat_Id='.$cat_Id); 
        }
    }
}

?>