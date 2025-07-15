<?php
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM user WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            header("Location: client_homepage.html");
            exit();
        } else {
            echo "<script>alert('❌ Incorrect password.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ National ID not found.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}