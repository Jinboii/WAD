<?php
require_once 'PasswordDAO.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check for a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['message' => 'Invalid request method.']);
    exit;
}

// Get the raw POST data
$rawData = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($rawData, true);

// Validate the received data
if (!isset($data['username']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
    echo json_encode(['message' => 'Incomplete registration data provided.']);
    exit;
}

// Initialize the PasswordDAO
$passwordDAO = new PasswordDAO();

// Hash the password before storing it
$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

// Save the data to the database
$result = $passwordDAO->savePassword($data['username'], $data['email'], $hashedPassword, $data['role']);

// Respond with an appropriate message
if ($result) {
    echo json_encode(['message' => "Registration successful for: " . $data['username']]);
} else {
    echo json_encode(['message' => 'Registration failed. Please try again later.']);
}

?>
