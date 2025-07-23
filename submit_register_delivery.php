<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'] ?? null;
    if (!$userId) {
        die("User not logged in.");
    }

    $area = $_POST['area'] ?? '';
    $address = $_POST['existing_address'] ?? '';
    $meterNumber = $_POST['meter_number'] ?? '';
    $contactNumber = $_POST['contact_number'] ?? '';
    $ownershipType = $_POST['ownership_type'] ?? '';
    $deedNumber = ($ownershipType === 'owner') ? ($_POST['deed_number_owner'] ?? '') : ($_POST['deed_number_auth'] ?? '');
    $ownerNationalId = $_POST['owner_national_id'] ?? '';
    $landStatus = $_POST['land_status'] ?? '';
    $ownershipStatus = $ownershipType; // alias
    $preferredTime = $_POST['preferred_time'] ?? '';
    $complaintType = $_POST['complaint_type'] ?? '';
    $maintenanceType = $_POST['maintenance_type'] ?? '';
    $coordinates = $_POST['coordinates'] ?? '';

    $attachmentPath = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
        $attachmentPath = $uploadDir . time() . "_" . basename($_FILES["attachment"]["name"]);
        move_uploaded_file($_FILES["attachment"]["tmp_name"], $attachmentPath);
    }

    $stmtProp = $conn->prepare("INSERT INTO properties (Address, Area, Contact_Number, User_ID, Land_Status, Ownership_Status, Deed_Number, Owner_National_ID, Coordinates) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtProp->bind_param("sssisssss", $address, $area, $contactNumber, $userId, $landStatus, $ownershipStatus, $deedNumber, $ownerNationalId, $coordinates);

    if ($stmtProp->execute()) {
        $propertyId = $stmtProp->insert_id;
        $serviceType = 'register_delivery';
        $defaultMeterStatusId = 1;

        $stmtMeter = $conn->prepare("INSERT INTO meters (Service_Type, Meter_Number, Property_ID, User_ID, Meter_Status_ID) VALUES (?, ?, ?, ?, ?)");
        $stmtMeter->bind_param("ssiii", $serviceType, $meterNumber, $propertyId, $userId, $defaultMeterStatusId);

        if ($stmtMeter->execute()) {
            $meterId = $stmtMeter->insert_id;
            $description = '';

            $stmtReq = $conn->prepare("INSERT INTO request (Request_Date, Service_Type, Description, Attachment_Path, Request_Status_ID, User_ID, Property_ID, Meter_ID, Preferred_Time, Complaint_Type, Maintenance_Type) VALUES (NOW(), ?, ?, ?, 1, ?, ?, ?, ?, ?, ?)");
            $stmtReq->bind_param("sssiiiiss", $serviceType, $description, $attachmentPath, $userId, $propertyId, $meterId, $preferredTime, $complaintType, $maintenanceType);

            if ($stmtReq->execute()) {
                echo "<script>alert('Request submitted successfully!'); window.location.href = 'index.php';</script>";
            } else {
                die("Request insert failed: " . $stmtReq->error);
            }
        } else {
            die("Meter insert failed: " . $stmtMeter->error);
        }
    } else {
        die("Property insert failed: " . $stmtProp->error);
    }
}
?>
