<?php
include("../../config.php");

if (isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    // Make call to database to retrieve the song.
    $query = mysqli_query($con, "SELECT * FROM Songs WHERE id='$songId' ");

    $resultArray = mysqli_fetch_array($query);
    echo json_encode($resultArray);
}