<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Meter Data - National Water Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f4f8fb;
      margin: 0;
      padding: 40px 20px;
    }

    h1 {
      text-align: center;
      color: #004080;
      margin-bottom: 40px;
    }

    .meter-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .meter-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      transition: transform 0.2s ease;
    }

    .meter-card:hover {
      transform: translateY(-5px);
    }

    .meter-title {
      font-size: 18px;
      font-weight: 600;
      color: #004080;
      margin-bottom: 10px;
    }

    .meter-info {
      font-size: 15px;
      color: #333;
      margin-bottom: 6px;
    }

    .meter-label {
      font-weight: 600;
      color: #007bff;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

  <h1>Meter Data</h1>

  <div class="meter-grid">
    <!-- Meter Card 1 -->
    <div class="meter-card">
      <div class="meter-title">Meter #001</div>
      <div class="meter-info"><span class="meter-label">Status:</span> Active</div>
      <div class="meter-info"><span class="meter-label">Last Reading:</span> 1570 m³</div>
      <div class="meter-info"><span class="meter-label">Installed On:</span> 2022-05-10</div>
      <div class="meter-info"><span class="meter-label">Property Address:</span> King Fahd St, Riyadh</div>
    </div>

    <!-- Meter Card 2 -->
    <div class="meter-card">
      <div class="meter-title">Meter #002</div>
      <div class="meter-info"><span class="meter-label">Status:</span> Under Maintenance</div>
      <div class="meter-info"><span class="meter-label">Last Reading:</span> 980 m³</div>
      <div class="meter-info"><span class="meter-label">Installed On:</span> 2021-08-23</div>
      <div class="meter-info"><span class="meter-label">Property Address:</span> Al Olaya, Riyadh</div>
    </div>

    <!-- Add more cards here -->
  </div>

</body>
</html>
