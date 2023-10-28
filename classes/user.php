<?php 
	
	class User {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE USER
	    public function create_user($firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file, $password, $user_type='User') {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, birthplace, gender, civilstatus, occupation, religion, email, contact, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type, date_registered) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("ssssssssssssssssssssssss", $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file, $password, $user_type);
	        return $stmt->execute();
	    }

	    // CHECK USER EMAIL
	    public function check_email_exists($email) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("s", $email);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows > 0) {
	        	return $result->num_rows > 0;
	        } else {
	        	$stmt2 = $conn->prepare("SELECT * FROM customer WHERE email = ?");
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

	    // CHECK USER EMAIL FOR UPDATION
	    public function update_check_email_exists($user_Id, $email) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND user_Id != ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("si", $email, $user_Id);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        if($result->num_rows > 0) {
	        	return $result->num_rows > 0;
	        } else {
	        	$stmt2 = $conn->prepare("SELECT * FROM customer WHERE email = ?");
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
	    
	    // DISPLAY USER
	    public function display_user($user_type) {
	        $conn = $this->db->getConnection();
	        if($user_type == 'Admin') {
				$result = $conn->query("SELECT * FROM users WHERE (user_type = 'Admin' || user_type = 'Staff') ");
	        	// return $result->fetch_all(MYSQLI_ASSOC);
        		return $result;
	        } else {
	        	$result = $conn->query("SELECT * FROM users WHERE user_type = 'User' ");
	        	// return $result->fetch_all(MYSQLI_ASSOC);
        		return $result;
	        }
	    }

	    // GET USER
	    public function get_user($userId) {
	        $conn = $this->db->getConnection();
	        $userId = mysqli_real_escape_string($conn, $userId);
	        $result = $conn->query("SELECT * FROM users WHERE user_Id = '$userId'");
	        
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }

	        return null;
	    }

	    // UPDATE USER
	    public function update_user($user_Id, $user_type, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file) {
	        $conn = $this->db->getConnection();
	        if(empty($file)) {
	        	$stmt = $conn->prepare("UPDATE users SET user_type = ?, firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, birthplace = ?, gender = ?, civilstatus = ?, occupation = ?, religion = ?, email = ?, contact = ?, house_no = ?, street_name = ?, purok = ?, zone = ?, barangay = ?, municipality = ?, province = ?, region = ? WHERE user_Id = ?");
	        	$stmt->bind_param("ssssssssssssssssssssssi", $user_type, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $user_Id);
	        } else {
	        	$stmt = $conn->prepare("UPDATE users SET user_type = ?, firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, birthplace = ?, gender = ?, civilstatus = ?, occupation = ?, religion = ?, email = ?, contact = ?, house_no = ?, street_name = ?, purok = ?, zone = ?, barangay = ?, municipality = ?, province = ?, region = ?, image = ? WHERE user_Id = ?");
	        	$stmt->bind_param("sssssssssssssssssssssssi", $user_type, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $file, $user_Id);
	        }
	        return $stmt->execute();
	    }

	    // UPDATE USER
	    public function update_user_logged_in($user_Id, $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE users SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, dob = ?, age = ?, birthplace = ?, gender = ?, civilstatus = ?, occupation = ?, religion = ?, email = ?, contact = ?, house_no = ?, street_name = ?, purok = ?, zone = ?, barangay = ?, municipality = ?, province = ?, region = ? WHERE user_Id = ?");
	        $stmt->bind_param("sssssssssssssssssssssi", $firstname, $middlename, $lastname, $suffix, $dob, $age, $birthplace, $gender, $civilstatus, $occupation, $religion, $email, $contact, $house_no, $street_name, $purok, $zone, $barangay, $municipality, $province, $region, $user_Id);
	        return $stmt->execute();
	    }

	    // UPDATE USER PROFILE PICTURE
	    public function update_user_image($user_Id, $file) {
	    	$conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE users SET image = ? WHERE user_Id = ?");
	        $stmt->bind_param("si", $file, $user_Id);
	        return $stmt->execute();
	    }

	    // DELETE USER
	    public function delete_user($user_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM users WHERE user_Id = ?");
	        $stmt->bind_param("i", $user_Id);
	        return $stmt->execute();
	    }

	    // COUNT USER
	    public function count_users($user_type) {
		    $conn = $this->db->getConnection();
		    if($user_type == 'Admin') {
		    	$query = "SELECT * FROM users WHERE (user_type='Admin' || user_type='Staff')";
		    } else {
		    	$query = "SELECT * FROM users WHERE user_type='User' ";
		    }
		    $result = $conn->query($query);
		    $count = $result->num_rows;
		    return $count;
		}

		// CHANGE ADMIN PASSWORD
		public function changeAdminPassword($user_Id, $hashedPassword) {
			$conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_Id = ?");
	        $stmt->bind_param("si", $hashedPassword, $user_Id);
	        return $stmt->execute();
		}
	}

?>