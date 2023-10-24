<?php 
require '../includes/config.php';
require '../classes/announcement.php';

$person = new Announcement();

// DELETE ANNOUNCEMENT - ANNOUNCEMENT_UPDATE_DELETE.PHP
if (isset($_POST['delete_announcement'])) {
    $actId  = $_POST['actId'];
    $result = $person->delete_announcement($actId);
	// var_dump($result);
    if($result) {
    	displayDeleteMessage('../Admin/announcement.php');
    } else {
    	displayErrorMessage("Something went wrong while deleting the information.", '../Admin/announcement.php'); 
    }
}



?>