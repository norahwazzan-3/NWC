<?php
session_start();
include 'db.php'; // Database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Error: You must be logged in to view your requests.");
}

$user_id = $_SESSION['user_id'];

// Fetch user requests
$sql = "SELECT 
          r.Request_ID,
          r.Service_Type,
          r.Request_Date,
          s.Request_Status_name,
          t.Full_Name AS Technician_Name,
          r.Description
        FROM request r
        LEFT JOIN request_status s ON r.Request_Status_ID = s.Request_Status_ID
        LEFT JOIN tasks tk ON r.Request_ID = tk.Request_ID
        LEFT JOIN user t ON tk.Technician_ID = t.User_ID
        WHERE r.User_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Requests - National Water Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #e6f7ff;
      margin: 0;
      padding: 40px;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    h1 {
      text-align: center;
      color: #004080;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th {
      background-color: #f0f8ff;
      color: #004080;
      padding: 12px;
      text-align: left;
    }

    td {
      padding: 10px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .placeholder {
      text-align: center;
      padding: 40px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>My Requests</h1>

    <?php if ($result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Request ID</th>
          <th>Service Type</th>
          <th>Date</th>
          <th>Status</th>
          <th>Technician</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['Request_ID']); ?></td>
            <td><?php echo htmlspecialchars($row['Service_Type']); ?></td>
            <td><?php echo htmlspecialchars($row['Request_Date']); ?></td>
            <td><?php echo htmlspecialchars($row['Request_Status_name']); ?></td>
            <td><?php echo htmlspecialchars($row['Technician_Name'] ?? 'Not Assigned'); ?></td>
            <td><?php echo htmlspecialchars($row['Description']); ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php else: ?>
      <div class="placeholder">No requests found.</div>
    <?php endif; ?>
  </div>
</body>
</html>