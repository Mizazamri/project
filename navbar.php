<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BloodLink</title>
  <link rel="stylesheet" href="home2.css" />
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  
</head>
<body>

  <header>
    <div class="logo-container">
      <img src="image/logo.png" alt="logo" />
      <span>BloodLink</span>
    </div>

    <nav>
      <a href="#">Home</a>
      <a href="#">Event</a>
      <a href="#">FAQ</a>
      <a href="#">About Us</a>
      <i class='bx  bxs-user-plus'  ></i> 
    </nav>

    <div class="burger" onclick="toggleNav()">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </header>

  <script>
    function toggleNav() {
      document.querySelector("nav").classList.toggle("active");
    }
  </script>

</body>
</html>
