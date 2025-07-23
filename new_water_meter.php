<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Request New Water Connection</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    function toggleOwnershipFields(value) {
      const ownerFields = document.getElementById('owner-fields');
      const authFields = document.getElementById('auth-fields');
      if (value === 'owner') {
        ownerFields.classList.remove('hidden');
        authFields.classList.add('hidden');
      } else {
        authFields.classList.remove('hidden');
        ownerFields.classList.add('hidden');
      }
    }
  </script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-200 min-h-screen flex items-center justify-center p-6">

  <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-5xl">
    <div class="text-center mb-10">
      <h2 class="text-4xl font-extrabold text-blue-800 mb-3">Request a New Water Connection</h2>
      <p class="text-gray-600 text-lg">Please fill out the following details to submit your request.</p>
    </div>

    <form action="submit_request.php" method="POST" enctype="multipart/form-data" class="space-y-6">
      <input type="hidden" name="service_type" value="Request New Water Meter">

      <!-- Two Columns -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Left Column -->
        <div class="space-y-6">
          <!-- Coordinates -->
          <div>
            <label class="block mb-2 text-gray-700 font-medium">Coordinates</label>
            <input type="text" name="coordinates" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" />
          </div>

          <!-- Area -->
          <div>
            <label class="block mb-2 text-gray-700 font-medium">Area in KSA</label>
            <select name="area" id="area" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
              <option value="">-- Select Area --</option>
              <option value="riyadh">Riyadh</option>
              <option value="alqassim">Al-Qassim-Buraydah</option>
              <option value="alqassim2">Al-Qassim-Unaizah</option>
              <option value="dawadmi">Dawadmi</option>
              <option value="wadi_dawasir">Wadi ad-Dawasir</option>
              <option value="shaqra">Shaqra</option>
              <option value="majmaah">Al Majma'ah</option>
              <option value="zulfi">Al Zulfi</option>
              <option value="kharj">Al Kharj</option>
              <option value="ghat">Al Ghat</option>
              <option value="afif">Afif</option>
            </select>
          </div>

          <!-- Address -->
          <div>
            <label class="block mb-2 font-medium text-gray-700">Address</label>
            <input type="text" name="address" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" />
          </div>

          <!-- Contact -->
          <div>
            <label class="block mb-2 font-medium text-gray-700">Contact Number</label>
            <input type="tel" name="contact_number" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" />
          </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
          <!-- Land Status -->
          <div>
            <label class="block mb-2 font-medium text-gray-700">Is the land one single piece?</label>
            <div class="flex gap-6">
              <label class="inline-flex items-center">
                <input type="radio" name="land_status" value="Single Plot" required class="mr-2"> Yes
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="land_status" value="Subdivided" required class="mr-2"> No, I have land division
              </label>
            </div>
          </div>

          <!-- Ownership -->
          <div>
            <label class="block mb-2 font-medium text-gray-700">Do you own the property?</label>
            <div class="flex gap-6">
              <label class="inline-flex items-center">
                <input type="radio" name="ownership_type" value="owner" required class="mr-2" onclick="toggleOwnershipFields('owner')"> I'm the owner
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="ownership_type" value="authorized" required class="mr-2" onclick="toggleOwnershipFields('authorized')"> I have authorization
              </label>
            </div>
          </div>

          <!-- Upload -->
          <div>
            <label class="block mb-2 font-medium text-gray-700">Upload Documents</label>
            <input type="file" name="attachment" accept=".pdf,.jpg,.jpeg,.png" class="w-full px-4 py-2 border rounded-lg" />
          </div>
        </div>
      </div>

      <!-- Owner Fields -->
      <div id="owner-fields" class="hidden">
        <label class="block mt-4 mb-2 text-gray-700 font-medium">Deed Number</label>
        <input type="text" name="deed_number_owner" class="w-full px-4 py-2 border rounded-lg" />
      </div>

      <!-- Authorized Fields -->
      <div id="auth-fields" class="hidden">
        <label class="block mt-4 mb-2 text-gray-700 font-medium">Owner National ID</label>
        <input type="text" name="owner_national_id" class="w-full mb-4 px-4 py-2 border rounded-lg" />
        <label class="block mb-2 font-medium text-gray-700">Deed Number</label>
        <input type="text" name="deed_number_auth" class="w-full px-4 py-2 border rounded-lg" />
      </div>

      <!-- Description -->
      <div>
        <label class="block mb-2 font-medium text-gray-700">Request Description</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400"></textarea>
      </div>

      <!-- Submit -->
      <div>
        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-3 rounded-xl shadow-md hover:from-blue-700 hover:to-blue-800 transition-all">
          Submit Request
        </button>
      </div>

      <!-- Home Button -->
      <a href="index.php" 
        class="fixed bottom-6 right-6 bg-blue-600 text-white text-xl p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300 z-50"
        title="Back to Home">
        <i class="fas fa-home"></i>
      </a>
    </form>
  </div>
</body>
</html>