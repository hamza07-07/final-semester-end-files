<?php
// Database configuration
$host = "localhost";
$dbname = "caregroup";
$username = "root";      // Change this to your DB username
$password = "";          // Change this to your DB password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// Get form data
$user = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Simple validation
if (empty($user) || empty($email) || empty($message)) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (username, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $user, $email, $message);

// Execute and check
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Feedback submitted successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
