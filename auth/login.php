<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: ../admin/admin.dashboard.php");
}

require_once '../classes/user.class.php';
require_once '../tools/clean.php';

$objUser = new User;

$username = $password = '';
$usernameErr = $passwordErr = $incorrect_credentials = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? clean_input($_POST['username']) : '';
    $password = isset($_POST['password']) ? clean_input($_POST['password']) : '';

    if (empty($username)) {
        $usernameErr = 'Username is required!';
    }

    if (empty($password)) {
        $passwordErr = 'Password is required!';
    }

    if (empty($usernameErr) && empty($passwordErr)) {
        $user = $objUser->login($username, $password);
        
    }
}
require_once "../dash_chopdown/dash_head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/auth.css">
    <title>Login | DESCD</title>
</head>
<body>
<a href="../dashboard/descd.php" class="back-btn">
    <i class="fa-solid fa-arrow-left"></i>
</a>
<div class="login-box">
    <div class="login-header">
        <a href="../dashboard/descd.php">
            <img src="../imgs/descd.png" alt="" class="logo" style="width: 80px;">
        </a>
        <header>ADMIN Login</header>
    </div>
<div class="form">
     <form method="post">
        <span class="required"><?= $incorrect_credentials; ?></span>
        <div class="input-box">
            <input type="text" class="input-field" name="username" id="username" placeholder="Username" value="<?= htmlspecialchars($username) ?>" autocomplete="off" required>
            <span class="required"><?= $usernameErr; ?></span>
        </div>

        <div class="input-box">
            <input type="password" class="input-field" name="password" id="password" placeholder="Password" autocomplete="off" required>
            <span class="required"><?= $passwordErr; ?></span>
        </div>

        <div class="sub">
            <div class="input-submit">
                <button class="submit-btn" type="submit">Log in</button>
            </div>
        </div>
    </form>
</div>
   

    <!-- <div class="sign-in-link">
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div> -->
</div>
</body>
</html>
