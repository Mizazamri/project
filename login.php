<?php
session_start();
include("connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';

    // First, check if it's an admin
    $sqlAdmin = "SELECT * FROM hospital_admin WHERE email = ?";
    $stmtAdmin = $conn->prepare($sqlAdmin);
    $stmtAdmin->bind_param("s", $identifier);

    if ($stmtAdmin->execute()) {
        $resultAdmin = $stmtAdmin->get_result();
        if ($resultAdmin->num_rows === 1) {
            $admin = $resultAdmin->fetch_assoc();

            if ($password === $admin['password']) {
                $_SESSION['email'] = $admin['email'];
                $_SESSION['hospital_name'] = $admin['hospital_name'];

                if (!empty($_POST['remember'])) {
                    setcookie("identifier", $identifier, time() + (86400 * 7)); // 1 week
                } else {
                    setcookie("identifier", "", time() - 3600); // Delete cookie
                }

                header("Location: admin-home.php");
                exit();
            } else {
                $error = "Invalid password for admin.";
            }
        } else {
            // Not admin, check donor table
            $sql = "SELECT * FROM donor WHERE email = ? OR mobile_number = ? OR id_card_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $identifier, $identifier, $identifier);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();

                    if (password_verify($password, $user['password'])) {
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['email'] = $user['email'];

                        if (!empty($_POST['remember'])) {
                            setcookie("identifier", $identifier, time() + (86400 * 7)); // 1 week
                        } else {
                            setcookie("identifier", "", time() - 3600); // Delete cookie
                        }

                        header("Location: home.php");
                        exit();
                    } else {
                        $error = "Invalid password.";
                    }
                } else {
                    $error = "Account not found.";
                }
            } else {
                $error = "Database error.";
            }
            $stmt->close();
        }
    } else {
        $error = "Database error.";
    }

    $stmtAdmin->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
    <style>
        .popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        .popup .close-btn {
            float: right;
            margin-left: 15px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-content">
        <div class="form-box">
            <img id="imgformat" class="imageCenter" src="Image/logo.png" alt="logo">
            <h2>Log In</h2>

            <?php if (!empty($error)): ?>
                <div id="popup" class="popup">
                    <?= $error ?>
                    <span class="close-btn" onclick="document.getElementById('popup').style.display='none'">❌</span>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post">
                <div class="input-box">
                <label>Email / Phone / ID :</label><br>
                <input type="text" name="identifier" required value="<?= $_COOKIE['identifier'] ?? '' ?>"><br>
                </div>

                <div class="input-box">
                <br><label>Password :</br></label>
                <input type="password" name="password" id="password" required>
                </div>

                <br><input type="checkbox" name="remember" <?= isset($_COOKIE['identifier']) ? 'checked' : '' ?>> Remember Me
                
                <div class="btn-row">
                <a href="home.php" class="btn-login">Log In</a>
                <a href="home.php" class="btn-cancel">Cancel</a>
                </div>
            </form>

            <div class="new-account">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
            <div class="psw-center">
                <a href="forget.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
