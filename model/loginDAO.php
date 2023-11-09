<?php

class LoginDAO {

    //check for correct username and password
    public function checkLogin($username, $password) {
        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection();

        $sql = "SELECT password FROM users WHERE username = :username";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $stmt->fetch()) {

            $hashedPassword = $row['password'];
            if (password_verify($password, $hashedPassword)) {
                $stmt = null;
                $pdo = null; 
                return true;
            }
        }

        $stmt = null;
        $pdo = null; 
        return false;
    }

    public function getUserType($username) {

        $conn_manager = new ConnectionManager();
        $pdo = $conn_manager->getConnection();

        $sql = "SELECT role FROM users WHERE username = :username";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
        if($row = $stmt->fetch()){
            $userType = $row['role'];
            $stmt = null;
            $pdo = null; 
    
            return $userType;
        } else {
            $stmt = null;
            $pdo = null; 
            return null; 
        }

    }
}