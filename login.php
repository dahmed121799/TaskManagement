<?php
$conn = new mysqli("localhost", "root", "", "task_management");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$identifier = $_POST['identifier'];
$password = $_POST['password'];

// Search for user by email OR username
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ? OR username = ?");
$stmt->bind_param("ss", $identifier, $identifier);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        header("Location: dashboard.html");  // redirect to dashboard
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ User not found.";
}

$stmt->close();
$conn->close();
?>