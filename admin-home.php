<?php
session_start();
if (!isset($_SESSION['hospital_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BloodLink Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f4f4; }
        header { background-color: #ff4d4d; color: white; text-align: center; padding: 20px; }
        nav { background: #333; text-align: center; padding: 12px 0; }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            padding: 10px 15px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #ff9999;
        }
        main { padding: 30px; text-align: center; }
        h2 { color: #333; }

        .logout {
            float: right;
            margin-right: 20px;
            background: #cc0000;
        }

        .nav-container {
            max-width: 1000px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

<header>
    <h1>BloodLink Admin Dashboard</h1>
</header>

<nav>
    <div class="nav-container">
        <a href="admin_home.php">Home</a>
        <a href="add-donation.php">Add Donation</a>
        <a href="add-event.php">Add Event</a>
        <a href="#" onclick="alert('Coming Soon!')">About Us</a>
        <a href="#" onclick="alert('Coming Soon!')">Hospital</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</nav>

<main>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['hospital_name']) ?></h2>
    <p>This is your admin dashboard. Use the menu above to manage donations and events.</p>
</main>

</body>
</html>
