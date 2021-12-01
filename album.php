<?php
include("includes/header.php");
//Retrieve variables from url (id)
if (isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else {
    header("Location: index.php");
}
// Retrieve the appropriate entry in the album table.
$album = new Album($con, $_GET['id']);
echo $album->getTitle();

// Retrieve the artist from the artist table using artist id from the album table.
// Create new artist object
$artist = $album->getArtist();
echo $artist->getName();
?>


<?php
include("includes/footer.php"); ?>