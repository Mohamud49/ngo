<?php
session_start();
include './includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $captcha  = $_POST['g-recaptcha-response'] ?? '';

    // Validate inputs
    if (empty($email) || empty($password)) {
        $_SESSION['toast'] = "Email and password are required.";
        $_SESSION['toast_type'] = "alert-danger";
        header("Location: login.php");
        exit;
    }

    // === Google reCAPTCHA Validation ===
    $secretKey = "6LdcgDsrAAAAABBO5NCC61miU_P7G3zCm_gZP5oO";
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha";
    $response = json_decode(file_get_contents($verifyURL));

    if (!$response->success) {
        $_SESSION['toast'] = "Please verify the CAPTCHA.";
        $_SESSION['toast_type'] = "alert-danger";
        header("Location: login.php");
        exit;
    }

    // === Check user in admin_users (multi-role support) ===
    $stmt = $conn->prepare("SELECT id, name, role, password, status FROM admin_users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($user['status'] !== 'active') {
            $_SESSION['toast'] = "Your account is disabled.";
            $_SESSION['toast_type'] = "alert-danger";
            header("Location: login.php");
            exit;
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_name'] = $user['name'];
            $_SESSION['admin_role'] = $user['role'];

            // ✅ Redirect based on role
            switch ($user['role']) {
                case 'Admin':
                    header("Location: admin/index.php");
                    break;
                case 'Donor':
                    header("Location: donor/index.php");
                    break;
                case 'Volunteer':
                    header("Location: volunteer/index.php");
                    break;
                default:
                    $_SESSION['toast'] = "Unknown user role.";
                    $_SESSION['toast_type'] = "alert-danger";
                    header("Location: login.php");
                    break;
            }
            exit;
        } else {
            $_SESSION['toast'] = "Incorrect password.";
            $_SESSION['toast_type'] = "alert-danger";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['toast'] = "No account found with that email.";
        $_SESSION['toast_type'] = "alert-danger";
        header("Location: login.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
