<?php
ob_start();
session_start();


$timezone = date_default_timezone_set("Australia/Brisbane");

$con = mysqli_connect("localhost", "root", "", "spotify_clone");

if (mysqli_connect_errno()) {
    echo "Failed to Connect: " . mysqli_connect_errno();
}
