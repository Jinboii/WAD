<?php
require_once 'loginDAO.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['message' => 'Invalid request method.', 'success' => false]);
    exit;
}

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!isset($data['username']) || !isset($data['password'])) {
    echo json_encode(['message' => 'Login data is incomplete.', 'success' => false]);
    exit;
}

$loginDAO = new LoginDAO();
$isLoginSuccess = $loginDAO->checkLogin($data['username'], $data['password']);

if ($isLoginSuccess) {
    echo json_encode(['message' => "Login successful for: " . $data['username'], 'success' => true]);
} else {
    echo json_encode(['message' => 'Login failed. Incorrect username or password.', 'success' => false]);
}
?>

