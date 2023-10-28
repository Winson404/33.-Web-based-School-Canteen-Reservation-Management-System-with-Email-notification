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

// UPDATE ADMIN - ADMIN/ADMIN_MGMT.PHP
if (isset($_POST['update_admin'])) {
	$user_Id      = $_POST['user_Id'];
	$user_type    = $_POST['user_type'];
    $firstname    = $_POST['firstname'];
	$middlename   = $_POST['middlename'];
	$lastname     = $_POST['lastname'];
	$suffix       = $_POST['suffix'];
	$dob          = $_POST['dob'];
	$age          = $_POST['age'];
	$birthplace   = $_POST['birthplace'];
	$gender       = $_POST['gender'];
	$civilstatus  = $_POST['civilstatus'];
	$occupation   = $_POST['occupation'];
	$religion     = $_POST['religion'];
	$email		  = $_POST['email'];
	$contact      = $_POST['contact'];
	$house_no     = $_POST['house_no'];
	$street_name  = $_POST['street_name'];
	$purok        = $_POST['purok'];
	$zone         = $_POST['zone'];
	$barangay     = $_POST['barangay'];
	$municipality = $_POST['municipality'];
	$province     = $_POST['province'];
	$region       = $_POST['region'];
	$file         = basename($_FILES["fileToUpload"]["name"]);

	if(empty($file)) {
		if ($person->update_check_email_exists($user_Id, $email)) {
	        displayErrorMessage("Email already exists!", '../Admin/admin_mgmt.php?page='.$user_Id);
	    } else {
	    	$result = $person->update_user($user_Id, $user_type, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region);
		    // var_dump($result);
		    if($result) {
		    	displayUpdateMessage($result, "Record has been updated.", '../Admin/admin_mgmt.php?page='.$user_Id);
		    } else {
		    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/admin_mgmt.php?page='.$user_Id); 
		    }
	    }
	} else {
		if ($person->update_check_email_exists($user_Id, $email)) {
	        displayErrorMessage("Email already exists!", '../Admin/admin_mgmt.php?page='.$user_Id);
	    } else {
	        $target_dir = '../assets/images-users/';
	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if ($check == false) {
	            displayErrorMessage("File is not an image.", '../Admin/admin_mgmt.php?page='.$user_Id);
	            $uploadOk = 0;
	        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
	            displayErrorMessage("File must be up to 500KB in size.", '../Admin/admin_mgmt.php?page='.$user_Id);
	            $uploadOk = 0;
	        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	            $uploadOk = 0;
	        } elseif ($uploadOk == 0) {
	            displayErrorMessage("Your file was not uploaded.", '../Admin/admin_mgmt.php?page='.$user_Id);
	        } else {
	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	$result = $person->update_user($user_Id, $user_type, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file);
				    // var_dump($result);
				    if($result) {
				    	displayUpdateMessage($result, "Record has been updated.", '../Admin/admin_mgmt.php?page='.$user_Id);
				    } else {
				    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/admin_mgmt.php?page='.$user_Id); 
				    }
	            } else {
	            	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/admin_mgmt.php?page='.$user_Id); 
	            }
	        }
	    }
	}
}


// UPDATE LOGGED IN ADMIN INFROMATION
if(isset($_POST['update_profile_info'])) {
	$user_Id      = $_POST['user_Id'];
	$firstname    = $_POST['firstname'];
	$middlename   = $_POST['middlename'];
	$lastname     = $_POST['lastname'];
	$suffix       = $_POST['suffix'];
	$dob          = $_POST['dob'];
	$age          = $_POST['age'];
	$birthplace   = $_POST['birthplace'];
	$gender       = $_POST['gender'];
	$civilstatus  = $_POST['civilstatus'];
	$occupation   = $_POST['occupation'];
	$religion     = $_POST['religion'];
	$email		  = $_POST['email'];
	$contact      = $_POST['contact'];
	$house_no     = $_POST['house_no'];
	$street_name  = $_POST['street_name'];
	$purok        = $_POST['purok'];
	$zone         = $_POST['zone'];
	$barangay     = $_POST['barangay'];
	$municipality = $_POST['municipality'];
	$province     = $_POST['province'];
	$region       = $_POST['region'];
	if ($person->update_check_email_exists($user_Id, $email)) {
        displayErrorMessage("Email already exists!", '../Admin/profile.php');
    } else {
    	$result = $person->update_user_logged_in($user_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region);
	    // var_dump($result);
	    if($result) {
	    	displayUpdateMessage($result, "Record has been updated.", '../Admin/profile.php');
	    } else {
	    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/profile.php'); 
	    }
    }
}


// UPDATE PROFILE PICTURE OF ADMIN
if(isset($_POST['update_image_admin'])) {
	$user_Id      = $_POST['user_Id'];
	$file             = basename($_FILES["fileToUpload"]["name"]);
	$target_dir = '../assets/images-users/';
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check == false) {
        displayErrorMessage("File is not an image.", '../Admin/profile.php');
        $uploadOk = 0;
    } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
        displayErrorMessage("File must be up to 500KB in size.", '../Admin/profile.php');
        $uploadOk = 0;
    } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
        $uploadOk = 0;
    } elseif ($uploadOk == 0) {
        displayErrorMessage("Your file was not uploaded.", '../Admin/profile.php');
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	$result = $person->update_user_image($user_Id, $file);
		    // var_dump($result);
		    if($result) {
		    	displayUpdateMessage($result, "Record has been updated.", '../Admin/profile.php');
		    } else {
		    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/profile.php'); 
		    }
        } else {
        	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/profile.php'); 
        }
    }
}


// CHANGE PASSWORD ADMIN
if (isset($_POST['update_password_admin'])) {
    $user_Id     = $_POST['user_Id'];
    $OldPassword = $_POST['OldPassword'];
    $newPassword = $_POST['password'];

    if (strlen($newPassword) < 8) {
        displayErrorMessage("New password must be at least 8 characters long.", '../Admin/profile.php');
    } else {
        $user = $person->get_user($user_Id);

        if ($user) {
            // Verify old password using md5
            if (md5($OldPassword) === $user['password']) {
                // Hash the new password using md5 (not recommended)
                $hashedPassword = md5($newPassword);

                // Update the password in the database
                $result = $person->changeAdminPassword($user_Id, $hashedPassword);

                if ($result) {
                    displayUpdateMessage($result, "Password has been updated.", '../Admin/profile.php');
                } else {
                    displayErrorMessage("Something went wrong while updating the password.", '../Admin/profile.php');
                }
            } else {
                displayErrorMessage("Old password is incorrect.", '../Admin/profile.php');
            }
        } else {
            displayErrorMessage("User not found.", '../Admin/profile.php');
        }
    }
}








?>