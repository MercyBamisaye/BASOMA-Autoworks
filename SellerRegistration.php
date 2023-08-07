<?php
session_start();
if(!(isset($_SESSION['USERNAME']))){
    header("location: Login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="SellerRegistration.css">
</head>
<body>
    <div class="registration-container">
        <p class="registration-title">LET'S GET YOU STARTED AS A SELLER</p>
        <h1 class="create-account">Create an Account</h1>
        <strong style="color:red"><?PHP if(isset($_SESSION['SELLER_REG_ERROR'])){$_SESSION['SELLER_REG_ERROR'];unset($_SESSION['SELLER_REG_ERROR']);}?></strong>
        <form class="registration-form" action="Backend/sellerRegistrationProcessor.php" method="get">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="Business Name">Business Name:</label>
            <input type="text" id="Business Name" name="BusinessName" required>

            <label for="email">Business Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="Phone No">Business Phone No:</label>
            <input type="text" id="Phone No" name="Phone" required>

            <label for="address">Business Address:</label>
            <input type="text" id="password" name="address" required>

            <button type="submit" class="get-started-button">GET STARTED</button>
        </form>
        <h3 class="or-sign-up">Or Sign Up With</h3>
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
