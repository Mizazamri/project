<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BloodLink</title>
  <link rel="stylesheet" href="home.css">
</head>

<body>
  <header>
    <div class="logo-container">
      <img src="image/logo.png" alt="logo" />
      <span>BloodLink</span>
    </div>

    <nav id="main-nav">
      <a href="home.php">Home</a>
      <a href="event.php">Event</a>
      <a href="faq.php">FAQ</a>
      <a href="aboutus.php">About Us</a>

      <?php if (isset($_SESSION['email'])): ?>
        <?php
          $defaultImage = 'image/user-icon.png';
          $profileImage = (!empty($_SESSION['profile_picture']) && file_exists($_SESSION['profile_picture']))
              ? $_SESSION['profile_picture']
              : $defaultImage;
        ?>
        <div class="profile-dropdown">
          <img src="<?= htmlspecialchars($profileImage) ?>" alt="Profile" class="profile-icon">
          <div class="dropdown-content">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
          </div>
        </div>
      <?php else: ?>
          <a href="login.php">
          <img src="image/login.png" width="30px" alt="Login">
          </a>
        </a>
      <?php endif; ?>
    </nav>

    <div class="burger" onclick="toggleNav()">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </header>

  <script>
    function toggleNav() {
      document.getElementById("main-nav").classList.toggle("active");
    }
  </script>

</body>
</html>
