<?php
// Turn on error reporting for testing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "charity_organization"; // ← Change this to your real DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  http_response_code(500);
  die("Connection failed: " . $conn->connect_error);
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  http_response_code(400);
  echo "Invalid email format.";
  exit;
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
  echo "You are already subscribed.";
  $stmt->close();
  $conn->close();
  exit;
}
$stmt->close();

// Insert email
$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
  echo "Successfully subscribed!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
