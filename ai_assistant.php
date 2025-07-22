<?php
session_start();
header("Content-Type: application/json");
require 'db_connect.php';

$step = $_POST['step'] ?? 'faq';
$user_input = trim($_POST['national_id'] ?? '');
$response = "";
$nextStep = $step;
$question = strtolower($user_input);

// Define keyword groups
$track_keywords = ['track', 'status', 'my request', 'application'];
$faq_questions = [
  // Appointments
  'how do i schedule an appointment?' => "🗓 You can schedule an appointment through the service page or by calling our hotline.",
  'can i reschedule my appointment?' => "♻️ Yes, you can reschedule via your account dashboard or call customer service.",
  'what if i miss my appointment?' => "📌 If you miss your appointment, you'll need to request a new one.",
  // Account
  'how can i update my account details?' => "👤 You can update your information after logging in under 'Edit Info'.",
  'what if i forget my password?' => "🔐 Use the 'Forgot Password' option on the login page to reset your password.",
  'can i delete my account?' => "⚠️ Account deletion is not supported online. Please contact customer service.",
  // Consumption
  'how can i check my water usage?' => "💧 You can view your consumption history in the 'Meter Data' section after logging in.",
  'what is average daily consumption?' => "📊 It depends on your area and number of users, but typically ~250L/day per person.",
  // Support
  'how do i file a complaint?' => "📩 File a complaint through the 'Report Complaint' form or the chatbot menu.",
  'how do i request maintenance?' => "🔧 Maintenance requests can be submitted via the 'Maintenance Request' form."
];

// Step 1: Check if user is verifying ID
if ($step === 'check_id') {
  $stmt = $conn->prepare("SELECT User_ID FROM user WHERE National_ID = ?");
  $stmt->bind_param("s", $user_input);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_nid'] = $user_input;
    $response = "✅ Your ID is verified. You can now track your request.";
    $nextStep = 'faq';
  } else {
    $response = "❌ National ID not found. Please register first.";
    $nextStep = 'faq';
  }

// Step 2: Require login if user tries to track without being logged in
} elseif (in_array($question, $track_keywords) || $question === 'track') {
  if (!isset($_SESSION['user_id'])) {
    $response = "🔐 To track your request, please enter your National ID first.";
    $nextStep = 'check_id';
  } else {
    $response = "📦 Your request is being processed. You will be notified soon.";
    $nextStep = 'faq';
  }

// Step 3: Answer predefined FAQs
} elseif (array_key_exists($question, $faq_questions)) {
  $response = $faq_questions[$question];
  $nextStep = 'faq';

// Step 4: Unknown input
} else {
  $response = "🤔 Sorry, I didn't understand. Please choose a question from the list or type again.";
  $nextStep = 'faq';
}

// Log if user is logged in
$user_id = $_SESSION['user_id'] ?? null;
if ($user_id && !empty($user_input)) {
  $stmt = $conn->prepare("INSERT INTO ai_logs (Date, Question, Response, User_ID) VALUES (NOW(), ?, ?, ?)");
  $stmt->bind_param("ssi", $user_input, $response, $user_id);
  $stmt->execute();
}

echo json_encode([
  'reply' => $response,
  'nextStep' => $nextStep
]);
?>
