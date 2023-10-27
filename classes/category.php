<?php 
	
	class Category {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE CATEGORY
	    public function create_category($catName, $description) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO category (catName, description, date_added) VALUES (?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("ss", $catName, $description);
	        return $stmt->execute();
	    }

	    // CHECK CATEGORY
	    public function check_category_exists($catName) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM category WHERE catName = ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("s", $catName);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // CHECK CATEGORY FOR UPDATION
	    public function update_check_category_exists($cat_Id, $catName) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM category WHERE catName = ? AND cat_Id != ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("si", $catName, $cat_Id);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // DISPLAY CATEGORY
	    public function display_category() {
	        $conn = $this->db->getConnection();
	        $result = $conn->query("SELECT * FROM category ORDER BY catName");
        	// return $result->fetch_all(MYSQLI_ASSOC);
        	return $result;
	    }

	    // GET CATEGORY
	    public function get_category($cat_Id) {
	        $conn = $this->db->getConnection();
	        $cat_Id = mysqli_real_escape_string($conn, $cat_Id);
	        $result = $conn->query("SELECT * FROM category WHERE cat_Id = '$cat_Id'");
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }
	        return null; 
	    }

	    // UPDATE CATEGORY
	    public function update_category($cat_Id, $catName, $description) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE category SET catName = ?, description = ? WHERE cat_Id = ?");
	        $stmt->bind_param("ssi", $catName, $description, $cat_Id);
	        return $stmt->execute();
	    }

	    // DELETE CATEGORY
	    public function delete_category($cat_Id) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM category WHERE cat_Id = ?");
	        $stmt->bind_param("i", $cat_Id);
	        return $stmt->execute();
	    }

	    // COUNT CATEGORY
	    public function count_category() {
		    $conn = $this->db->getConnection();
		    $query = "SELECT * FROM category";
		    $result = $conn->query($query);
		    // Count the number of records
		    $count = $result->num_rows;
		    return $count;
		}

	}

?>