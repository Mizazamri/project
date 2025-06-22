<?php
session_start();
include("connect.php");

//error message here
$error = "";


// Generate CSRF token if not set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Invalid CSRF token.";
    } else {
        $identifier = trim($_POST['identifier'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Input validation
        if (empty($identifier) || empty($password)) {
            $error = "All fields are required.";
        } elseif (
            !filter_var($identifier, FILTER_VALIDATE_EMAIL) &&
            !preg_match('/^01[0-9]-\d{7}$/', $identifier) &&
            !preg_match('/^\d{6}-\d{2}-\d{4}$/i', $identifier)
        ) {
            $error = "Invalid email, phone number, or ID format.";
        } else {

            // Check hospital_admin
            $sqlAdmin = "SELECT * FROM hospital_admin WHERE email = ?";
            $stmtAdmin = $conn->prepare($sqlAdmin);
            $stmtAdmin->bind_param("s", $identifier);

            if ($stmtAdmin->execute()) {
                $resultAdmin = $stmtAdmin->get_result();
                if ($resultAdmin->num_rows === 1) {
                    $admin = $resultAdmin->fetch_assoc();
                    if (password_verify($password, $admin['password'])) {
                        $_SESSION['hospital_id'] = $admin['hospital_id']; // ✅ Add this
                        $_SESSION['email'] = $admin['email'];
                        $_SESSION['hospital_name'] = $admin['hospital_name'];

                        if (!empty($_POST['remember'])) {
                            setcookie("identifier", $identifier, time() + (86400 * 7), "/");
                        } else {
                            setcookie("identifier", "", time() - 3600, "/");
                        }

                        header("Location: admin-home.php");
                        exit();
                    }
                    else {
                        $error = "Invalid password.";
                    }
                } else {
                    // Check donor
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
                        $stmt->close();
                    } else {
                        $error = "Database error.";
                    }
                }
                $stmtAdmin->close();
            } else {
                $error = "Database error.";
            }
        }
        $conn->close();
    }
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
    left: 50%;
    transform: translateX(-50%);
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: bold;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    z-index: 1000;
    max-width: 90%;
    text-align: center;
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
            <div class="psw-center">
                <a href="forget.html">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
