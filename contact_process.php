<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "charity_organization"; // change this to your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if ($name && $email && $message) {
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        echo "Error saving message!";
    }
    $stmt->close();
} else {
    echo "Please fill all fields.";
}
$conn->close();
?>
