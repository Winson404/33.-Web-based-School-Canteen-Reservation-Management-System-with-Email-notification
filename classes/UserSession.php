<?php
class UserSession {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getLoggedInUser($userId) {
        $userId = mysqli_real_escape_string($this->conn, $userId);

        $query = "SELECT * FROM users WHERE user_Id = '$userId'";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) === 1) {
            return mysqli_fetch_array($result);
        } else {
            $query = "SELECT * FROM customer WHERE cust_Id = '$userId'";
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) === 1) {
                return mysqli_fetch_array($result);
            }
            return null;
        }

        
    }

    public function isUserLoggedIn() {
        return isset($_SESSION['user_Id']);
    }

    public function getLastActiveTime() {
        return isset($_SESSION['last_active']) ? $_SESSION['last_active'] : 0;
    }
}

?>
