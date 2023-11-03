<?php 
    class User{
        private $username;
        private $email;
        private $hashedPassword;
        private $role;
        public function __construct($username,$email,$hashedPassword,$role){
            $this->username = $username;
            $this->email = $email;
            $this->hashedPassword = $hashedPassword;
            $this->role = $role;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getHashedPassword(){
            return $this->hashedPassword;
        }
        public function getRole(){
            return $this->role;
        }
    }
?>