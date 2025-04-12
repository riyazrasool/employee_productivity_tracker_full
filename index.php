<?php
session_start();
if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            background: white;
            padding: 30px;
            width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .submit-btn { background-color: #007bff; color: white; }
        .logout-btn { background-color: #dc3545; color: white; }
        .link {
            display: inline-block;
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
        }
        .link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['emp_name']); ?>!</h2>
        <p>Employee ID: <?php echo $_SESSION['emp_id']; ?></p>
        <p>Date: <?php echo date("d M Y"); ?></p>

        <a href="report.php" class="btn submit-btn">Submit Daily Report</a>
        <a href="logout.php" class="btn logout-btn">Logout</a>
        <br><br>
        <a class="link" href="view_reports.php">View My Reports</a> |
        <a class="link" href="download.php">Download Reports</a>
    </div>
</body>
</html>
