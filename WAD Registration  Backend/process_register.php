<?php
// Setting the content type as JSON
header('Content-Type: application/json');

// Checking for a valid POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['message' => 'Invalid request method.']);
    exit;
}

// Getting the raw POST data from the input stream
$rawData = file_get_contents("php://input");

// Decoding the JSON data
$data = json_decode($rawData, true);

// Checking if the required data was sent and is valid
if (!isset($data['username']) || !isset($data['email']) || !isset($data['password']) || !isset($data['role'])) {
    echo json_encode(['message' => 'Incomplete registration data provided.']);
    exit;
}


// At this point, you can process the data, for instance, saving it to a database
// For the purpose of this example, we'll just return the username to confirm that we received the data

echo json_encode(['message' => "Registration successful for: " . $data['username']]);

?>
