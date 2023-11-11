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


// UPDATE CUSTOMER - ADMIN/CUSTOMER_MGMT.PHP
if (isset($_POST['update_customer'])) {
	$cust_Id         = $_POST['cust_Id'];
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
	$fileToUpload    = basename($_FILES["fileToUpload"]["name"]);

	if(empty($fileToUpload)) {
		if ($customer->update_check_email_exists($cust_Id, $email)) {
        displayErrorMessage("Email already exists!", '../Admin/customer_mgmt.php?page='.$cust_Id);
    	} else {
			$result = $customer->update_customer($cust_Id, $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $fileToUpload);
		    // var_dump($result);
		    if($result) {
		    	displayUpdateMessage($result, "Customer record has been updated.", '../Admin/customer_mgmt.php?page='.$cust_Id);
		    } else {
		    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/customer_mgmt.php?page='.$cust_Id); 
		    }
		}
	} else {

		if ($customer->update_check_email_exists($cust_Id, $email)) {
	        displayErrorMessage("Email already exists!", '../Admin/customer_mgmt.php?page='.$cust_Id);
	    } else {
	        $target_dir = '../assets/images-users/';
	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if ($check == false) {
	            displayErrorMessage("File is not an image.", '../Admin/customer_mgmt.php?page='.$cust_Id);
	            $uploadOk = 0;
	        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
	            displayErrorMessage("File must be up to 500KB in size.", '../Admin/customer_mgmt.php?page='.$cust_Id);
	            $uploadOk = 0;
	        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	            $uploadOk = 0;
	        } elseif ($uploadOk == 0) {
	            displayErrorMessage("Your file was not uploaded.", '../Admin/customer_mgmt.php?page='.$cust_Id);
	        } else {
	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	$result = $customer->update_customer($cust_Id, $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $fileToUpload);
				    // var_dump($result);
				    if($result) {
				    	displayUpdateMessage($result, "Customer record has been updated.", '../Admin/customer_mgmt.php?page='.$cust_Id);
				    } else {
				    	displayErrorMessage("Something went wrong while saving the information.", '../Admin/customer_mgmt.php?page='.$cust_Id); 
				    }
	            } else {
	            	displayErrorMessage("There was an error uploading your profile picture.", '../Admin/customer_mgmt.php?page='.$cust_Id); 
	            }
	        }
	    }
	}
}



// UPDATE CUSTOMER - USER/PROFILE.PHP
if (isset($_POST['update_profile_info_user'])) {
	$cust_Id         = $_POST['cust_Id'];
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

	if ($customer->update_check_email_exists($cust_Id, $email)) {
    displayErrorMessage("Email already exists!", '../User/profile.php');
	} else {
		$result = $customer->update_customer_side($cust_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address);
	    // var_dump($result);
	    if($result) {
	    	displayUpdateMessage($result, "Profile has been updated.", '../User/profile.php');
	    } else {
	    	displayErrorMessage("Something went wrong while updating the information.", '../User/profile.php'); 
	    }
	}
}


// UPDATE PROFILE PICTURE OF CUSTOMER
if(isset($_POST['update_image_user'])) {
	$cust_Id    = $_POST['cust_Id'];
	$file       = basename($_FILES["fileToUpload"]["name"]);
	$target_dir = '../assets/images-users/';
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check == false) {
        displayErrorMessage("File is not an image.", '../User/profile.php');
        $uploadOk = 0;
    } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
        displayErrorMessage("File must be up to 500KB in size.", '../User/profile.php');
        $uploadOk = 0;
    } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
        $uploadOk = 0;
    } elseif ($uploadOk == 0) {
        displayErrorMessage("Your file was not uploaded.", '../User/profile.php');
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        	$result = $customer->update_customer_image($cust_Id, $file);
		    // var_dump($result);
		    if($result) {
		    	displayUpdateMessage($result, "Record has been updated.", '../User/profile.php');
		    } else {
		    	displayErrorMessage("Something went wrong while updating the information.", '../User/profile.php'); 
		    }
        } else {
        	displayErrorMessage("There was an error uploading your profile picture.", '../User/profile.php'); 
        }
    }
}




// CHANGE PASSWORD CUSTOMER
if (isset($_POST['update_password_user'])) {
    $cust_Id     = $_POST['user_Id'];
    $OldPassword = $_POST['OldPassword'];
    $newPassword = $_POST['password'];

    if (strlen($newPassword) < 8) {
        displayErrorMessage("New password must be at least 8 characters long.", '../Admin/profile.php');
    } else {
        $user = $customer->get_customer($cust_Id);
        if ($user) {
            // Verify old password using md5
            if (md5($OldPassword) === $user['password']) {
                // Hash the new password using md5 (not recommended)
                $hashedPassword = md5($newPassword);

                // Update the password in the database
                $result = $customer->changeAdminPassword($cust_Id, $hashedPassword);

                if ($result) {
                    displayUpdateMessage($result, "Password has been updated.", '../User/profile.php');
                } else {
                    displayErrorMessage("Something went wrong while updating the password.", '../User/profile.php');
                }
            } else {
                displayErrorMessage("Old password is incorrect.", '../User/profile.php');
            }
        } else {
            displayErrorMessage("User not found.", '../User/profile.php');
        }
    }
}





?>