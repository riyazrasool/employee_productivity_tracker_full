<?php
// Enable error reporting (DEV only)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "employee_productivity";

// Create connection
$conn = new mysqli($host, $user, $pass, $db_name);

// Set character set
$conn->set_charset("utf8mb4");

// Handle connection failure
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("We are currently facing some issues. Please try again later.");
}
?>
