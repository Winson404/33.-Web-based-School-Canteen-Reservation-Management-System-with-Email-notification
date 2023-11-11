<?php
class UserAuthentication {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // LOGIN
    public function login($email, $password) {
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = md5($password);

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_array($result);
            $position = $row['user_type'];

            $log_ID = $row['user_Id'];
            $login_time = date("Y-m-d h:i A");
            $login = mysqli_query($this->conn, "INSERT INTO log_history (user_Id, login_time) VALUES ('$log_ID', '$login_time')");
            $this->resetLoginAttempts();
            $this->startSession('user_Id', $row['user_Id'], $login_time);
            if ($position == 'Admin' || $position == 'Staff') {
                header("Location: ../Admin/dashboard.php");
                exit();
            } else {
                header("Location: ../User/profile.php");
                exit();
            }
        } else {
            $query2 = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
            $result2 = mysqli_query($this->conn, $query2);
                if (mysqli_num_rows($result2) === 1) {
                $row2 = mysqli_fetch_array($result2);

                $log_ID = $row2['cust_Id'];
                $login_time = date("Y-m-d h:i A");
                $login = mysqli_query($this->conn, "INSERT INTO log_history (user_Id, login_time) VALUES ('$log_ID', '$login_time')");
                $this->resetLoginAttempts();
                $this->startSession('user_Id', $row2['cust_Id'], $login_time);
                header("Location: ../User/index.php");
                exit();
            } else {
                $this->incrementLoginAttempts();
                displayErrorMessage("Incorrect password.", "../login.php");
            }
        }
    }

    private function incrementLoginAttempts() {
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }

        $_SESSION['last_login_attempt'] = time();
    }

    private function resetLoginAttempts() {
        $_SESSION['login_attempts'] = 0;
    }

    private function startSession($key, $userId, $loginTime) {
        $_SESSION['last_login_attempt'] = time();
        $_SESSION[$key] = $userId;
        $_SESSION['login_time'] = $loginTime;
    }
}



class LogHistory {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    // DISPLAY ANNOUNCEMENT
    public function display_logs() {
        $conn = $this->db->getConnection();
        $currentDate = date('Y-m-d');
        $result = $conn->query("SELECT * FROM log_history JOIN users ON log_history.user_Id=users.user_Id ORDER BY log_Id DESC");
        // return $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
