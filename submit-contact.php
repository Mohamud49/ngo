<?php
include('./includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = trim($_POST['name']);
  $email   = trim($_POST['email']);
  $message = trim($_POST['message']);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
  }

  // ✅ Check for duplicate email & message combo
  $check = $conn->prepare("SELECT id FROM contact_messages WHERE email = ? AND message = ?");
  $check->bind_param("ss", $email, $message);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    echo "⚠️ You already sent this message.";
    exit;
  }

  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
    echo "✅ Message sent successfully!";
  } else {
    echo "❌ Error saving message.";
  }
}
?>
