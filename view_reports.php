<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");
    exit();
}

$emp_id = $_SESSION['emp_id'];
$query = "SELECT summary, date, hours_worked FROM reports WHERE emp_id = ? ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $emp_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 30px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .center {
            text-align: center;
        }
        .download-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            background: #28a745;
            color: white;
            padding: 12px;
            text-decoration: none;
            border-radius: 8px;
        }
        .download-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h2>My Daily Reports</h2>
    <table>
        <tr>
            <th>Date</th>
            <th>Hours Worked</th>
            <th>Summary</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['date']); ?></td>
            <td><?php echo htmlspecialchars($row['hours_worked']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['summary'])); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a class="download-btn" href="download.php">Download My Reports (CSV)</a>
</body>
</html>
