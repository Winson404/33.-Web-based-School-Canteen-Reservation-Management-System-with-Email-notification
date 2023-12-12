<?php 
require '../includes/config.php';
require '../classes/guest.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require '../vendor/PHPMailer/src/Exception.php';
// require '../vendor/PHPMailer/src/PHPMailer.php';
// require '../vendor/PHPMailer/src/SMTP.php';
if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }

$guest = new GuestReservation();


// CREATE GUEST RESERVATION - GUEST_FORM.PHP
if (isset($_POST['guest_reservation'])) {
	$prod_Id    = $_POST['prod_Id'];
	$prod_qty   = $_POST['prod_qty'];
	$firstname  = ucwords($_POST['firstname']);
	$middlename = ucwords($_POST['middlename']);
	$lastname   = ucwords($_POST['lastname']);
	$suffix     = ucwords($_POST['suffix']);
	$email      = ucwords($_POST['email']);
	$contact    = ucwords($_POST['contact']);
	$address    = ucwords($_POST['address']);

	$result = $guest->create_guest_reservation($prod_Id, $prod_qty, $firstname, $middlename, $lastname, $suffix, $email, $contact, $address);
    // var_dump($result);
    displaySaveMessage($result, '../guest_form.php?prod_Id='.$prod_Id);
}



?>