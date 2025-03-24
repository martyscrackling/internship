<?php
session_start();
require_once "../classes/user.class.php";
require_once "../tools/clean.php";

$objUser = new User;

$firstname = $lastname = $username = $email = $password = "";
$firstnameErr = $lastnameErr = $usernameErr = $emailErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = isset($_POST["firstname"]) ? clean_input($_POST['firstname']) : '';
    $lastname = isset($_POST["lastname"]) ? clean_input($_POST['lastname']) : '';
    $username = isset($_POST["username"]) ? clean_input($_POST['username']) : '';
    $email = isset($_POST["email"]) ? clean_input($_POST['email']) : '';
    $password = isset($_POST["password"]) ? clean_input($_POST['password']) : '';

    if (empty($firstname)) {
        $firstnameErr = 'Firstname is required!';
    }
    if (empty($lastname)) {
        $lastnameErr = 'Lastname is required!';
    }
    if (empty($email)) {
        $emailErr = 'Email is required!';
    }
    if (empty($username)) {
        $usernameErr = 'Username is required!';
    }
    if (empty($password)) {
        $passwordErr = 'Password is required!';
    }

    if (empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($usernameErr) && empty($passwordErr)) {
        if ($objUser->add_user($firstname, $lastname, $username, $email, $password)) {
            header("Location: login.php");
            exit();
        }
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
    <title>Sign Up | DESCD</title>
</head>
<body>
<a href="../dashboard/descd.php" class="back-btn">
    <i class="fa-solid fa-arrow-left"></i>
</a>
    <div class="register-box">
        <div class="register-header">
            <header>Sign Up</header>
        </div>

        <form method="POST">
            <span class="required"><?= $firstnameErr; ?></span>
            <div class="input-row">
    <div class="input-box">
        <input type="text" class="input-field" name="firstname" placeholder="Firstname" value="<?= htmlspecialchars($firstname) ?>" autocomplete="off" required>
    </div>

    <span class="required"><?= $lastnameErr; ?></span>

    <div class="input-box">
        <input type="text" class="input-field" name="lastname" placeholder="Lastname" value="<?= htmlspecialchars($lastname) ?>" autocomplete="off" required>
    </div>
    </div>
            <span class="required"><?= $usernameErr; ?></span>
            <div class="input-box">
                <input type="text" class="input-field" name="username" placeholder="Username" value="<?= htmlspecialchars($username) ?>" autocomplete="off" required>
            </div>

            <span class="required"><?= $emailErr; ?></span>
            <div class="input-box">
                <input type="email" class="input-field" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" autocomplete="off" required>
            </div>

            <span class="required"><?= $passwordErr; ?></span>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" required>
            </div>

            <div class="input-submit">
                <button class="submit-btn" type="submit">Sign Up</button>
            </div>
        </form>

        <div class="sign-in-link">
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </div>
</body>
</html>
