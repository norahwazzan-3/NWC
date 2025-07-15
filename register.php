<?php
// Database connection
$host = 'localhost';
$db   = 'nwc';
$user = 'root';
$pass = ''; // update if your MySQL password is set

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from form
$full_name   = $_POST['full_name'];
$national_id = $_POST['national_id'];
$phone       = $_POST['phone'];
$email       = $_POST['email'];
$dob         = $_POST['dob'];
$password    = $_POST['password'];
$confirm     = $_POST['confirm_password'];

// Match passwords
if ($password !== $confirm) {
    die("❌ Passwords do not match.");
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if National ID already exists
$check = $conn->prepare("SELECT * FROM user WHERE National_ID = ?");
$check->bind_param("s", $national_id);
$check->execute();
$result = $check->get_result();
if ($result->num_rows > 0) {
    die("⚠️ National ID is already registered.");
}

// Insert user data
$stmt = $conn->prepare("INSERT INTO user (National_ID, Full_Name, Phone, Email, Password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $national_id, $full_name, $phone, $email, $hashedPassword);

if ($stmt->execute()) {
    echo "✅ Registration successful!";
    // header("Location: login.html");
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>