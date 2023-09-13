<?php 
	
	// FUNCTION TO DELETE RECORDS
	function deleteRecord($conn, $table, $idColumn, $idValue, $redirect) {
	    $delete = mysqli_prepare($conn, "DELETE FROM $table WHERE $idColumn = ?");
	    mysqli_stmt_bind_param($delete, "s", $idValue);
	    mysqli_stmt_execute($delete);

	    if (mysqli_stmt_affected_rows($delete) > 0) {
	        $_SESSION['message'] = "Record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
	        header("Location: $redirect");
	    } else {
	        $_SESSION['message'] = "Deletion failed!";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
	        header("Location: $redirect");
	    }

	    mysqli_stmt_close($delete);
	}
	
	
?>