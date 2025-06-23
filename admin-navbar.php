<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BloodLink Admin</title>
  <link rel="stylesheet" href="admin.css" type="text/css">
</head>
<body>
  <header>
    <nav id="main-nav">
      <div class="logo-container">
        <a href="home.php">
          <img id="imgformat" class="imageCenter" src="image/logo.png" alt="logo">
        </a>
        <span>BloodLink</span>
      </div>

      <div class="nav-container">
        <a href="admin-home.php">Home</a>
        <a href="add-donation.php">Add Donation</a>
        <a href="add-event.php">Add Event</a>
        <a href="aboutus.php">About Us</a>
        <a href="logout.php" class="logout">Log Out</a>
      </div>
    </nav>
  </header>
</body>
</html>
