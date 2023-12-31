<?php 

	class Reservation {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE RESERVATION
	    public function create_reservation($cust_Id, $prod_Id, $qty) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO reservation (cust_Id, prod_Id, qty, date_reserved) VALUES (?, ?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("iii", $cust_Id, $prod_Id, $qty);
	        return $stmt->execute();
	    }

	    // CHECK RESERVATION
	    public function get_existing_reservation($cust_Id, $prod_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM reservation WHERE cust_Id = ? AND prod_Id = ? AND status = 0");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("ii", $cust_Id, $prod_Id);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        if ($result->num_rows > 0) {
		        return $result;
		    } else {
		        return false; // Return false for failure
		    }
	    }



	    // UPDATE RESERVATION
	    public function update_reservation($cust_Id, $prod_Id, $updatedQty) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE reservation SET qty = ? WHERE cust_Id = ? AND prod_Id = ? AND status=0");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("iii", $updatedQty, $cust_Id, $prod_Id);
	        $stmt->execute();
	        // Check if the UPDATE query was successful
		    if ($stmt->affected_rows > 0) {
		        return true; // Return true for success
		    } else {
		        return false; // Return false for failure
		    }
	    }




	    // DISPLAY RESERVATION
	    public function display_reservation($id) {
	        $conn = $this->db->getConnection();
	        if($id == 'Admin') {
	        	$result = $conn->query("SELECT * FROM reservation JOIN product ON reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id JOIN customer ON reservation.cust_Id=customer.cust_Id");
	        } else {
	        	$result = $conn->query("SELECT * FROM reservation JOIN product ON reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id WHERE reservation.cust_Id = '$id'");
	        }
	        
        	// return $result->fetch_all(MYSQLI_ASSOC);
        	return $result;
	    }

	    // GET RESERVATION
	    public function get_reservation($reserve_Id) {
	        $conn = $this->db->getConnection();
	        $reserve_Id = mysqli_real_escape_string($conn, $reserve_Id);
	        $result = $conn->query("SELECT * FROM reservation JOIN product ON reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id JOIN customer ON reservation.cust_Id=customer.cust_Id WHERE reservation.reserve_Id='$reserve_Id' ");
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }
	        return null; 
	    }


	    // DELETE RESERVATION
	    public function delete_reservation($reserve_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM reservation WHERE reserve_Id = ?");
	        $stmt->bind_param("i", $reserve_Id);
	        return $stmt->execute();
	    }

	    // COUNT RESERVATION
	    public function count_reserve() {
		    $conn = $this->db->getConnection();
		    $currentDate = date('Y-m-d');
		    
		    $query = "SELECT * FROM reservation JOIN product ON reservation.prod_Id=product.prod_Id JOIN category oN product.cat_Id=category.cat_Id JOIN customer ON reservation.cust_Id=customer.cust_Id";
		    $result = $conn->query($query);
		    
		    // $announcements = $result->fetch_all(MYSQLI_ASSOC);
		    
		    // Count the number of records
		    $count = $result->num_rows;
		    
		    return $count;
		}

		// ADMIN/RESERVATION_UPDAT.PHP
		public function update_status_reservation($reserve_Id, $status) {
			$conn = $this->db->getConnection();
			$stmt = $conn->prepare("UPDATE reservation SET status = ? WHERE reserve_Id = ? ");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("ii", $status, $reserve_Id);
	        $stmt->execute();
	        // Check if the UPDATE query was successful
		    if ($stmt->affected_rows > 0) {
		    	if($status == 2) {
			        $stmt = $conn->prepare("INSERT INTO income (reserve_Id, date_added) VALUES (?, NOW())");
			        if (!$stmt) {
					    die('Error in SQL query: ' . $conn->error);
					} 
			        $stmt->bind_param("i", $reserve_Id);
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

		// ADMIN/INCOME_REPORT.PHP
		public function getDailyIncome($date) {
		    $conn = $this->db->getConnection();

		    // SQL query to calculate the daily income using LEFT JOIN for reservations and guest reservations
		    $query = "SELECT IFNULL(SUM(product.price * reservation.qty), 0) AS total_income FROM product LEFT JOIN reservation ON product.prod_Id = reservation.prod_Id AND DATE(reservation.date_reserved) = ? WHERE reservation.status = 2";

		    $query2 = "SELECT IFNULL(SUM(product.price * guest_reservation.prod_qty), 0) AS total_income FROM product LEFT JOIN guest_reservation ON product.prod_Id = guest_reservation.prod_Id AND DATE(guest_reservation.date_reserved) = ? WHERE guest_reservation.status = 2";

		    $stmt = $conn->prepare($query);
		    $stmt->bind_param("s", $date);

		    $stmt->execute();

		    $result = $stmt->get_result(); // Fetch the result before executing the next query

		    $stmt2 = $conn->prepare($query2);
		    $stmt2->bind_param("s", $date);

		    $stmt2->execute();

		    $result2 = $stmt2->get_result(); // Fetch the result before returning from the function

		    if ($stmt->error || $stmt2->error) {
		        die('Query execution error: ' . $stmt->error . ' ' . $stmt2->error);
		    }

		    $row = $result->fetch_assoc();
		    $row2 = $result2->fetch_assoc();

		    return $row['total_income'] + $row2['total_income'];
		}



		// ADMIN/INCOME_REPORT.PHP
		public function getMonthlyIncome($year, $month) {
		    $conn = $this->db->getConnection();

		    // SQL query to calculate the monthly income for reservations
		    $query = "SELECT IFNULL(SUM(product.price * reservation.qty), 0) AS total_income
		              FROM product
		              LEFT JOIN reservation ON product.prod_Id = reservation.prod_Id
		              WHERE DATE_FORMAT(reservation.date_reserved, '%Y-%m') = ? AND reservation.status = 2";

		    // SQL query to calculate the monthly income for guest reservations
		    $query2 = "SELECT IFNULL(SUM(product.price * guest_reservation.prod_qty), 0) AS total_income
		               FROM product
		               LEFT JOIN guest_reservation ON product.prod_Id = guest_reservation.prod_Id
		               WHERE DATE_FORMAT(guest_reservation.date_reserved, '%Y-%m') = ? AND guest_reservation.status = 2";

		    $targetMonth = sprintf("%04d-%02d", $year, $month); // Format the year and month

		    $stmt = $conn->prepare($query);
		    $stmt->bind_param("s", $targetMonth);

		    $stmt2 = $conn->prepare($query2);
		    $stmt2->bind_param("s", $targetMonth);

		    if (!$stmt || !$stmt2) {
		        die('Error in SQL query: ' . $conn->error);
		    }

		    $stmt->execute();
		    $result = $stmt->get_result();
		    $row = $result->fetch_assoc();
		    $stmt->close(); // Close the first statement after fetching the result

		    $stmt2->execute();
		    $result2 = $stmt2->get_result();
		    $row2 = $result2->fetch_assoc();
		    $stmt2->close(); // Close the second statement after fetching the result

		    return $row['total_income'] + $row2['total_income'];
		}


		// ADMIN/INCOME_REPORT.PHP
		public function getTotalIncome() {
    $conn = $this->db->getConnection();

    // SQL query to calculate the total income for both reservations and guest reservations
    $query = "SELECT IFNULL(SUM(price * qty), 0) AS total_income
              FROM (
                  SELECT product.price, reservation.qty
                  FROM product
                  LEFT JOIN reservation ON product.prod_Id = reservation.prod_Id
                  WHERE reservation.status = 2

                  UNION ALL

                  SELECT product.price, guest_reservation.prod_qty AS qty
                  FROM product
                  LEFT JOIN guest_reservation ON product.prod_Id = guest_reservation.prod_Id
                  WHERE guest_reservation.status = 2
              ) AS combined";

    $result = $conn->query($query);

    if ($result === false) {
        die('Error in SQL query: ' . $conn->error);
    }

    $row = $result->fetch_assoc();

    $result->free(); // Free up the result set

    return $row['total_income'];
}






	}

?>