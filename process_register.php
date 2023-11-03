<?php
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
