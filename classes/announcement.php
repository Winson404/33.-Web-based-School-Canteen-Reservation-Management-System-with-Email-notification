<?php 
	
	class Announcement {
	    private $db;
	    
	    public function __construct() {
	        $this->db = new Database();
	    }

	    // SAVE ANNOUNCEMENT
	    public function create_announcement($actName, $actDate) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("INSERT INTO announcement (actName, actDate, date_added) VALUES (?, ?, NOW())");
	        if (!$stmt) {
			    die('Error in SQL query: ' . $conn->error);
			} 
	        $stmt->bind_param("ss", $actName, $actDate);
	        return $stmt->execute();
	    }

	    // CHECK ANNOUNCEMENT TITLE
	    public function check_announce_exists($actName) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM announcement WHERE actName = ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("s", $actName);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // CHECK ANNOUNCEMENT TITLE FOR UPDATION
	    public function update_check_announce_exists($actId, $actName) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("SELECT * FROM announcement WHERE actName = ? AND actId != ?");
	        if (!$stmt) {
	            die('Error in SQL query: ' . $conn->error);
	        }
	        $stmt->bind_param("si", $actName, $actId);
	        $stmt->execute();
	        $result = $stmt->get_result();
	        
	        return $result->num_rows > 0;
	    }

	    // DISPLAY ANNOUNCEMENT
	    public function display_announcement() {
	        $conn = $this->db->getConnection();
	        $currentDate = date('Y-m-d');
	        $result = $conn->query("SELECT * FROM announcement WHERE actDate >= '$currentDate'");
        	return $result->fetch_all(MYSQLI_ASSOC);
	    }

	    // GET ANNOUNCEMENT
	    public function get_announcement($actId) {
	        $conn = $this->db->getConnection();
	        $userId = mysqli_real_escape_string($conn, $userId);
	        $result = $conn->query("SELECT * FROM announcement WHERE actId = '$actId'");
	        if ($result && $result->num_rows === 1) {
	            return $result->fetch_assoc();
	        }
	        return null; 
	    }

	    // UPDATE ANNOUNCEMENT
	    public function update_announcement($actId, $actName, $actDate) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("UPDATE announcement SET actName = ?, actDate = ? WHERE actId = ?");
	        $stmt->bind_param("ssi", $actName, $actDate, $actId);
	        return $stmt->execute();
	    }

	    // DELETE ANNOUNCEMENT
	    public function delete_announcement($actId) {
	        $conn = $this->db->getConnection();
	        $stmt = $conn->prepare("DELETE FROM announcement WHERE actId = ?");
	        $stmt->bind_param("i", $actId);
	        return $stmt->execute();
	    }

	    // COUNT ANNOUNCEMENT
	    public function count_announcement() {
		    $conn = $this->db->getConnection();
		    $currentDate = date('Y-m-d');
		    
		    $query = "SELECT * FROM announcement WHERE actDate >= '$currentDate'";
		    $result = $conn->query($query);
		    
		    $announcements = $result->fetch_all(MYSQLI_ASSOC);
		    
		    // Count the number of records
		    $count = $result->num_rows;
		    
		    return [
		        'announcements' => $announcements,
		        'count' => $count,
		    ];
		}

	}

?>