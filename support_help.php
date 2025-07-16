<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Support & Help – National Water Company</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleAnswer(id) {
      const answer = document.getElementById(id);
      answer.classList.toggle("hidden");
    }
  </script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen text-gray-800 font-sans p-6">

  <!-- Page Header -->
  <div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-blue-800">Support & Help</h1>
    <p class="text-gray-600 mt-2">Need help? Find answers to common questions or contact our support team.</p>
  </div>

  <!-- FAQ Section -->
  <section class="max-w-5xl mx-auto mb-10">
    <h2 class="text-2xl font-bold mb-4 text-blue-700">Frequently Asked Questions</h2>
    <div class="space-y-4">
      <div class="bg-white p-4 rounded-xl shadow cursor-pointer" onclick="toggleAnswer('faq1')">
        <h3 class="font-semibold text-lg text-blue-900">How can I register a new water meter?</h3>
        <p id="faq1" class="mt-2 text-gray-600 hidden">You can register by navigating to the homepage and selecting the "Request a New Water Meter" service. Fill in the form and upload required documents.</p>
      </div>
      <div class="bg-white p-4 rounded-xl shadow cursor-pointer" onclick="toggleAnswer('faq2')">
        <h3 class="font-semibold text-lg text-blue-900">How do I track my service requests?</h3>
        <p id="faq2" class="mt-2 text-gray-600 hidden">Go to your profile dropdown and click on "My Requests". You'll see a full list of your submitted requests and their current status.</p>
      </div>
    </div>
  </section>

  <!-- How-To Guides -->
  <section class="max-w-5xl mx-auto mb-10">
    <h2 class="text-2xl font-bold mb-4 text-blue-700">How-To Guides</h2>
    <ul class="list-disc pl-6 text-blue-800 space-y-2">
      <li>💧 <strong>Pay Your Bill:</strong> Go to “Pay Bill” from your dropdown and select the bill to pay.</li>
      <li>🛠️ <strong>Submit a Maintenance Request:</strong> Select the maintenance service from the homepage and complete the request form.</li>
      <li>📄 <strong>Upload Deed Documents:</strong> All property-related services allow you to upload deed scans in PDF/JPG formats.</li>
    </ul>
  </section>

  <!-- Contact Support Form -->
  <section class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold mb-4 text-blue-800">Contact Our Support Team</h2>
    <form action="submit_support.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-semibold text-gray-700">Full Name</label>
        <input type="text" name="name" required class="w-full border rounded-lg px-4 py-2 mt-1" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700">Email Address</label>
        <input type="email" name="email" required class="w-full border rounded-lg px-4 py-2 mt-1" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700">Your Message</label>
        <textarea name="message" required rows="4" class="w-full border rounded-lg px-4 py-2 mt-1"></textarea>
      </div>
      <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">Send Message</button>
    </form>
  </section>

  <!-- Live Chat Placeholder -->
  <div class="fixed bottom-6 right-6">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-full shadow-lg">
      💬 Chat with AI Assistant
    </button>
  </div>

</body>
</html>
