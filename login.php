<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 350px;
        }

        h2 {
            margin-bottom: 25px;
            color: #00796b;
        }

        input[type="text"], input[type="submit"] {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Employee Login</h2>

        <!-- Optional error message from auth.php -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
        <?php endif; ?>

        <form method="POST" action="auth.php">
            <input type="text" name="emp_id" placeholder="Employee ID" required><br>
            <input type="text" name="emp_name" placeholder="Employee Name" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
