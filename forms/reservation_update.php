<?php 
require '../includes/config.php';
require '../classes/reservation.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

$reserve = new Reservation();

// DELETE CATEGORY - CATEGORY_UPDATE_DELETE.PHP
if (isset($_POST['update_status_reservation'])) {
    $reserve_Id = $_POST['reserve_Id'];
    $status     = $_POST['status'];
    $result     = $reserve->update_status_reservation($reserve_Id, $status);
	// var_dump($result);
    if($result) {
        if($status == 1) {
            // FETCH THE CUSTOMER'S ACCOUNT
            $customer = $reserve->get_reservation($reserve_Id);
            $email = $customer['email'];
            $name  = $customer['firstname'].' '.$customer['lastname'];

            $subject = 'Approved Reservation';
            $message = '<p>Good day sir/maam '.$name.'!, </br>This is to inform you that your food reservation has been <b>approved</b>. Thank you!</p>
            <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'nmempcoop@gmail.com';
                $mail->Password = 'dmdgkgbaqccwhtji';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                // Send Email
                $mail->setFrom('nmempcoop@gmail.com');

                // Recipients
                $mail->addAddress($email);
                $mail->addReplyTo('nmempcoop@gmail.com');

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();

                displayUpdateMessage($mail, "Record has been updated.", '../Admin/reservation.php');
               
            } catch (Exception $e) {
                echo"<script>alert('Membership status has been approved but Mailer Error: ".$mail->ErrorInfo." ')</script>";
                echo"<script>window.location='../Admin/reservation.php'</script>";
            } 
        } else {
            displayUpdateMessage($result, "Record has been updated.", '../Admin/reservation.php');
        }
        
    } else {
        displayErrorMessage("Something went wrong while updating the information.", '../Admin/reservation.php'); 
    }
}




?>