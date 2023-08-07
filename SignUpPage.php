<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-container">
        <p class="registration-title">LET'S GET YOU STARTED.</p>
        <h2 class="create-account">Create an Account</h2>
        <strong style="color:red;" ><?php if(isset($_SESSION['REG_ERROR'])){echo $_SESSION['REG_ERROR'];} unset($_SESSION['REG_ERROR']); ?></strong>
        <form class="registration-form" action="Backend/signUpProcessor.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" id="Phone Number" name="PhoneNumber" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="get-started-button" >GET STARTED</button>
        </form>
        <h4 class="or-sign-up">Or Login With</h4>
        <div class="social-login-options">
          <button class="social-login-button google" onclick="redirectTo('https://www.google.com')">Google</button>
            <button class="social-login-button facebook" onclick="redirectTo('https://www.facebook.com')">Facebook</button>
            <button class="social-login-button apple" onclick="redirectTo('https://www.apple.com')">Apple</button>
        </div>
       <p class="login-here">Already have an account? <a href="Login.php" class="login-link">LOGIN HERE</a></p>
    </div>

    <script src="script.js"></script>
</body>
</html>
