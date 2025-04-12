<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_POST['summary']) || empty($_POST['date']) || empty($_POST['hours'])) {
    $_SESSION['report_status'] = "❌ All fields are required.";
    header("Location: report.php");
    exit();
}

$emp_id = $_SESSION['emp_id'];
$summary = trim($_POST['summary']);
$date = $_POST['date'];
$hours = floatval($_POST['hours']);

// Secure insert with prepared statement
$stmt = $conn->prepare("INSERT INTO reports (emp_id, summary, date, hours_worked) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $emp_id, $summary, $date, $hours);

if ($stmt->execute()) {
    $_SESSION['report_status'] = "✅ Report submitted successfully.";
} else {
    $_SESSION['report_status'] = "❌ Error submitting report: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: report.php");
exit();
?>
