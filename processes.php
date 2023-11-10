<?php 

	include 'includes/config.php';
	// include 'includes/function_create.php';

	// use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    // require 'vendor/PHPMailer/src/Exception.php';
    // require 'vendor/PHPMailer/src/PHPMailer.php';
    // require 'vendor/PHPMailer/src/SMTP.php';


	// USERS LOGIN - LOGIN.PHP
	if(isset($_POST['login'])) {
		$email    = $_POST['email'];
		$password = md5($_POST['password']);

		// Check if the user has attempted to log in before
		if (!isset($_SESSION['login_attempts'])) {
		    $_SESSION['login_attempts'] = 0;
		}

		// Check if the user has reached the maximum number of login attempts
		if ($_SESSION['login_attempts'] > 3) {
		    // Check if the user has been blocked for 30 minutes
		    if (time() - $_SESSION['last_login_attempt'] <= 600) {
		        // User is still blocked, display an error message and exit
				displayErrorMessage("You have been blocked for 10 minutes due to multiple failed login attempts.", "login.php");
		    } else {
		        // Block has expired, reset the login attempts counter
		        $_SESSION['login_attempts'] = 0;
		    }
		}


		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($check)===1) {
			$row = mysqli_fetch_array($check);
			$position = $row['user_type'];

			$log_ID = $row['user_Id'];
			$login_time = date("Y-m-d h:i A");
			$login = mysqli_query($conn, "INSERT INTO log_history (user_Id, login_time) VALUES ('$log_ID', '$login_time')");

			if($position == 'Admin') {
				$_SESSION['login_attempts'] = 0;
	    		$_SESSION['last_login_attempt'] = time();
				$_SESSION['admin_Id'] = $row['user_Id'];
				$_SESSION['login_time'] = $login_time;
				header("Location: Admin/dashboard.php");
				exit();
			} else {
				$_SESSION['login_attempts'] = 0;
	    		$_SESSION['last_login_attempt'] = time();
				$_SESSION['user_Id'] = $row['user_Id'];
				$_SESSION['login_time'] = $login_time;
				header("Location: User/profile.php");
				exit();
			}
		} else {
		    $_SESSION['login_attempts']++;
		    $_SESSION['last_login_attempt'] = time();
			displayErrorMessage("Incorrect password.", "login.php");
		}
	}





	// SEARCH EMAIL - FORGOT-PASSWORD.PHP
	if(isset($_POST['search'])) {
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
      if(mysqli_num_rows($fetch) > 0) {
      	$row = mysqli_fetch_array($fetch);
      	$user_Id = $row['user_Id'];
      	header("Location: sendcode.php?user_Id=".$user_Id);
      	exit();
      } else {
		displayErrorMessage("Email not found.", "forgot-password.php");
      }
	}





	// SEND CODE - SENDCODE.PHP
	if(isset($_POST['sendcode'])) {
	    $email    = $_POST['email'];
	    $user_Id  = $_POST['user_Id'];
	    $key      = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

	    $insert_code = mysqli_query($conn, "UPDATE users SET verification_code='$key' WHERE email='$email' AND user_Id='$user_Id'");
	    if($insert_code) {

	      $subject = 'Verification code';
	      $message = '<p>Good day sir/maam '.$email.', your verification code is <b>'.$key.'</b>. Please do not share this code to other people. Thank you!</p>
	      <p>You can change your password by just clicking it <a href="http://localhost/PROJECT%200.%20My%20NEW%20Template%20System/changepassword.php?user_Id='.$user_Id.'">here!</a></p> 
	      <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

    	  sendEmail($subject, $message, $email, "verifycode.php?user_Id=".$user_Id."&&email=".$email);    
		} else {
			displayErrorMessage("Something went wrong while generating verification code through email.", "sendcode.php?user_Id=".$user_Id);
		} 
	}




	// VERIFY CODE - VERIFYCODE.PHP
	if(isset($_POST['verify_code'])) {
	    $user_Id = $_POST['user_Id'];
	    $email   = $_POST['email'];
	    $code    = mysqli_real_escape_string($conn, $_POST['code']);
	    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND verification_code='$code' AND user_Id='$user_Id'");
	    if(mysqli_num_rows($fetch) > 0) {
			header("Location: changepassword.php?user_Id=".$user_Id);
			exit();
		} else {
			displayErrorMessage("Verification code is incorrect.", "verifycode.php?user_Id=".$user_Id."&&email=".$email);
		}
	}





	// CHANGE PASSWORD - CHANGEPASSWORD.PHP
	if(isset($_POST['changepassword'])) {
		$user_Id   = $_POST['user_Id'];
		$cpassword = md5($_POST['cpassword']);

		$update = mysqli_query($conn, "UPDATE users SET password='$cpassword' WHERE user_Id='$user_Id' ");
		displayUpdateMessage($update, "Password has been changed.", "login.php", "changepassword.php?user_Id=".$user_Id);
	}


?>
