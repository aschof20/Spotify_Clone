<?php
include("includes/includedFiles.php");

// Check to see if session variable set
if (isset($_SESSION['userLoggedIn'])) {
    $username = $_SESSION['userLoggedIn'];

    echo "<script>userLoggedIn = '$username';</script>";
    echo "<script>console.log(userLoggedIn);</script>";
} else {
    header("Location: register.php");
}
?>


<h1 class="pageHeadingBig">You might also like</h1>
<div class="gridViewContainer">
    <?php

    $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
    while ($row = mysqli_fetch_array($albumQuery)) {
        echo "<div class='gridViewItem'>
            <a href='album.php?id=" . $row['id'] . "'>
                    <img src='" . $row['artwork'] . "'>
                    <div class='gridViewInfo'>" . $row['title'] . "</div>
                    </div></a>";

    }
    ?>
</div>




