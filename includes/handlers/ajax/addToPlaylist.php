<?php
include("../../config.php");

if (isset($_POST['playlistid']) && $_POST['songid']) {
    $playlistId = $_POST['playlistid'];
    $songId = $_POST['songid'];

    $orderIdQuery = mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder)+1, 1) AS playlistOrder FROM playlistSongs WHERE playlistid='$playlistId'");
    $row = mysqli_fetch_array($orderIdQuery);
    $order = $row['playlistOrder'];

    $query = mysqli_query($con, "INSERT INTO playlistSongs VALUES(null, '$songId', '$playlistId', '$order')");
} else {
    echo "PlaylistId or SongId are not set.";
}

?>