<?php
session_start();
include("connect.php");

$error = "";

// CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Invalid CSRF token.";
    } else {
        $identifier = trim($_POST['identifier'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validate input
        if (empty($identifier) || empty($password)) {
            $error = "All fields are required.";
        } else {
            // --- Try hospital_admin first ---
            $stmtAdmin = $conn->prepare("SELECT * FROM hospital_admin WHERE email = ?");
            $stmtAdmin->bind_param("s", $identifier);
            if ($stmtAdmin->execute()) {
                $resultAdmin = $stmtAdmin->get_result();
                if ($resultAdmin->num_rows === 1) {
                    $admin = $resultAdmin->fetch_assoc();
                    if (password_verify($password, $admin['password'])) {
                        $_SESSION['hospital_id'] = $admin['hospital_id'];
                        $_SESSION['email'] = $admin['email'];
                        $_SESSION['hospital_name'] = $admin['hospital_name'];

                        if (!empty($_POST['remember'])) {
                            setcookie("identifier", $identifier, time() + (86400 * 7), "/");
                        } else {
                            setcookie("identifier", "", time() - 3600, "/");
                        }

                        header("Location: admin-home.php");
                        exit();
                    } else {
                        $error = "Invalid password.";
                    }
                } else {
                    // --- Try donor login ---
                    $stmtDonor = $conn->prepare("SELECT * FROM donor WHERE email = ? OR mobile_number = ? OR id_card_number = ?");
                    $stmtDonor->bind_param("sss", $identifier, $identifier, $identifier);
                    if ($stmtDonor->execute()) {
                        $result = $stmtDonor->get_result();
                        if ($result->num_rows === 1) {
                            $user = $result->fetch_assoc();
                            if (password_verify($password, $user['password'])) {
                                $_SESSION['username'] = $user['username'];
                                $_SESSION['email'] = $user['email'];

                                if (!empty($_POST['remember'])) {
                                    setcookie("identifier", $identifier, time() + (86400 * 7), "/");
                                } else {
                                    setcookie("identifier", "", time() - 3600, "/");
                                }

                                header("Location: home.php");
                                exit();
                            } else {
                                $error = "Invalid password.";
                            }
                        } else {
                            $error = "Account not found.";
                        }
                        $stmtDonor->close();
                    } else {
                        $error = "Database error.";
                    }
                }
                $stmtAdmin->close();
            } else {
                $error = "Database error.";
            }
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
    <div class="form-content">
        <div class="form-box">
            <a href="home.php">
                <img id="imgformat" class="imageCenter" src="Image/logo.png" alt="logo">
            </a>
            <h2>Log In</h2>

            <?php if (!empty($error)): ?>
                <div id="popup" class="popup">
                    <?= htmlspecialchars($error) ?>
                    <span class="close-btn" onclick="document.getElementById('popup').style.display='none'">❌</span>
                </div>
            <?php endif; ?>

            <form action="login.php" method="post">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="input-box">
                    <label>Email / Phone / ID:</label><br>
                    <input type="text" name="identifier" required value="<?= htmlspecialchars($_COOKIE['identifier'] ?? '') ?>"><br>
                </div>

                <div class="input-box">
                    <br><label>Password:</label>
                    <input type="password" name="password" required>
                </div>

                <br><input type="checkbox" name="remember" <?= isset($_COOKIE['identifier']) ? 'checked' : '' ?>> Remember Me

                <div class="btn-row">
                    <button type="submit" class="btn-login">Log In</button>
                    <a href="home.php" class="btn-cancel">Cancel</a>
                </div>
            </form>

            <div class="new-account">
                <p>Don't have an account? <a href="signup.php">Register</a></p>
            </div>
           
        </div>
    </div>
</div>
</body>
</html>
