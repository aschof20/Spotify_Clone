<?php

include("includes/config.php");
include("includes/classes/Song.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");


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
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Spotify Clone!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.1">
</head>
<body>
<div id="mainContainer">
    <div id="topContainer">
        <?php
        include("includes/navBarContainer.php") ?>

        <div id="mainViewContainer">
            <div id="mainContent">