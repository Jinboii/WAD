<?php
class LoginDAO {
    private $db_host = 'localhost';
    private $db_name = 'rebirth';
    private $db_user = 'root';
    private $db_password = 'root';

    public function checkLogin($username, $password) {
        $conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            if (password_verify($password, $hashedPassword)) {
                $stmt->close();
                $conn->close();
                return true;
            }
        }

        $stmt->close();
        $conn->close();
        return false;
    }
    public function getUserType($username) {

        $conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $stmt = $conn->prepare("SELECT role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($row = $result->fetch_assoc()) {
            $userType = $row['role'];
            $stmt->close();
            $conn->close();
    
            return $userType;
        } else {
            $stmt->close();
            $conn->close();
            return null; 
        }
    }
    
}
