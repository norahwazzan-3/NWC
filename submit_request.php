<?php
session_start();
require_once 'db.php';

try {
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User not logged in.");
    }
    $user_id = $_SESSION['user_id'];

    // Safe form input
    $coordinates = $_POST['coordinates'] ?? '';
    $area = $_POST['area'] ?? '';
    $land_status = $_POST['land_status'] ?? '';
    $contact_number = $_POST['contact_number'] ?? '';
    $address = $_POST['address'] ?? '';
    $city = $_POST['city'] ?? '';
    $description = $_POST['description'] ?? '';
    $service_type = $_POST['service_type'] ?? '';
    $ownership_status = $_POST['ownership_status'] ?? '';
    $deed_number = $_POST['deed_number'] ?? '';
    $owner_national_id = $_POST['owner_national_id'] ?? '';
    $preferred_time = $_POST['preferred_time'] ?? '';
    $complaint_type = $_POST['complaint_type'] ?? '';
    $maintenance_type = $_POST['maintenance_type'] ?? '';

    // File upload
    $attachment_path = '';
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $attachment_path = $upload_dir . time() . "_" . basename($_FILES['attachment']['name']);
        move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment_path);
    }

    // Insert into properties
    $stmt = $conn->prepare("INSERT INTO properties (Coordinates, Installed_at, Address, Area, City, User_ID, Contact_Number, Land_Status, Ownership_Status, Deed_Number, Owner_National_ID) VALUES (?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissssi", $coordinates, $address, $area, $city, $user_id, $contact_number, $land_status, $ownership_status, $deed_number, $owner_national_id);
    $stmt->execute();
    $property_id = $conn->insert_id;

    // Insert into request
    $stmt2 = $conn->prepare("INSERT INTO request (Request_Date, Service_Type, Description, Attachment_Path, Request_Status_ID, User_ID, Property_ID, Meter_ID, Preferred_Time, Complaint_Type, Maintenance_Type) VALUES (NOW(), ?, ?, ?, 1, ?, ?, NULL, ?, ?, ?)");
    $stmt2->bind_param("sssiiiss", $service_type, $description, $attachment_path, $user_id, $property_id, $preferred_time, $complaint_type, $maintenance_type);
    $stmt2->execute();

    echo "<script>alert('Your request has been submitted successfully.'); window.location.href='index.php';</script>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>