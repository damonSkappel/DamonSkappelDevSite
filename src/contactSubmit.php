<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection settings — update these
$server = "localhost";
$username = "root";
$password = ""; // XAMPP default
$database = "your_personal_database"; // CHANGE THIS

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data safely
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Prepare statement
$stmt = $conn->prepare("
    INSERT INTO contactMessages (name, email, message)
    VALUES (?, ?, ?)
");

$stmt->bind_param("sss", $name, $email, $message);

// Execute + redirect
if ($stmt->execute()) {
    header("Location: success.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
