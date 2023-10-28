<?php 

	class Customer {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE CUSTOMER
	    public function create_customer($user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $HashedPassword, $fileToUpload) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO customer (user_type, yr_section, teacherPosition ,firstname, middlename, lastname, suffix, dob, age, gender, civilstatus, email, contact, address, password, image, date_registered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("ssssssssssssssss", $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $HashedPassword, $fileToUpload);
	        return $stmt->execute();
	    }

	    // CHECK CUSTOMER EMAIL
	    public function check_email_exists($email) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("s", $email);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows > 0) {
	        	return $result->num_rows > 0;
	        } else {
	        	$stmt2 = $conn->prepare("SELECT * FROM users WHERE email = ?");
		        if (!$stmt2) {
		            die('Error in SQL query: ' . $conn->error);
		        }
		        $stmt2->bind_param("s", $email);
		        $stmt2->execute();
		        $result2 = $stmt2->get_result();
		        if($result2) {
		        	return $result2->num_rows > 0;
		        }
	        }
	        
	    }

	    // CHECK CUSTOMER EMAIL FOR UPDATION
	     public function update_check_email_exists($cust_Id, $email) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ? AND cust_Id != ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("si", $email, $cust_Id);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows > 0) {
	        	return $result->num_rows > 0;
	        } else {
	        	$stmt2 = $conn->prepare("SELECT * FROM users WHERE email = ?");
		        if (!$stmt2) {
		            die('Error in SQL query: ' . $conn->error);
		        }
		        $stmt2->bind_param("s", $email);
		        $stmt2->execute();
		        $result2 = $stmt2->get_result();
		        if($result2) {
		        	return $result2->num_rows > 0;
		        }
	        }
	    }
	    
	    
	    // DISPLAY CUSTOMER
	    public function display_customer() {
	        $conn = $this->db->getConnection();
	        $result = $conn->query("SELECT * FROM customer ");
        	// return $result->fetch_all(MYSQLI_ASSOC);
    		return $result;
	    }

	    // GET CUSTOMER
	    public function get_customer($cust_Id) {
	        $conn = $this->db->getConnection();
	        $cust_Id = mysqli_real_escape_string($conn, $cust_Id);
	        $result = $conn->query("SELECT * FROM customer WHERE cust_Id = '$cust_Id'");
	        
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }

	        return null;
	    }

	    // UPDATE CUSTOMER
	    public function update_customer($cust_Id, $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $fileToUpload) {
	        $conn = $this->db->getConnection();
	        if(empty($fileToUpload)) {
	        	$stmt = $conn->prepare("UPDATE customer SET user_type = ?, yr_section = ?, teacherPosition = ?, firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, gender = ?, civilstatus = ?, email = ?, contact = ?, address = ? WHERE cust_Id = ?");
	        	$stmt->bind_param("ssssssssssssssi", $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $cust_Id);
	        } else {
	        	$stmt = $conn->prepare("UPDATE customer SET user_type = ?, yr_section = ?, teacherPosition = ?, firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, gender = ?, civilstatus = ?, email = ?, contact = ?, address = ?, image = ? WHERE cust_Id = ?");
	        	$stmt->bind_param("sssssssssssssssi", $user_type, $yr_section, $teacherPosition, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $fileToUpload, $cust_Id);
	        }
	        return $stmt->execute();
	    }

	    // UPDATE CUSTOMER BY CUSTOMER SIDE
	    public function update_customer_side($cust_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE customer SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, gender = ?, civilstatus = ?, email = ?, contact = ?, address = ? WHERE cust_Id = ?");
        	$stmt->bind_param("sssssssssssi", $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $cust_Id);
	        return $stmt->execute();
	    }

	    // UPDATE CUSTOMER
	    public function update_customer_logged_in($cust_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE customer SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, gender = ?, civilstatus = ?, email = ?, contact = ?, address = ? WHERE cust_Id = ?");
	        $stmt->bind_param("sssssssssssi", $firstname, $middlename, $lastname, $suffix, $dob, $age, $gender, $civilstatus, $email, $contact, $address, $cust_Id);
	        return $stmt->execute();
	    }

	    // UPDATE CUSTOMER PROFILE PICTURE
	    public function update_customer_image($cust_Id, $fileToUpload) {
	    	$conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE customer SET image = ? WHERE cust_Id = ?");
	        $stmt->bind_param("si", $fileToUpload, $cust_Id);
	        return $stmt->execute();
	    }

	    // DELETE CUSTOMER
	    public function delete_customer($cust_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM customer WHERE cust_Id = ?");
	        $stmt->bind_param("i", $cust_Id);
	        return $stmt->execute();
	    }

	    // COUNT CUSTOMER
	    public function count_customer($user_type) {
		    $conn = $this->db->getConnection();
		    if($user_type == 'Teacher') {
		    	$query = "SELECT * FROM customer WHERE user_type='Teacher'";
		    } else {
		    	$query = "SELECT * FROM customer WHERE user_type='Student' ";
		    }
		    $result = $conn->query($query);
		    $count = $result->num_rows;
		    return $count;
		}


		// CHANGE CUSTOMER PASSWORD
		public function changeAdminPassword($cust_Id, $hashedPassword) {
			$conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE customer SET password = ? WHERE cust_Id = ?");
	        $stmt->bind_param("si", $hashedPassword, $cust_Id);
	        return $stmt->execute();
		}
	}

?>