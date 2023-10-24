<?php 
require '../includes/config.php';
require '../classes/announcement.php';

$person = new Announcement();


// UPDATE USER - ADMIN/USERS_MGMT.PHP
if (isset($_POST['update_activity'])) {
	$actId   = $_POST['actId'];
    $actName = $_POST['actName'];
	$actDate = $_POST['actDate'];

	if ($person->update_check_announce_exists($actId, $actName)) {
        displayErrorMessage("Announcement title already exists!", '../Admin/announcement.php');
    } else {
    	$result = $person->update_announcement($actId, $actName, $actDate);
	    // var_dump($result);
	    if($result) {
	    	displayUpdateMessage($result, "Record has been updated.", '../Admin/announcement.php');
	    } else {
	    	displayErrorMessage("Something went wrong while updating the information.", '../Admin/announcement.php'); 
	    }
	}
	
}


?>