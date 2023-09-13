<?php 
	include '../config.php';

	
	// Retrieve the POST data
	$id = $_POST['id'];
	$login_time = $_POST['login_time'];

	// Perform the database update
	$logout_time = date('Y-m-d h:i:s'); // Assuming you have the logout time available
	$update = mysqli_query($conn, "UPDATE log_history SET logout_time='$logout_time' WHERE user_Id='$id' AND login_time='$login_time'");

	// Handle the update result
	if ($update) {
	  // Return a success response if needed
	  echo "Logged out successfully!";
	} else {
	  // Return an error response if needed
	  echo "Error occurred while logging out!";
	}




?>




