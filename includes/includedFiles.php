<?php


// Check if url sent by ajax or manually entered by user
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    include("includes/config.php");
    include("includes/classes/Song.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
} else {
    include("includes/header.php");
    include("includes/footer.php");

    $url = $_SERVER['REQUEST_URI'];
    echo "<script>openPage('$url')</script>";
    exit();

}