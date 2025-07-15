<?php
$user_id = $_POST['user_id'];
$password = $_POST['password'];

$valid_password = "admin123"; // Replace with real database check

if ($password !== $valid_password) {
    echo "Invalid employee password.";
    exit();
}

if (str_starts_with($user_id, "T")) {
    header("Location: technician_dashboard.html");
} else {
    header("Location: supervisor_dashboard.html");
}
exit();
?>
