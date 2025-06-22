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

     <?php if (isset($_SESSION['email'])): ?>
    <?php
        // Default image if user has no uploaded profile picture
        $defaultImage = 'image/user-icon.png';

        // Check if session has a profile picture and the file exists
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
    <?php endif; ?>
  </nav>
</header>

<script>
  function toggleNav() {
    document.getElementById("main-nav").classList.toggle("active");
  }
</script>
</body>
</html>
