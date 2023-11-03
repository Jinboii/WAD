<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    # Get parameters passed from register.php
    if (isset($_POST)){
        $data = file_get_contents("php://input");
        $user = json_decode($data, true);
        echo json_encode($user);    
        $username = $user["username"];
        $email = $user["email"];
        $password = $user["password"];
        $role = $user["role"];
    }


    # Hash entered password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    # Add new user
    $dao = new userDAO();
    $status = $dao->add($username,$email,$hashedPassword,$role);
    if($status){
        echo "Registered successfully"; 
    }
    else{
        echo "Failed to register";
    } 
?> 
