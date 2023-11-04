<?php
class PasswordDAO {
    // Database credentials
    private $db_host = 'localhost';
    private $db_name = 'rebirth';
    private $db_user = 'root';
    private $db_password = '';

    // Function to save the password to the database
    public function savePassword($username, $email, $hashedPassword, $role) {
        // Create a connection to the database
        $conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        
        // Check for a successful connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return false;
        }
        
        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }
}
?>
