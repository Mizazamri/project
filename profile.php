<?php
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'save') {
    $new_email = $_POST['email'];
    $mobile = $_POST['mobile_number'];
    $bloodtype = $_POST['bloodtype'];

    $check = $conn->prepare("SELECT email FROM donor WHERE email = ? AND email != ?");
    $check->bind_param("ss", $new_email, $email);
    $check->execute();
    $check->store_result();
    
    if ($check->num_rows > 0) {
        $error = "Email already in use!";
    } else {
        $img_name = '';
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            $target_dir = "uploads/";
            $img_name = basename($_FILES["profile_pic"]["name"]);
            $target_file = $target_dir . $img_name;
            move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
        }

        $update = "UPDATE donor SET email = ?, mobile_number = ?, bloodtype = ?" . ($img_name ? ", profile_pic = ?" : "") . " WHERE email = ?";
        $stmt = $conn->prepare($img_name ? $update : str_replace(", profile_pic = ?", "", $update));
        
        if ($img_name) {
            $stmt->bind_param("sssss", $new_email, $mobile, $bloodtype, $img_name, $email);
        } else {
            $stmt->bind_param("ssss", $new_email, $mobile, $bloodtype, $email);
        }

        if ($stmt->execute()) {
            $_SESSION['email'] = $new_email;
            echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
            exit();
        } else {
            $error = "Failed to update profile.";
        }
    }
}

$sql = "SELECT *, TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) AS age FROM donor WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BloodLink - Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fff;
      margin: 0;
      padding: 0;
      text-align: center;
    }
    header {
      padding: 20px 0;
      border-bottom: 1px solid #ccc;
    }
    .logo {
      font-size: 24px;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    nav button {
      background-color: #d23241;
      color: white;
      padding: 10px 20px;
      margin: 5px;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      font-size: 16px;
    }
    .profile-container {
      background-color: #d23241;
      color: white;
      width: 80%;
      max-width: 800px;
      margin: 30px auto;
      padding: 30px;
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      text-align: left;
    }
    .profile-info p, .profile-info label {
      margin: 10px 0;
    }
    .profile-info input, .profile-info select {
      padding: 5px;
      width: 100%;
      margin-top: 5px;
    }
    .profile-pic img {
      width: 150px;
      height: 150px;
      border-radius: 10px;
      object-fit: cover;
    }
    .edit-btn, .save-btn, .cancel-btn {
      margin-top: 15px;
      padding: 10px 20px;
      font-weight: bold;
      border-radius: 6px;
      cursor: pointer;
      margin-right: 10px;
    }
    .edit-btn {
      background-color: white;
      color: #d23241;
      border: 2px solid #fff;
    }
    .save-btn, .cancel-btn {
      display: none;
      background-color: white;
      color: #d23241;
      border: 2px solid #fff;
    }
    .success, .error {
      margin: 10px auto;
      padding: 10px;
      width: 80%;
      max-width: 600px;
      border-radius: 6px;
    }
    .success {
      background-color: #d4edda;
      color: #155724;
    }
    .error {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body>
  <?php include ("navbar.php") ?>

  <?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to save changes?');">
    <input type="hidden" name="action" value="save">
    <div class="profile-container">
      <div class="profile-info">
        <p><strong>Profile User</strong></p>
        <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
        <p>Full Name: <?php echo htmlspecialchars($user['full_name']); ?></p>
        <p>IC Number: <?php echo htmlspecialchars($user['id_card_number']); ?></p>
        <p>Date of Birth: <?php echo htmlspecialchars($user['date_of_birth']); ?></p>
        <p>Age: <?php echo htmlspecialchars($user['age']); ?> years</p>
        <p>Gender: <?php echo htmlspecialchars($user['gender']); ?></p>

        <!-- Display View -->
        <p>Email: <span id="displayEmail"><?php echo htmlspecialchars($user['email']); ?></span></p>
        <p>Mobile No: <span id="displayMobile"><?php echo htmlspecialchars($user['mobile_number']); ?></span></p>
        <p>Blood Type: <span id="displayBloodType"><?php echo htmlspecialchars($user['bloodtype']); ?></span></p>

        <!-- Hidden Fields -->
        <div id="editFields" style="display: none;">
          <p>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
          </p>
          <p>
            <label>Mobile No:</label>
            <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($user['mobile_number']); ?>">
          </p>
          <p>
            <label>Blood Type:</label><br>
            <select name="bloodtype">
              <?php
              $types = ["NA", "A", "B", "AB", "O"];
              foreach ($types as $type) {
                  $selected = ($user['bloodtype'] == $type) ? "selected" : "";
                  echo "<option value='$type' $selected>$type</option>";
              }
              ?>
            </select>
          </p>
          <p>
            <label>Upload Profile Picture:</label>
            <input type="file" name="profile_pic" accept="image/*" onchange="previewImage(this)">
          </p>
        </div>

        <button type="button" class="edit-btn" onclick="enableEdit()">Edit</button>
        <button type="submit" class="save-btn" id="saveBtn">Save</button>
        <button type="button" class="cancel-btn" id="cancelBtn" onclick="cancelEdit()">Cancel</button>
      </div>

      <div class="profile-pic">
        <img id="previewImg" src="<?php echo isset($user['profile_pic']) ? 'uploads/' . $user['profile_pic'] : 'https://via.placeholder.com/150x150?text=Photo'; ?>" alt="Profile Image">
      </div>
    </div>
  </form>
  <div class="view-history">
      <button onclick="location.href='history.php'">View History</button>
  </div>

  <script>
    function enableEdit() {
      document.getElementById("editFields").style.display = "block";
      document.getElementById("displayEmail").style.display = "none";
      document.getElementById("displayMobile").style.display = "none";
      document.querySelector(".edit-btn").style.display = "none";
      document.getElementById("saveBtn").style.display = "inline-block";
      document.getElementById("cancelBtn").style.display = "inline-block";
    }

    function cancelEdit() {
      location.reload();
    }

    function previewImage(input) {
      const preview = document.getElementById('previewImg');
      const file = input.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    }
  </script>
</body>
</html>
