<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: contactFormPage.php");
    exit();
}

// Get POST data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Validation
$errors = [];
$validData = [];

// Validate name
if (empty(trim($name))) {
    $errors['name'] = 'Name is required';
} else {
    $validData['name'] = trim($name);
}

// Validate email
if (empty(trim($email))) {
    $errors['email'] = 'Email is required';
} else {
    // Email format validation
    if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    } else {
        $validData['email'] = trim($email);
    }
}

// Validate message
if (empty(trim($message))) {
    $errors['message'] = 'Message is required';
} else {
    $validData['message'] = trim($message);
}

// If there are errors, redirect back to form
if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_data'] = [
        'name' => $name,
        'email' => $email,
        'message' => $message
    ];
    header("Location: contactFormPage.php");
    exit();
}

// If validation passed, proceed with database insertion
// DB connection settings
$server = "localhost";
$username = "root";
$password = "";
$database = "Damon_dev_site";

try {
    // Create PDO connection
    $dsn = "mysql:host=$server;dbname=$database;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    // Prepare statement
    $stmt = $pdo->prepare("
        INSERT INTO contactMessages (name, email, message)
        VALUES (:name, :email, :message)
    ");

    // Execute with named parameters
    $stmt->execute([
        ':name' => $validData['name'],
        ':email' => $validData['email'],
        ':message' => $validData['message']
    ]);

    // Store first name in cookie (extract from full name)
    $firstName = explode(' ', $validData['name'])[0];
    setcookie('user_first_name', $firstName, time() + 3600, '/'); // Cookie expires in 1 hour

    header("Location: success.php");
    exit();

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
