<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Billing – National Water Portal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function showBills() {
      const selected = document.getElementById('meter_select').value;
      const billsSection = document.getElementById('bills_section');
      const paymentOptions = document.getElementById('payment_options');
      if (selected) {
        billsSection.classList.remove('hidden');
        paymentOptions.classList.add('hidden');
      } else {
        billsSection.classList.add('hidden');
      }
    }

    function showPaymentOptions(billId) {
      const paymentOptions = document.getElementById('payment_options');
      document.getElementById('bill_to_pay').textContent = billId;
      paymentOptions.classList.remove('hidden');
      paymentOptions.scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</head>
<body class="bg-cover bg-center min-h-screen font-[Inter] bg-[url('image_n/nwc_image.jpg')] text-gray-800">

  <!-- Top Navbar -->
  <header class="bg-blue-900 text-white flex justify-between items-center px-6 py-4">
    <div class="flex gap-8">
      <a href="index.php" class="hover:underline">Home</a>
      <a href="my_requests.php" class="hover:underline">My Requests</a>
      <a href="pay_bill.php" class="underline font-semibold">Pay Bill</a>
      <a href="#" class="hover:underline">Support</a>
    </div>
    <div class="relative">
      <button onclick="toggleDropdown()" title="Profile"><i class="fas fa-user"></i></button>
      <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white text-black shadow rounded hidden z-50">
        <a href="my_profile.php" class="block px-4 py-2 hover:bg-gray-100">My Profile</a>
        <a href="edit_info.php" class="block px-4 py-2 hover:bg-gray-100">Edit Info</a>
        <a href="pay_bill.php" class="block px-4 py-2 hover:bg-gray-100">Pay Bill</a>
        <a href="my_requests.php" class="block px-4 py-2 hover:bg-gray-100">My Requests</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Log Out</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="p-8 max-w-6xl mx-auto">
    <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-6 mb-6">
      <h1 class="text-3xl font-bold text-blue-900 mb-4">Bills & Payments</h1>

      <!-- Meter Selector -->
      <label for="meter_select" class="block font-semibold mb-2">Select Meter Number</label>
      <select id="meter_select" onchange="showBills()" class="w-full border border-gray-300 rounded px-3 py-2 mb-4">
        <option value="">-- Select a meter --</option>
        <option value="MTR001">MTR001</option>
        <option value="MTR002">MTR002</option>
        <option value="MTR003">MTR003</option>
      </select>

      <!-- Bills Table -->
      <div id="bills_section" class="hidden">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="border-b">
              <th class="pb-2">Bill ID</th>
              <th class="pb-2">Amount (SAR)</th>
              <th class="pb-2">Due Date</th>
              <th class="pb-2">Status</th>
              <th class="pb-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2">BILL1001</td>
              <td class="py-2">150.00</td>
              <td class="py-2">2025-07-15</td>
              <td class="py-2"><span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">Unpaid</span></td>
              <td class="py-2">
                <button onclick="showPaymentOptions('BILL1001')" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Pay</button>
              </td>
            </tr>
            <tr class="border-b">
              <td class="py-2">BILL1000</td>
              <td class="py-2">120.00</td>
              <td class="py-2">2025-06-15</td>
              <td class="py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Paid</span></td>
              <td class="py-2">
                <button class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed" disabled>Paid</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Payment Options -->
      <div id="payment_options" class="mt-6 hidden">
        <h2 class="text-xl font-bold text-blue-900 mb-3">Payment Methods for <span id="bill_to_pay"></span></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <button class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Mada</button>
          <button class="bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Visa / MasterCard</button>
          <button class="bg-gray-800 text-white py-2 rounded hover:bg-gray-900">Apple Pay</button>
        </div>
      </div>
    </div>
  </main>

  <script>
    function toggleDropdown() {
      const dropdown = document.getElementById("dropdownMenu");
      dropdown.classList.toggle("hidden");
    }
  </script>
</body>
</html>
