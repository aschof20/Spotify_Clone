<?php

include("includes/config.php");
include("includes/classes/Song.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");


// Close the session
//session_destroy();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Spotify Clone!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=1.1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>

<div id="mainContainer">
    <div id="topContainer">
        <?php
        include("includes/navBarContainer.php") ?>

        <div id="mainViewContainer">
            <div id="mainContent">