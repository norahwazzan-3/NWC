<?php
session_start();

// Temporary hardcoded values (replace with actual session checks later)
$_SESSION['user_name'] = "Ahmed Al-Fahad";
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>National Water Company - Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background: url('image_n/nwc_image.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #004080;
      padding: 15px 30px;
      color: white;
    }

    .nav-links {
      display: flex;
      gap: 30px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 600;
    }

    .profile-menu {
      position: relative;
    }

    .profile-menu button {
      background: transparent;
      border: none;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .dropdown {
      position: absolute;
      right: 0;
      top: 45px;
      background: white;
      color: #333;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
      display: none;
      flex-direction: column;
      width: 200px;
      z-index: 1000;
    }

    .dropdown a {
      padding: 12px 16px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
    }

    .dropdown a:last-child {
      border-bottom: none;
    }

    .show {
      display: flex;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 120px 20px 50px;
      position: relative;
    }

    .welcome-text {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #004080;
      background-color: rgba(255, 255, 255, 0.5);
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .sub-box {
      background-color: rgba(255, 255, 255, 0.5);
      padding: 20px;
      border-radius: 12px;
      max-width: 700px;
      margin-top: 10px;
      transition: transform 0.3s ease;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .sub-box:hover {
      transform: scale(1.05);
    }

    .sub-text {
      font-size: 16px;
      color: #004080;
      line-height: 1.6;
    }

    .services-section {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 5%;
      background-color: rgba(255,255,255,0);
      width: 100%;
    }

    .services-column {
      display: flex;
      flex-direction: column;
      gap: 30px;
      width: 75%;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      padding: 35px;
      border-radius: 18px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      font-size: 18px;
      font-weight: 600;
      color: #004080;
      cursor: pointer;
      transition: transform 0.2s;
      text-align: left;
    }

    .card:hover {
      transform: translateY(-5px);
      background-color: #e6f0ff;
    }

    .card p {
      margin-bottom: 12px;
      font-size: 15px;
      font-weight: normal;
    }

    .service-link {
      text-decoration: none;
      color: #004080;
      font-weight: bold;
      font-size: 17px;
    }

    .service-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      .services-section {
        flex-direction: column;
        align-items: center;
      }

      .services-column {
        width: 90%;
        align-items: center;
      }

      .card {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="nav-links">
      <a href="company_info.php">Company Info</a>
      <a href="meter_data.php">Meter Data</a>
      <a href="support_help.php">Support & Help</a>
    </div>
    <div class="profile-menu">
      <button onclick="toggleDropdown()" title="Personal Profile"><i class="fas fa-user"></i></button>
      <div id="dropdownMenu" class="dropdown">
        <a href="my_profile.php">My Profile</a>
        <a href="edit_info.php">Edit Info</a>
        <a href="pay_bill.php">Pay Bill</a>
        <a href="my_requests.php">My Requests</a>
        <a href="client_login.html">Log out</a>
      </div>
    </div>
  </header>

  <main>
    <div class="welcome-text">Welcome to the National Water Company</div>
    <div class="sub-box">
      <p class="sub-text">
        Providing clean, safe, and reliable water services to every home across the Kingdom — with efficiency, transparency, and innovation at the core of everything we do.
      </p>
    </div>
  </main>

  <div class="services-section">
    <div class="services-column">
      <div class="card">
        <p class="service-description">Apply for a new water meter installation for your property.</p>
        <a href="new_delivery.html" class="service-link">Request a New Water Meter</a>
      </div>
      <div class="card">
        <p class="service-description">Register a meter that is already installed but not yet in the system.</p>
        <a href="register_delivery.html" class="service-link">Register an Unregistered Water Meter</a>
      </div>
      <div class="card">
        <p class="service-description">Submit a formal complaint regarding service, billing , or staff behavior.</p>
        <a href="report_complaint.html" class="service-link">Raise a Complaint</a>
      </div>
      <div class="card">
        <p class="service-description">Request urgent maintenance or report water-related issues.</p>
        <a href="maintenance.html" class="service-link">Request Maintenance / Report</a>
      </div>
    </div>
  </div>

  <!-- MAP SECTION -->
  <section style="padding: 60px 20px; background: #f0f8ff;">
    <h2 style="text-align: center; color: #004080; font-size: 28px; margin-bottom: 20px;">Water Network Coverage Map</h2>
    <div id="map" style="height: 450px; width: 100%; max-width: 1000px; margin: auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);"></div>
  </section>

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById("dropdownMenu");
      dropdown.classList.toggle("show");
    }

    window.onclick = function(e) {
      if (!e.target.closest('.profile-menu')) {
        document.getElementById("dropdownMenu").classList.remove("show");
      }
    }

    // Initialize map
    var map = L.map('map').setView([23.8859, 45.0792], 5); // Center on KSA

    // Tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const areas = [
  // Al-Qassim Neighborhoods (temporary coordinates - center of Al-Qassim)
  { name: "الأندلس", coords: [26.3, 43.95], status: "✅ Completed" },
  { name: "الوادي", coords: [26.31, 43.94], status: "🛠️ In Progress – ETA: Sep 2025" },
  { name: "اليرموك", coords: [26.305, 43.945], status: "⏳ Planned" },
  { name: "الرمال", coords: [26.31, 43.955], status: "✅ Completed" },
  { name: "المروة", coords: [26.308, 43.952], status: "✅ Completed" },
  { name: "الخضر", coords: [26.312, 43.947], status: "🛠️ In Progress" },
  { name: "اللسيب", coords: [26.307, 43.957], status: "⏳ ETA: 2026" },
  { name: "القضيعة", coords: [26.299, 43.939], status: "✅ Completed" },
  { name: "الغدير", coords: [26.304, 43.938], status: "🛠️ In Progress" },
  { name: "السالمية", coords: [26.31, 43.942], status: "✅ Completed" },
  { name: "الروابي", coords: [26.298, 43.958], status: "⏳ ETA: 2025" },
  { name: "حويلان", coords: [26.294, 43.962], status: "✅ Completed" },
  { name: "خضراء", coords: [26.293, 43.948], status: "🛠️ Ongoing" },
  { name: "الصباخ", coords: [26.296, 43.954], status: "✅ Completed" },
  { name: "واسط", coords: [26.292, 43.943], status: "⏳ ETA: Dec 2025" },
  { name: "السلام", coords: [26.288, 43.941], status: "✅ Completed" },
  // ... (add the rest here in the same structure)
];


    areas.forEach(area => {
      L.marker(area.coords).addTo(map)
        .bindPopup(`<strong>${area.name}</strong><br>${area.status}`);
    });
  </script>
  <?php include 'ai_widget.html'; ?>

</body>
</html>
