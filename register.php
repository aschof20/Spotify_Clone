<?php
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to Slotify~</title>
</head>

<body>
<div id="inputContainer">
    <form if="loginForm" action="register.php" method="POST">
        <h2> Login to Your Account</h2>
        <p>
            <label for="loginUsername">Username: </label>
            <input id="loginUsername" type="text" name="loginUsername" placeholder="Username" required>
        </p>

        <p>
            <label for="loginPassword">Password: </label>
            <input id="loginPassword" type="password" name="loginPassword" placeholder="password" required>
        </p>
        <button type="submit" name="loginButton">LOGIN</button>
    </form>

    <form if="registerForm" action="register.php" method="POST">
        <h2> Register Your Free Account</h2>
        <p>
            <label for="registerUsername">Username: </label>
            <input id="registerUsername" type="text" name="registerUsername" placeholder="Username" required>
        </p>

        <p>
            <label for="firstName">First Name: </label>
            <input id="firstName" type="text" name="firstName" placeholder="First Name" required>
        </p>
        <p>
            <label for="lastName">Last Name: </label>
            <input id="lastName" type="text" name="lastName" placeholder="Last Name" required>
        </p>
        <p>
            <label for="email">Email: </label>
            <input id="email" type="email" name="email" placeholder="Email" required>
        </p>
        <p>
            <label for="email2">Confirm Email: </label>
            <input id="email2" type="email" name="email2" placeholder="Confirm Email" required>
        </p>

        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password" placeholder="password" required>
        </p>

        <p>
            <label for="password2">Confirm Password: </label>
            <input id="password2" type="password" name="password2" placeholder="password" required>
        </p>
        <button type="submit" name="registerButton">REGISTER</button>
    </form>
</div>
</body>

</html>