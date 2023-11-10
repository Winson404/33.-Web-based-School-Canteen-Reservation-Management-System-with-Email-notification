<?php 
require '../includes/config.php';
require '../classes/product.php';

$product = new Product();

// UPDATE PRODUCT - ADMIN/PRODUCT_MGMT.PHP
if (isset($_POST['update_product'])) {
    $prod_Id          = $_POST['prod_Id'];
    $cat_Id           = $_POST['cat_Id'];
	$prod_name        = $_POST['prod_name'];
	$prod_description = $_POST['prod_description'];
	$price            = $_POST['price'];
	$stock            = $_POST['stock'];
	$ingredients      = $_POST['ingredients'];
	$nutritional_info = $_POST['nutritional_info'];
	$preparation_time = $_POST['preparation_time'];
	$prod_image       = basename($_FILES["fileToUpload"]["name"]);

    if(empty($prod_image)) {
        if ($product->update_check_product_exists($prod_Id, $prod_name)) {
        displayErrorMessage("Product already exists!", '../Admin/product_mgmt.php?page='.$prod_Id);
        } else {
            $result = $product->update_product($prod_Id, $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image);
            // var_dump($result);
            if($result) {
                displayUpdateMessage($result, "Product has been updated.", '../Admin/product_mgmt.php?page='.$prod_Id);
            } else {
                displayErrorMessage("Something went wrong while saving the information.", '../Admin/product_mgmt.php?page='.$prod_Id); 
            }
        }
    } else {
    	if ($product->update_check_product_exists($prod_Id, $prod_name)) {
            displayErrorMessage("Product already exists!", '../Admin/product_mgmt.php?page='.$prod_Id);
        } else {
            $target_dir = '../assets/images-product/';
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check == false) {
                displayErrorMessage("File is not an image.", '../Admin/product_mgmt.php?page='.$prod_Id);
                $uploadOk = 0;
            } elseif ($_FILES["fileToUpload"]["size"] > 1000000) {
                displayErrorMessage("File must be up to 500KB in size.", '../Admin/product_mgmt.php?page='.$prod_Id);
                $uploadOk = 0;
            } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
                $uploadOk = 0;
            } elseif ($uploadOk == 0) {
                displayErrorMessage("Your file was not uploaded.", '../Admin/product_mgmt.php?page='.$prod_Id);
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                	$result = $product->update_product($prod_Id, $cat_Id, $prod_name, $prod_description, $price, $stock, $ingredients, $nutritional_info, $preparation_time, $prod_image);
    			    // var_dump($result);
    			    if($result) {
    			    	displayUpdateMessage($result, "Product has been updated.", '../Admin/product_mgmt.php?page='.$prod_Id);
    			    } else {
    			    	displayErrorMessage("Something went wrong while saving the information.", '../Admin/product_mgmt.php?page='.$prod_Id); 
    			    }
                } else {
                	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/product_mgmt.php?page='.$prod_Id); 
                }
            }
        }
    }
}

?>