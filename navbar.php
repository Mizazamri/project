<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
  /* Navbar styles */
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #d23241;
    color: white;
    flex-wrap: wrap;
  }

  .logo-container {
    display: flex;
    align-items: center;
  }

  .logo-container img {
    height: 40px;
    margin-right: 10px;
  }

  .logo-container span {
    font-size: 24px;
    font-weight: bold;
  }

  nav {
    display: flex;
    gap: 15px;
  }

  nav a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 12px;
    border-radius: 6px;
    transition: background 0.3s;
  }

  nav a:hover {
    background-color: #b42434;
  }

  .profile-dropdown {
    position: relative;
    display: inline-block;
  }

  .profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    min-width: 150px;
    z-index: 1;
    border-radius: 6px;
    overflow: hidden;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
  }

  .dropdown-content a {
    color: #d23241;
    padding: 12px 16px;
    display: block;
    text-decoration: none;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .profile-dropdown:hover .dropdown-content {
    display: block;
  }

  /* Burger icon styles */
  .burger {
    display: none;
    flex-direction: column;
    cursor: pointer;
  }

  .burger div {
    width: 25px;
    height: 3px;
    background-color: white;
    margin: 4px;
    transition: all 0.3s;
  }

  /* Responsive */
  @media (max-width: 768px) {
    nav {
      display: none;
      flex-direction: column;
      width: 100%;
      background-color: #d23241;
    }

    nav a {
      padding: 12px;
      text-align: center;
      border-top: 1px solid #fff2f2;
    }

    nav.active {
      display: flex;
    }

    .burger {
      display: flex;
    }
  }
</style>

<header>
  <div class="logo-container">
    <img src="image/logo.jpg" alt="BloodLink Logo">
    <span>BloodLink</span>
  </div>

  <div class="burger" onclick="toggleNav()">
    <div></div>
    <div></div>
    <div></div>
  </div>

  <nav id="main-nav">
    <a href="home.php">Home</a>
    <a href="event.php">Event</a>
    <a href="faq.php">FAQ</a>
    <a href="aboutus.php">About Us</a>
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
