<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/config.php';
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT id, password FROM users WHERE username = ? OR email = ?");
    if ($query) {
        $query->bind_param("ss", $username, $username);
        $query->execute();
        $query->store_result();

        if ($query->num_rows === 1) {
            $query->bind_result($user_id, $hashed);
            $query->fetch();
            if (password_verify($password, $hashed)) {
                $_SESSION['user_id'] = $user_id;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "User not found.";
        }

        $query->close();
    } else {
        $error = "Query failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Login</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username or Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<a href="signup.php" class="signup-link">Don't have an account? Signup</a>
</body>
</html>
