<?php
$conn = new mysqli("localhost", "root", "", "task_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = trim($_POST['name']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username or email already exists
$check = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
$check->bind_param("ss", $username, $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "❌ That username or email is already registered.";
    exit();
}

// Insert new user
$stmt = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $username, $email, $hashed_password);

if ($stmt->execute()) {
    header("Location: index.html");  // redirect to login
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>