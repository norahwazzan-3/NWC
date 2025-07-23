<?php
session_start();
include("db.php");

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: client_login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "
SELECT 
    m.Meter_ID,
    m.Meter_Number,
    m.Installation_Date,
    p.Address AS Property_Address,
    s.Status_Name AS Status,
    r.Reading_Value,
    r.Reading_Date
FROM meters m
JOIN properties p ON m.Property_ID = p.Property_ID
JOIN meter_status s ON m.Meter_Status_ID = s.Meter_Status_ID
LEFT JOIN meter_reading r ON m.Meter_ID = r.Meter_ID
WHERE p.User_ID = ?
ORDER BY r.Reading_Date DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$meterData = [];
while ($row = $result->fetch_assoc()) {
    $meter_id = $row['Meter_ID'];
    if (!isset($meterData[$meter_id])) {
        $meterData[$meter_id] = [
            'Meter_Number' => $row['Meter_Number'],
            'Installation_Date' => $row['Installation_Date'],
            'Status' => $row['Status'],
            'Property_Address' => $row['Property_Address'],
            'Readings' => []
        ];
    }
    if ($row['Reading_Value']) {
        $meterData[$meter_id]['Readings'][] = [
            'value' => $row['Reading_Value'],
            'date' => $row['Reading_Date']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Meter Data</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen p-6 font-sans">

  <div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">📊 Meter Data Overview</h1>

    <?php foreach ($meterData as $id => $meter): ?>
      <div class="bg-white shadow-lg rounded-xl p-6 mb-8 border border-blue-100">
        <h2 class="text-xl font-semibold text-blue-700 mb-2">Meter #<?= htmlspecialchars($meter['Meter_Number']) ?></h2>
        <p><strong>Status:</strong> <?= htmlspecialchars($meter['Status']) ?></p>
        <p><strong>Installed At:</strong> <?= htmlspecialchars($meter['Installation_Date']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($meter['Property_Address']) ?></p>

        <?php if (count($meter['Readings']) > 0): ?>
          <div class="mt-4">
            <canvas id="chart_<?= $id ?>"></canvas>
          </div>
          <script>
            const ctx<?= $id ?> = document.getElementById('chart_<?= $id ?>').getContext('2d');
            new Chart(ctx<?= $id ?>, {
              type: 'line',
              data: {
                labels: <?= json_encode(array_column($meter['Readings'], 'date')) ?>,
                datasets: [{
                  label: 'Reading Value',
                  data: <?= json_encode(array_column($meter['Readings'], 'value')) ?>,
                  borderColor: 'rgba(59, 130, 246, 1)',
                  backgroundColor: 'rgba(59, 130, 246, 0.1)',
                  borderWidth: 2,
                  fill: true,
                  tension: 0.4
                }]
              },
              options: {
                responsive: true,
                plugins: {
                  legend: { display: true },
                  tooltip: { mode: 'index', intersect: false }
                },
                scales: {
                  x: { display: true, title: { display: true, text: 'Date' } },
                  y: { display: true, title: { display: true, text: 'Value' }, beginAtZero: true }
                }
              }
            });
          </script>
        <?php else: ?>
          <p class="text-gray-500 mt-4">No readings available.</p>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>

    <?php if (count($meterData) == 0): ?>
      <div class="text-center text-gray-600 text-lg mt-10">
        No meters found for your account.
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
