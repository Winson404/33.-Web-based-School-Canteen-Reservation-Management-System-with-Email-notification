<?php 
require '../includes/config.php';
require '../classes/customer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require '../vendor/PHPMailer/src/Exception.php';
// require '../vendor/PHPMailer/src/PHPMailer.php';
// require '../vendor/PHPMailer/src/SMTP.php';
if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }

$customer = new Customer();

// REGISTER USER - REGISTER.PHP
if (isset($_POST['register_user'])) {

	$user_type       = $_POST['user_type'];
    $yr_section      = $_POST['yr_section'];
	$teacherPosition = $_POST['teacherPosition'];
	$firstname       = $_POST['firstname'];
	$middlename      = $_POST['middlename'];
	$lastname        = $_POST['lastname'];
	$suffix          = $_POST['suffix'];
	$dob             = $_POST['dob'];
	$age             = $_POST['age'];
	$gender		     = $_POST['gender'];
	$civilstatus     = $_POST['civilstatus'];
	$email           = $_POST['email'];
	$contact         = $_POST['contact'];
	$address         = $_POST['address'];
	$password        = md5($_POST['password']);
	// $HashedPassword  = password_hash($password, PASSWORD_BCRYPT);
	$fileToUpload    = basename($_FILES["fileToUpload"]["name"]);

	if ($customer->check_email_exists($email)) {
        displayErrorMessage("Email already exists!", '../register.php');
    } else {
        $target_dir = '../assets/images-users/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check == false) {
            displayErrorMessage("File is not an image.", '../register.php');
            $uploadOk = 0;
        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
            displayErrorMessage("File must be up to 500KB in size.", '../register.php');
            $uploadOk = 0;
        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
            $uploadOk = 0;
        } elseif ($uploadOk == 0) {
            displayErrorMessage("Your file was not uploaded.", '../register.php');
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            	$result = $customer->create_customer($user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $password, $fileToUpload);
			    // var_dump($result);
			    if($result) {
			    	displaySaveMessage($result, '../register.php');
			    } else {
			    	displayErrorMessage("Something went wrong while saving the information.", '../register.php'); 
			    }
            } else {
            	displayErrorMessage("There was an error uploading your profile picture.", '../register.php'); 
            }
        }
    }
}


// CREATE CUSTOMER - CUSTOMER_MGMT.PHP
if (isset($_POST['create_customer'])) {

	$user_type       = $_POST['user_type'];
    $yr_section      = $_POST['yr_section'];
	$teacherPosition = $_POST['teacherPosition'];
	$firstname       = $_POST['firstname'];
	$middlename      = $_POST['middlename'];
	$lastname        = $_POST['lastname'];
	$suffix          = $_POST['suffix'];
	$dob             = $_POST['dob'];
	$age             = $_POST['age'];
	$gender		     = $_POST['gender'];
	$civilstatus     = $_POST['civilstatus'];
	$email           = $_POST['email'];
	$contact         = $_POST['contact'];
	$address         = $_POST['address'];
	$password        = md5($_POST['password']);
	// $HashedPassword  = password_hash($password, PASSWORD_BCRYPT);
	$fileToUpload    = basename($_FILES["fileToUpload"]["name"]);

	if ($customer->check_email_exists($email)) {
        displayErrorMessage("Email already exists!", '../Admin/customer_mgmt.php?page=create');
    } else {
        $target_dir = '../assets/images-users/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check == false) {
            displayErrorMessage("File is not an image.", '../Admin/customer_mgmt.php?page=create');
            $uploadOk = 0;
        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
            displayErrorMessage("File must be up to 500KB in size.", '../Admin/customer_mgmt.php?page=create');
            $uploadOk = 0;
        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
            $uploadOk = 0;
        } elseif ($uploadOk == 0) {
            displayErrorMessage("Your file was not uploaded.", '../Admin/customer_mgmt.php?page=create');
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            	$result = $customer->create_customer($user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $password, $fileToUpload);
			    // var_dump($result);
			    if($result) {
			    	displaySaveMessage($result, '../Admin/customer_mgmt.php?page=create');
			    } else {
			    	displayErrorMessage("Something went wrong while saving the information.", '../Admin/customer_mgmt.php?page=create'); 
			    }
            } else {
            	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/customer_mgmt.php?page=create'); 
            }
        }
    }
}



?>