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
</head>
<body>
Hello
</body>
</html>