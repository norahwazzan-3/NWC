<?php
$uploadDir = 'uploads/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true); // Creates folder if it doesn't exist
}

if (!empty($_FILES['attachment']['name'])) {
    $fileName = basename($_FILES['attachment']['name']);
    $targetFile = $uploadDir . time() . '_' . $fileName;

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/webm'];

    if (in_array($_FILES['attachment']['type'], $allowedTypes)) {
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $targetFile)) {
            echo "File uploaded successfully!";
        } else {
            die("File upload failed.");
        }
    } else {
        die("Invalid file type.");
    }
} else {
    die("No file uploaded.");
}
?>
