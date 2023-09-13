<?php 
	include '../config.php';
	// include('../phpqrcode/qrlib.php');
	include '../includes/function_create.php';
	

	// SAVE ADMIN - ADMIN_MGMT.PHP
	if (isset($_POST['create_admin'])) {
	    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
	    $path = "../images-users/";
	    saveUser($conn, "admin_mgmt.php?page=create", $user_type, $path);
	}


	// SAVE USERS - USERS_MGMT.PHP
	if (isset($_POST['create_user'])) {
		$user_type = "User";
		$path = "../images-users/";
	    saveUser($conn, "users_mgmt.php?page=create", $user_type, $path);
	}


	// SAVE ACTIVITY - ANNOUNCEMENT_ADD.PHP
	if (isset($_POST['create_activity'])) {
		$activity = mysqli_real_escape_string($conn, $_POST['activity']);
		$actDate  = mysqli_real_escape_string($conn, $_POST['actDate']);
		saveActivity($conn, "announcement.php", $activity, $actDate);
	}


	// SAVE CUSTOMIZATION - CUSTOMIZATION_ADD.PHP
	if (isset($_POST['create_customization'])) {
	    saveCustomization($conn, "customize.php");
	}
	
	
?>



