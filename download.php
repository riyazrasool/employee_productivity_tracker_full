<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");
    exit();
}

$emp_id = $_SESSION['emp_id'];
$emp_name = $_SESSION['emp_name'];

// Set headers for CSV file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="'.$emp_name.'_reports.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Date', 'Hours Worked', 'Summary']);

$query = "SELECT date, hours_worked, summary FROM reports WHERE emp_id = ? ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $emp_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    fputcsv($output, [$row['date'], $row['hours_worked'], $row['summary']]);
}

fclose($output);
exit();
