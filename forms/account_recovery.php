<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    // require '../vendor/PHPMailer/src/Exception.php';
    // require '../vendor/PHPMailer/src/PHPMailer.php';
    // require '../vendor/PHPMailer/src/SMTP.php';
    if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
    if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
    if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }
    
    // Connect to your database (replace with your connection code)
    $conn = new mysqli("localhost", "root", "", "reservation");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // SEARCH EMAIL - FORGOT-PASSWORD.PHP
    if(isset($_POST['search'])) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($fetch) > 0) {
        $row = mysqli_fetch_array($fetch);
        $user_Id = $row['user_Id'];
        header("Location: ../sendcode.php?user_Id=".$user_Id."&&type=".'Admin'." ");
        exit();
      } else {
          $fetch = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
          if(mysqli_num_rows($fetch) > 0) {
            $row = mysqli_fetch_array($fetch);
            $user_Id = $row['cust_Id'];
            header("Location: ../sendcode.php?user_Id=".$user_Id."&&type=".'Customer'." ");
            exit();
          } else {
            displayErrorMessage("Email not found.", "../forgot-password.php");
          }
      }
    }





    // SEND CODE - SENDCODE.PHP
    if(isset($_POST['sendcode'])) {
        $type    = $_POST['type'];
        $email   = $_POST['email'];
        $user_Id = $_POST['user_Id'];
        $key     = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        if($type == 'Admin') {
            $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE email='$email' AND user_Id='$user_Id'");
            if($insert_code) {

              $subject = 'Verification code';
              $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
              <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%200.%20My%20NEW%20Template%20System/changepassword.php?user_Id='.$user_Id.'">here!</a></p> 
              <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

              sendEmail($subject, $message, $email, "../verifycode.php?user_Id=".$user_Id."&&email=".$email."&&type=".$type);    
            } else {
                displayErrorMessage("Something went wrong while generating verification code through email.", "../sendcode.php?user_Id=".$user_Id."&&type=".$type);
            } 
        } else {
            $insert_code = mysqli_query($conn, "UPDATE customer SET verification_code='$key' WHERE email='$email' AND cust_Id='$user_Id'");
            if($insert_code) {

              $subject = 'Verification code';
              $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
              <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%200.%20My%20NEW%20Template%20System/changepassword.php?user_Id='.$user_Id.'">here!</a></p> 
              <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

              sendEmail($subject, $message, $email, "../verifycode.php?user_Id=".$user_Id."&&email=".$email."&&type=".$type);    
            } else {
                displayErrorMessage("Something went wrong while generating verification code through email.", "../sendcode.php?user_Id=".$user_Id."&&type=".$type);
            } 
        }
    }




    // VERIFY CODE - VERIFYCODE.PHP
    if(isset($_POST['verify_code'])) {
        $user_Id = $_POST['user_Id'];
        $email   = $_POST['email'];
        $type    = $_POST['type'];
        $code    = mysqli_real_escape_string($conn, $_POST['code']);
        if($type == 'Admin') {
            $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
            if(mysqli_num_rows($fetch) > 0) {
                header("Location: ../changepassword.php?user_Id=".$user_Id."&&type=".$type);
                exit();
            } else {
                displayErrorMessage("Verification code is incorrect.", "../verifycode.php?user_Id=".$user_Id."&&email=".$email);
            }
        } else {
            $fetch = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email' AND verification_code='$code' AND cust_Id='$user_Id'");
            if(mysqli_num_rows($fetch) > 0) {
                header("Location: ../changepassword.php?user_Id=".$user_Id."&&type=".$type);
                exit();
            } else {
                displayErrorMessage("Verification code is incorrect.", "../verifycode.php?user_Id=".$user_Id."&&email=".$email);
            }
        }
        
    }





    // CHANGE PASSWORD - CHANGEPASSWORD.PHP
    if(isset($_POST['changepassword'])) {
        $user_Id   = $_POST['user_Id'];
        $type      = $_POST['type'];
        $cpassword = md5($_POST['cpassword']);
        if($type == 'Admin') {
            $update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id' ");
            displayUpdateMessage($update, "Password has been changed.", "../login.php", "../changepassword.php?user_Id=".$user_Id);
        } else {
            $update = mysqli_query($conn, "UPDATE customer SET password='$cpassword' WHERE cust_Id='$user_Id' ");
            displayUpdateMessage($update, "Password has been changed.", "../login.php", "../changepassword.php?user_Id=".$user_Id);
        }
        
    }

    

   


    // CONTACT EMAIL MESSAGING
    function sendEmail($subject, $message, $recipientEmail, $page) {
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tatakmedellin@gmail.com';
            $mail->Password = 'nzctaagwhqlcgbqq';
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
            $mail->setFrom('tatakmedellin@gmail.com');

            // Recipients
            $mail->addAddress($recipientEmail);
            $mail->addReplyTo('tatakmedellin@gmail.com');

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            $_SESSION['success'] = "Email sent successfully!";
            $_SESSION['text'] = "Saved successfully!";
            $_SESSION['status'] = "success";
            header("Location: $page");

        } catch (Exception $e) {
            $_SESSION['success'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
            header("Location: $page");
        }
    }



    // FUNCTION TO HANDLE SUCCESS MESSAGES 
    function displaySaveMessage($saveStatus, $page) {
        if ($saveStatus) {
            $_SESSION['message'] = "New record has been added.";
            $_SESSION['text'] = "Saved successfully!";
            $_SESSION['status'] = "success";
            header("Location: $page");
            exit();
        } else {
            $_SESSION['message'] = "Error.";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: $page");
            exit();
        }
    }

    // FUNCTION TO HANDLE SUCCESS MESSAGES 
    function displayUpdateMessage($updateStatus, $message = "Record has been updated.", $page, $urlForError) {
        if ($updateStatus) {
            $_SESSION['message'] = $message;
            $_SESSION['text'] = "Updated successfully!";
            $_SESSION['status'] = "success";
            header("Location: $page");
            exit();
        } else {
            $_SESSION['message'] = "Error.";
            $_SESSION['text'] = "Please try again.";
            $_SESSION['status'] = "error";
            header("Location: $urlForError");
            exit();
        }
    }

    // FUNCTION TO HANDLE ERROR MESSAGES
    function displayErrorMessage($errorMessage, $page) {
        $_SESSION['message'] = $errorMessage;
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
        header("Location: $page");
        exit();
    }

    // FUNCTION TO HANDLE ERROR MESSAGES
    function displayDeleteMessage($page) {
        $_SESSION['message'] = "Record has been deleted.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "success";
        header("Location: $page");
        exit();
    }



?>