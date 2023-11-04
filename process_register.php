<?php
<<<<<<< HEAD
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
=======
require_once 'passwordDAO.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['message' => 'Invalid request method.']);
    exit;
}

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!isset($data['username']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
    echo json_encode(['message' => 'Incomplete registration data provided.']);
    exit;
}

$passwordDAO = new PasswordDAO();
$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

if ($passwordDAO->savePassword($data['username'], $data['email'], $hashedPassword, $data['role'])) {
    echo json_encode(['message' => "Registration successful for: " . $data['username']]);
} else {
    echo json_encode(['message' => 'Registration failed.']);
}
?>
>>>>>>> 9f0d374dbb68a671331214491ce85c184951b0c6
