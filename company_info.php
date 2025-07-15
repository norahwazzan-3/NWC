<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Company Information - National Water Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background: url('image_n/nwc_image.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    body.loaded {
      opacity: 1;
    }

    .info-box {
      background-color: rgba(255, 255, 255, 0.85);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
      max-width: 900px;
      width: 100%;
      text-align: center;
      color: #004080;
    }

    .info-box h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .info-box h2 {
      font-size: 24px;
      margin-top: 30px;
      margin-bottom: 10px;
    }

    .info-box p {
      font-size: 18px;
      line-height: 1.8;
      margin-bottom: 15px;
    }

    .back-link {
      display: inline-block;
      margin-top: 30px;
      font-size: 16px;
      color: #007bff;
      text-decoration: none;
      cursor: pointer;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="info-box">
    <h1>About the National Water Company</h1>
    <p>The National Water Company is dedicated to providing clean, safe, and sustainable water services to all residents and businesses across the Kingdom of Saudi Arabia.</p>

    <h2>Our Vision</h2>
    <p>To become a world-class leader in water utility operations, ensuring the sustainability of water resources and contributing to national transformation goals.</p>

    <h2>Our Mission</h2>
    <p>Deliver reliable and sustainable water services while maintaining customer satisfaction, operational excellence, and innovation in water distribution and wastewater management.</p>

    <h2>Contact</h2>
    <p>Email: info@nwc.com.sa<br>Phone: +966 9200 00174<br>Address: Riyadh, Kingdom of Saudi Arabia</p>

    <a href="index.php" class="back-link" onclick="fadeToPage(event, this.href)">← Back to Home page</a>
  </div>

  <script>
    function fadeToPage(event, href) {
      event.preventDefault(); // stop immediate jump
      document.body.style.transition = "opacity 0.5s";
      document.body.style.opacity = 0;

      setTimeout(function () {
        window.location.href = href;
      }, 200); // match fade duration
    }

    // Fade in on page load
    window.addEventListener('load', function () {
      document.body.classList.add('loaded');
    });
  </script>

</body>
</html>










