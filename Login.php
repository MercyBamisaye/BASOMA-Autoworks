<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="login-container">
        <h1 class="welcome-back">Welcome Back</h1>
        <strong style="color:red;">
            <?php if(isset($_SESSION['LOGIN_ERROR'])){echo $_SESSION['LOGIN_ERROR'];} unset($_SESSION['LOGIN_ERROR']); ?>
        </strong>
        <strong style="color:green">
            <?php if(isset($_SESSION['LOGIN_MSSG'])){echo $_SESSION['LOGIN_MSSG'];} unset($_SESSION['LOGIN_MSSG']); ?>
        </strong>
        <?PHP session_unset(); session_destroy() ?>
        <form class="login-form" action="Backend/loginProcessor.php" method="post">
            <label for="usernameOrEmail">Email or Username:</label>
            <input type="text" id="usernameOrEmail" name="usernameOrEmail" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="login-button" onclick="login()">Login</button>
        </form>
       <h4> <a href="#" class="forgot-password">Forgot password?</a></h4>
        <p class="or-login-with">Or Login With</p>
        <div class="login-options">
            <button class="social-login-button google" onclick="redirectTo('https://www.google.com')">Google</button>
            <button class="social-login-button facebook" onclick="redirectTo('https://www.facebook.com')">Facebook</button>
            <button class="social-login-button apple" onclick="redirectTo('https://www.apple.com')">Apple</button>
        </div>
       <h5> <p class="sign-up">Don't have an account? <a href="SignUpPage.php" class="sign-up-link">SIGN UP HERE</a></p></h5>
    </div>

    <script src="script.js"></script>
</body>
</html>
