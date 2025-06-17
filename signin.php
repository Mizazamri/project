<?php
include("connect.php"); // Database connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Show detailed DB errors

$submitted = false;
$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data safely
    $fullName = $_POST['full_name'] ?? '';
    $uname = $_POST['username'] ?? '';
    $idcard = $_POST['id_card_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $dob = $_POST['date_of_birth'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $phone = $_POST['mobile_number'] ?? '';
    $blood = $_POST['bloodtype'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Check password match
    if ($password !== $confirmPassword) {
        $error = "❌ Password and Confirm Password do not match.";
    } else {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL insert
        $sql = "INSERT INTO donor (full_name, username, id_card_number, email, age, date_of_birth, gender, mobile_number, bloodtype, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare & bind
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $error = "❌ SQL Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("ssssisssss", $fullName, $uname, $idcard, $email, $age, $dob, $gender, $phone, $blood, $hashedPassword);

            if ($stmt->execute()) {
                $submitted = true;
                $success = true;
            } else {
                $error = "❌ Execute failed: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="form-content">
        <div class="form-box">
            <img id="imgformat" class="imageCenter" src="Image/logo.jpg" alt="logo">
            <h1>Sign In</h1>

            <!-- Show success or error message -->
            <?php if ($submitted && $success): ?>
                <p style="color: green; font-weight: bold;">✅ Registration successful!</p>
            <?php elseif ($error): ?>
                <p style="color: red; font-weight: bold;"><?= $error ?></p>
            <?php endif; ?>

            <form method="post" action="">
                <table class="center">
                    <tr>
                        <td><label for="full_name">Full Name:</label></td>
                        <td><input type="text" name="full_name" id="full_name" required></td>
                    </tr>
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" name="password" id="password" required minlength="6"></td>
                    </tr>
                    <tr>
                        <td><label for="confirm_password">Confirm Password:</label></td>
                        <td><input type="password" name="confirm_password" id="confirm_password" required minlength="6"></td>
                    </tr>
                    <tr>
                        <td><label for="id_card_number">ID Card:</label></td>
                        <td><input type="text" name="id_card_number" id="id_card_number" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="age">Age:</label></td>
                        <td><input type="number" name="age" id="age" required min="17" max="50"></td>
                    </tr>
                    <tr>
                        <td><label for="date_of_birth">Date of Birth:</label></td>
                        <td><input type="date" name="date_of_birth" id="date_of_birth" required></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Female" required> Female
                        </td>
                    </tr>
                    <tr>
                        <td><label for="mobile_number">Mobile Num:</label></td>
                        <td><input type="tel" name="mobile_number" id="mobile_number" required></td>
                    </tr>
                    <tr>
                        <td><label for="bloodtype">Blood Type:</label></td>
                        <td>
                            <select name="bloodtype" id="bloodtype" required>
                                <option value="">Select</option>
                                <option value="A">A Type</option>
                                <option value="B">B Type</option>
                                <option value="AB">AB Type</option>
                                <option value="O">O Type</option>
                                <option value="NA">Not Sure Yet</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <div class="btn-row">
                                <input class="btn-s" type="submit" value="Sign In">
                                <input class="btn-r" type="reset" value="Clear Form">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>

            <div class="already-account">
                <p><a href="login.php">Already have an account?</a></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector("form").addEventListener("submit", function(e) {
        const pw = document.getElementById("password").value;
        const cpw = document.getElementById("confirm_password").value;
        if (pw !== cpw) {
            alert("❌ Password and Confirm Password do not match.");
            e.preventDefault();
        }
    });
</script>

</body>
</html>
