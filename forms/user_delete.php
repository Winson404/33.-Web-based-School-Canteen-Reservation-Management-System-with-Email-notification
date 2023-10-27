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

// DELETE ADMIN - ADMIN_DELETE.PHP
if (isset($_POST['delete_admin'])) {
    $user_Id        = $_POST['user_Id'];
    $result = $person->delete_user($user_Id);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../Admin/admin.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../Admin/admin.php'); 
    }
}


?>