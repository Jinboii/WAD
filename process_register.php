<?php
require_once 'autoload.php';

// Enabling error display
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['message' => 'Invalid request method.']);
    exit;
}

// Always start with setting the header for JSON output
header('Content-Type: application/json');

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if (!isset($data['username']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['message' => 'Incomplete registration data provided.']);
    exit;
}
 
$passwordDAO = new PasswordDAO();

// Check if the username is unique
if (!$passwordDAO->checkUniqueUsername($data['username'])) {
    http_response_code(409); // Conflict
    echo json_encode(['message' => 'Username already exists. Please choose a different one.']);
    exit;
}

// Hash the password before storing it
$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

// Attempt to save the user's data to the database
if ($passwordDAO->savePassword($data['username'], $data['email'], $hashedPassword, $data['role'])) {
    echo json_encode(['message' => "Registration successful for: " . $data['username'], 'success' => true]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['message' => 'Registration failed. Please try again later.']);
}
?>

