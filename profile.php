<?php
include("connect.php");

session_start();

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
  <link rel="stylesheet" href="profile.css" type="text/css">

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
        <h2><strong>Profile User</strong></h2>
        <p><strong>Username : </strong><?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Full Name : </strong><?php echo htmlspecialchars($user['full_name']); ?></p>
        <p><strong>IC Number : </strong><?php echo htmlspecialchars($user['id_card_number']); ?></p>
        <p><strong>Date of Birth : </strong><?php echo htmlspecialchars($user['date_of_birth']); ?></p>
        <p><strong>Age : </strong><?php echo htmlspecialchars($user['age']); ?> years</p>
        <p><strong>Gender : </strong><?php echo htmlspecialchars($user['gender']); ?></p>

        <!-- Display View -->
        <p><strong>Email : </strong><span id="displayEmail"><?php echo htmlspecialchars($user['email']); ?></span></p>
        <p><strong>Mobile No : </strong><span id="displayMobile"><?php echo htmlspecialchars($user['mobile_number']); ?></span></p>
        <p><strong>Blood Type : </strong><span id="displayBloodType"><?php echo htmlspecialchars($user['bloodtype']); ?></span></p>

        <!-- Hidden Fields -->
        <div id="editFields" style="display: none;">
          <p>
            <label>Email :</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
          </p>
          <p>
            <label>Mobile No :</label>
            <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($user['mobile_number']); ?>">
          </p>
          <p>
            <label>Blood Type :</label><br>
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
    <button class="view-btn" onclick="location.href='history.php'">View History</button>
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
