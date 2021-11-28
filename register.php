<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name) {
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
<?php
if (isset($_POST['registerButton'])) {
    echo '<script>
    $(document).ready(function () {
        $("#loginForm").hide();
        $("#registerForm").show();
    });
</script>';
} else {
    echo '<script>
    $(document).ready(function () {
        $("#loginForm").show();
        $("#registerForm").hide();

    });
</script>';
}
?>

<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">
            <form id="loginForm" action="register.php" method="POST">
                <h2> Login to Your Account</h2>


                <p>
                    <?php
                    echo $account->getError(Constants::$loginFail);
                    ?>
                    <label for="loginUsername">Username: </label>
                    <input id="loginUsername" type="text" name="loginUsername"
                           placeholder="Username" value="<?php
                    getInputValue('loginUsername'); ?>" required/>
                </p>

                <p>
                    <label for="loginPassword">Password: </label>
                    <input id="loginPassword" type="password" name="loginPassword"
                           placeholder="Password" required>
                </p>
                <button type="submit" name="loginButton">LOGIN</button>
                <div class=" hasAccountText">
                    <span id="hideLogin">Don't have an account yet? Signup here.</span>
                </div>
            </form>

            <form id="registerForm" action="register.php" method="POST">
                <h2> Register Your Free Account</h2>
                <p>
                    <?php
                    echo $account->getError(Constants::$usernameCharacters);
                    ?>
                    <?php
                    echo $account->getError(Constants::$usernameTaken);
                    ?>
                    <label for="registerUsername">Username: </label>
                    <input id="registerUsername" type="text" name="registerUsername"
                           placeholder="Username" value="<?php
                    getInputValue('username'); ?>" required>
                </p>

                <p>
                    <?php
                    echo $account->getError(Constants::$firstNameCharacters);
                    ?>
                    <label for="firstName">First Name: </label>
                    <input id="firstName" type="text" name="firstName"
                           placeholder="First Name"
                           value="<?php
                           getInputValue('firstName'); ?>"
                           required>
                </p>
                <p>
                    <?php
                    echo $account->getError(Constants::$lastNameCharacters);
                    ?>
                    <label for="lastName">Last Name: </label>
                    <input id="lastName" type="text" name="lastName"
                           placeholder="Last Name"
                           value="<?php
                           getInputValue('lastName'); ?>"
                           required>
                </p>
                <p>
                    <?php
                    echo $account->getError(Constants::$emailsDoNotMatch);
                    ?>
                    <?php
                    echo $account->getError(Constants::$emailInvalid);
                    ?>
                    <?php
                    echo $account->getError(Constants::$emailTaken);
                    ?>
                    <label for="email">Email: </label>
                    <input id="email" type="email" name="email" placeholder="Email"
                           value="<?php
                           getInputValue('email'); ?>" required>
                </p>
                <p>
                    <label for="email2">Confirm Email: </label>
                    <input id="email2" type="email" name="email2"
                           placeholder="Confirm Email"
                           value="<?php
                           getInputValue('email2'); ?>"
                           required>
                </p>

                <p>
                    <?php
                    echo $account->getError(Constants::$passwordsDoNotMatch);
                    ?>
                    <?php
                    echo $account->getError(Constants::$passwordNotAlphanumeric);
                    ?>
                    <?php
                    echo $account->getError(Constants::$passwordCharacters);
                    ?>
                    <label for="password">Password: </label>
                    <input id="password" type="password" name="password"
                           placeholder="password"
                           required>
                </p>

                <p>
                    <label for="password2">Confirm Password: </label>
                    <input id="password2" type="password" name="password2"
                           placeholder="password"
                           required>
                </p>
                <button type="submit" name="registerButton">REGISTER</button>

                <div class=" hasAccountText">
                    <span id="hideRegister">Already have an account? Login here.</span>
                </div>
            </form>
        </div>

        <div id="loginText">
            <h1>Get Great Music, Right Now</h1>
            <h2>Listen to music for free.</h2>
            <ul>
                <li>Discover music you'll love.</li>
                <li>Create your own playlists.</li>
                <li>Keep up to date with artists' new releases.</li>
            </ul>
        </div>
    </div>
</div>
</body>

</html>