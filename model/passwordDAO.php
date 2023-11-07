<?php

class PasswordDAO {

    // Function to save the password to the database
    public function savePassword($username, $email, $hashedPassword, $role) {
       
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();

        $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);

        $isAddOK = $stmt->execute();

        $stmt = null;
        $conn = null;

        return $isAddOK;
    }

    public function checkUniqueUsername($username) {
        
        $connMgr = new ConnectionManager();          
        $conn = $connMgr->getConnection();

        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $isUnique = true;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            $isUnique = false; }

        $stmt = null;
        $conn = null;
        return $isUnique;
}
}
?>
