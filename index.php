<?php

include("includes/config.php");

// Close the session
//session_destroy();

// Check to see if session variable set
if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome to Spotify Clone!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div id="mainContainer">
    <div id="topContainer">
        <?php
        include("includes/navBarContainer.php") ?>
    </div>

    <?php
    include("includes/nowPlayingBar.php") ?>
</div>
</body>
</html>


