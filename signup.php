<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php'; // load connection
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        if ($stmt) {
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error = "Username or email already exists.";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                if ($insert) {
                    $insert->bind_param("sss", $username, $email, $hashed);
                    if ($insert->execute()) {
                        header("Location: login.php");
                        exit;
                    }
                    else {
                        $error = "Error inserting user.";
                    }
                    $insert->close();
                } else {
                    $error = "Insert query failed: " . $conn->error;
                }
            }
            $stmt->close();
        } else {
            $error = "Select query failed: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Signup</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="confirm" placeholder="Confirm Password" required><br>
    <button type="submit">Sign Up</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<a href="login.php" class="login-link">Already have an account? Login</a>
</body>
</html>
