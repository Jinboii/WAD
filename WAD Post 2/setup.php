<?php

$servername = "localhost";  // Replace with your MySQL server host name
$username = "root";     // Replace with your MySQL database username
$password = "root";     // Replace with your MySQL database password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create "rebirth" database
$sql = "CREATE DATABASE IF NOT EXISTS rebirth";
if ($conn->query($sql) !== TRUE) {
    die("Error creating database: " . $conn->error);
}

// Select the "rebirth" database
$conn->select_db('rebirth');

// SQL to create "post" table
$sql = "CREATE TABLE IF NOT EXISTS post (
    postID VARCHAR(255) PRIMARY KEY,
    userID VARCHAR(255) NOT NULL,
    postTitle VARCHAR(255) NOT NULL,
    postContent TEXT NOT NULL,
    postDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

echo "Database and table setup completed successfully.";

$conn->close();

?>

