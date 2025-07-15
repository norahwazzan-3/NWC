<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Info - National Water Company</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-200 min-h-screen flex items-center justify-center font-sans">

  <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-lg">
    <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Edit Your Information</h2>
    
    <form action="update_info.php" method="post" class="space-y-4">
      <div>
        <label class="block text-sm font-semibold text-gray-700">Full Name</label>
        <input type="text" name="name" placeholder="Enter your full name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>
      
      <div>
        <label class="block text-sm font-semibold text-gray-700">Phone Number</label>
        <input type="text" name="phone" placeholder="05xxxxxxxx" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700">Email Address</label>
        <input type="email" name="email" placeholder="your@email.com" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700">Date of Birth</label>
        <input type="date" name="dob" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="pt-4">
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Save Changes</button>
      </div>
    </form>
  </div>

</body>
</html>

