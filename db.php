<?php
$servername = "localhost";
$username = "root";            // ✅ Use your actual MySQL username
$password = "";                // ✅ Default is empty in XAMPP
$dbname = "nwc_project";       // ✅ Make sure this matches your real DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// ✅ Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

