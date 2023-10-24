<?php 
require '../includes/config.php';
require '../classes/announcement.php';

$announce = new Announcement();

// CREATE ANNOUNCEMENT - ANNOUNCEMENT.PHP
if (isset($_POST['create_activity'])) {
    $actName = $_POST['actName'];
	$actDate = $_POST['actDate'];
	if ($announce->check_announce_exists($actName)) {
        displayErrorMessage("Announcement title already exists!", '../Admin/announcement.php');
    } else {
		$result = $announce->create_announcement($actName, $actDate);
	    // var_dump($result);
	    if($result) {
	    	displaySaveMessage($result, '../Admin/announcement.php');
	    } else {
	    	displayErrorMessage("Something went wrong while saving the information.", '../Admin/announcement.php'); 
	    }
    }
}


?>