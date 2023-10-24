<?php 
	session_start();
	date_default_timezone_set('Asia/Manila');
    $date_today = date('Y-m-d'); // get current date and time
	$yesterday_date = date('Y-m-d', strtotime('-1 day')); // get yesterday's date
	// use PHPMailer\PHPMailer\PHPMailer;
	// use PHPMailer\PHPMailer\Exception;
	// require 'vendor/PHPMailer/src/Exception.php';
	// require 'vendor/PHPMailer/src/PHPMailer.php';
	// require 'vendor/PHPMailer/src/SMTP.php';
	
	class Database {
	    private $host = 'localhost';
	    private $username = 'root';
	    private $password = '';
	    private $database = 'new_template';
	    private $conn;

	    public function __construct() {
	        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

	        if ($this->conn->connect_error) {
	            die("Connection failed: " . $this->conn->connect_error);
	        }
	    }

	    public function getConnection() {
	        return $this->conn;
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