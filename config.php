

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Correct MAMP settings
$servername = "localhost";
$username = "root";
$password = "root";
$database = "Login_page";
$port = 3306; // or 8889 if that's your MySQL port

$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
