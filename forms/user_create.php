<?php 
require '../includes/config.php';
require '../classes/user.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require '../vendor/PHPMailer/src/Exception.php';
// require '../vendor/PHPMailer/src/PHPMailer.php';
// require '../vendor/PHPMailer/src/SMTP.php';
if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }

$person = new User();

// CREATE ADMIN - ADMIN/ADMIN_MGMT.PHP
if (isset($_POST['create_admin'])) {
	$user_type        = $_POST['user_type'];
    $firstname        = $_POST['firstname'];
	$middlename       = $_POST['middlename'];
	$lastname         = $_POST['lastname'];
	$suffix           = $_POST['suffix'];
	$dob              = $_POST['dob'];
	$age              = $_POST['age'];
	$birthplace       = $_POST['birthplace'];
	$gender           = $_POST['gender'];
	$civilstatus      = $_POST['civilstatus'];
	$occupation       = $_POST['occupation'];
	$religion		  = $_POST['religion'];
	$email		      = $_POST['email'];
	$contact		  = $_POST['contact'];
	$house_no         = $_POST['house_no'];
	$street_name      = $_POST['street_name'];
	$purok            = $_POST['purok'];
	$zone             = $_POST['zone'];
	$barangay         = $_POST['barangay'];
	$municipality     = $_POST['municipality'];
	$province         = $_POST['province'];
	$region           = $_POST['region'];
	$password         = md5($_POST['password']);
	// $HashedPassword   = password_hash($password, PASSWORD_BCRYPT);
	$file             = basename($_FILES["fileToUpload"]["name"]);

	if ($person->check_email_exists($email)) {
        displayErrorMessage("Email already exists!", '../Admin/admin_mgmt.php?page=create');
    } else {
        $target_dir = '../assets/images-users/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check == false) {
            displayErrorMessage("File is not an image.", '../Admin/admin_mgmt.php?page=create');
            $uploadOk = 0;
        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
            displayErrorMessage("File must be up to 500KB in size.", '../Admin/admin_mgmt.php?page=create');
            $uploadOk = 0;
        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
            $uploadOk = 0;
        } elseif ($uploadOk == 0) {
            displayErrorMessage("Your file was not uploaded.", '../Admin/admin_mgmt.php?page=create');
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            	$result = $person->create_user($firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file, $password, $user_type);
			    // var_dump($result);
			    if($result) {
			    	displaySaveMessage($result, '../Admin/admin_mgmt.php?page=create');
			    } else {
			    	displayErrorMessage("Something went wrong while saving the information.", '../Admin/admin_mgmt.php?page=create'); 
			    }
            } else {
            	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/admin_mgmt.php?page=create'); 
            }
        }
    }
}


?>