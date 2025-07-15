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

    .services-title {
      font-size: 28px;
      color: #004080;
      margin-bottom: 30px;
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
      <a href="#">Home</a>
      <a href="meter_data.php">Meter Data</a>
      <a href="#">Support & Help</a>
    </div>
    <div class="profile-menu">
      <button onclick="toggleDropdown()" title="Personal Profile"><i class="fas fa-user"></i></button>
      <div id="dropdownMenu" class="dropdown">
        <a href="my_profile.php">My Profile</a>
        <a href="edit_info.php">Edit Info</a>
        <a href="pay_bill.php">Pay Bill</a>
        <a href="my_requests.php">My Requests</a>
        <a href="#">Log out</a>
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
        <a href="#" class="service-link">Request a New Water Meter</a>
      </div>
      <div class="card">
        <p class="service-description">Register a meter that is already installed but not yet in the system.</p>
        <a href="#" class="service-link">Register an Unregistered Water Meter</a>
      </div>
      <div class="card">
        <p class="service-description">Submit a formal complaint regarding service, billing, or staff behavior.</p>
        <a href="#" class="service-link">Raise a Complaint</a>
      </div>
      <div class="card">
        <p class="service-description">Request urgent maintenance or report water-related issues.</p>
        <a href="#" class="service-link">Request Maintenance / Report</a>
      </div>
    </div>
  </div>

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
  </script>

</body>
</html>
