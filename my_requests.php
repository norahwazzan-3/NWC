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
        <tr>
          <td>R001</td>
          <td>New Water Meter</td>
          <td>2025-07-10</td>
          <td>Pending</td>
          <td>Ahmed Nasser</td>
          <td>Request for a new water meter installation on property</td>
        </tr>
        <tr>
          <td>R002</td>
          <td>Maintenance</td>
          <td>2025-07-11</td>
          <td>Completed</td>
          <td>Fatima Ali</td>
          <td>Leakage reported in bathroom area, fixed by technician</td>
        </tr>
        <tr>
          <td>R003</td>
          <td>Complaint</td>
          <td>2025-07-12</td>
          <td>In Progress</td>
          <td>Khalid Mansour</td>
          <td>Complaint about high water bill and inaccurate readings</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
