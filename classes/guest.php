<?php 

	class GuestReservation {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE GUEST RESERVATION
	    public function create_guest_reservation($prod_Id, $prod_qty, $firstname, $middlename, $lastname, $suffix, $email, $contact, $address) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO guest_reservation (prod_Id, prod_qty, firstname, middlename, lastname, suffix, email, contact, address, date_reserved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("iisssssss", $prod_Id, $prod_qty, $firstname, $middlename, $lastname, $suffix, $email, $contact, $address);
	        return $stmt->execute();
	    }


	    // GET RESERVATION
	    public function get_reservation($guest_Id) {
	        $conn = $this->db->getConnection();
	        $guest_Id = mysqli_real_escape_string($conn, $guest_Id);
	        $result = $conn->query("SELECT * FROM guest_reservation JOIN product ON guest_reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id WHERE guest_reservation.guest_Id='$guest_Id' ");
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }
	        return null; 
	    }


	    // DISPLAY RESERVATION
	    public function display_reservation() {
	        $conn = $this->db->getConnection();
	        $result = $conn->query("SELECT * FROM guest_reservation JOIN product ON guest_reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id");
	        
        	// return $result->fetch_all(MYSQLI_ASSOC);
        	return $result;
	    }

	   
	    // COUNT RESERVATION
	    public function guest_count_reserve() {
		    $conn = $this->db->getConnection();
		    $currentDate = date('Y-m-d');
		    
		    $query = "SELECT * FROM guest_reservation";
		    $result = $conn->query($query);
		    
		    // Count the number of records
		    $count = $result->num_rows;
		    
		    return $count;
		}

		// ADMIN/RESERVATION_UPDAT.PHP
		public function update_status_reservation_guest($guest_Id, $status) {
			$conn = $this->db->getConnection();
			$stmt = $conn->prepare("UPDATE guest_reservation SET status = ? WHERE guest_Id = ? ");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("ii", $status, $guest_Id);
	        $stmt->execute();
	        // Check if the UPDATE query was successful
		    if ($stmt->affected_rows > 0) {
		    	if($status == 2) {
			        $stmt = $conn->prepare("INSERT INTO income (reserve_Id, date_added) VALUES (?, NOW())");
			        if (!$stmt) {
					    die('Error in SQL query: ' . $conn->error);
					} 
			        $stmt->bind_param("i", $guest_Id);
			        // Check if the INSERT query was successful
		            if ($stmt->execute()) {
		                return true; // Return true for success
		            } else {
		                return false; // Return false for failure
		            }
		    	} else {
		    		return true; // Return true for success
		    	}
		    } else {
		        return false; // Return false for failure
		    }
		}

		




	}

?>