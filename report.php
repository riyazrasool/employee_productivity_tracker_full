<?php
session_start();
if (!isset($_SESSION['emp_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Daily Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .report-box {
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 500px;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }

        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 12px 25px;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #218838;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .logout {
            text-decoration: none;
            color: #dc3545;
            font-weight: bold;
        }

        .logout:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="report-box">
        <div class="top-bar">
            <div><strong><?php echo htmlspecialchars($_SESSION['emp_name']); ?></strong></div>
            <div><a href="logout.php" class="logout">Logout</a></div>
        </div>

        <h2>Submit Your Daily Report</h2>
        <?php
if (isset($_SESSION['report_status'])) {
    echo "<p style='color: green; font-weight: bold;'>" . $_SESSION['report_status'] . "</p>";
    unset($_SESSION['report_status']);
}
?>

        <form method="POST" action="submit.php">
            <label>Date</label>
            <input type="date" name="date" required>

            <label>Hours Worked</label>
            <input type="number" name="hours" min="0" max="24" step="0.5" required>

            <label>Work Summary</label>
            <textarea name="summary" placeholder="Describe your work today..." required></textarea>

            <input type="submit" class="btn" value="Submit Report">
        </form>
    </div>
</body>
</html>
