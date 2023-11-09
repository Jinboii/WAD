<?php
    
    class UserDAO{

        # Add a new user to the database
        public function add($username, $email, $hashedPassword, $role){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into password (username, email, hashedPassword, role) 
                    values (:username, :email, :hashedPassword, :role)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":hashedPassword",$hashedPassword);
            $stmt->bindParam(":role",$role);
            $status = $stmt->execute();
            

            $stmt = null;
            $pdo = null; 
            return $status;
        }

        # Retrieve a user with a given username
        # Return null if no such user exists
        public function retrieve($username){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select * from user where email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email,PDO::PARAM_STR);
            $stmt->execute();
            
            $user = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($row = $stmt->fetch()){
                $user = new User($row["username"],$row["email"],$row["hashedPassword"],$row["user"]);
            }
            
            $stmt = null;
            $pdo = null;
            return $user;
        }

        public function getAllOrganizations(){

            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
    
            $sql = "SELECT username FROM users WHERE role = 'admin'";
    
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            $names = [];
    
        while ($row = $stmt->fetch()) {
            $names[] = $row['username'];
        }
                $stmt = null;
                $pdo = null; 
        return $names;         
        }
    }
?>