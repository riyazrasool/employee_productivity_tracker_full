<?php
session_start();
include 'db_config.php';

// Validate inputs
if (empty($_POST['emp_id']) || empty($_POST['emp_name'])) {
    $_SESSION['login_error'] = "Please enter both Employee ID and Name.";
    header("Location: login.php");
    exit();
}

$emp_id = trim($_POST['emp_id']);
$emp_name = trim($_POST['emp_name']);

// Secure query using prepared statements
$stmt = $conn->prepare("SELECT * FROM employees WHERE emp_id = ? AND emp_name = ?");
$stmt->bind_param("ss", $emp_id, $emp_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $_SESSION['emp_id'] = $emp_id;
    $_SESSION['emp_name'] = $emp_name;
    header("Location: index.php");
    exit();
} else {
    $_SESSION['login_error'] = "Invalid credentials. Please try again.";
    header("Location: login.php");
    exit();
}
?>
