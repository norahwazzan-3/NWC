<?php
require 'db_connect.php';

if (isset($_POST['national_id'])) {
    $id = $_POST['national_id'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE National_ID = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo $result->num_rows > 0 ? "exists" : "not_found";
}
?>
